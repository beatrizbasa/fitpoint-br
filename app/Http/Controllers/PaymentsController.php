<?php

namespace App\Http\Controllers;
use App\Models\Payments;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
class PaymentsController extends Controller
{

    
    public function index(Request $request, $status = null): View
    {
        // Retrieve all payments
        // $payments = Payments::paginate(5);

        // // Calculate the total payments
        // $totalPayments = Payments::sum('amount');

        // return view('admin.p_index', compact('payments', 'totalPayments'));

        $payments = Payments::paginate(5);
    
        // Calculate the total payments
        $totalPayments = Payments::sum('amount');
        $totalAmount = Payments::sum('amount');
        $totalPaidPayments = Payments::where('status', 1)->sum('amount');
        $totalUnPaidPayments = Payments::where('status', 0)->sum('amount');
        $paidPayments = Payments::where('status', 1)->get();
        $unpaidPayments = Payments::where('status', 0)->get();

        return view('admin.p_index', compact('payments','totalAmount','totalPayments', 'totalPaidPayments', 'paidPayments','unpaidPayments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.p_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'contact_no' => 'required|size:11',
            'email' => 'required|email',
            'gender' => 'required|in:male,female',
            'amount' => 'required|numeric',

        ]);

        Payments::create($request->all());

        return redirect()->route('admin.p_index')
        ->with('success', 'Payment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payments $payment): View
    {
        return view('admin.p_show',compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payments $payment): View
    {
        return view('admin.p_edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payments $payments): RedirectResponse
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'contact_no' => 'required|size:11',
            'email' => 'required|email',
            'gender' => 'required|in:male,female',
            'amount' => 'required',
        ]);
    
        $payments->update($request->all());
    
        return redirect()->route('admin.p_index')
            ->with('success', 'Payment updated successfully');
    }


    public function search(Request $request)
    {
        $search = $request->input('search');

        $query = Payments::query();

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->where('firstname', 'LIKE', "%$search%")
                    ->orWhere('lastname', 'LIKE', "%$search%")
                    ->orWhere('status', 'LIKE', "%$search%")
                    ->orWhere('address', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhere('contact_no', 'LIKE', "%$search%")
                    ->orWhere('gender', 'LIKE', "%$search%")
                    ->orWhere('amount', 'LIKE', "%$search%")
                    ->orWhere('created_at', 'LIKE', "%$search%")
                    ->orWhere('updated_at', 'LIKE', "%$search%");
                    
            });
        }
        $payments = $query->paginate(5);
        $totalAmount = Payments::sum('amount');
        $unpaidPayments = Payments::where('status', 0)->get();
        $paidPayments = Payments::where('status', 1)->get();

        // return view('admin.p_index', compact('payments'));
        return view('admin.p_index', compact('payments','totalAmount','paidPayments','unpaidPayments'));
    }

    public function destroy($id): RedirectResponse
    {
        $payments = Payments::findOrFail($id);
        $payments->delete();
        return redirect()->route('admin.index')
                        ->with('success', 'Payments deleted successfully');
    }

    public function markAsPaid($id)
    {
        $payment = Payments::find($id);
    
        // Update the payment status to "Paid" (1)
        $payment->status = 1;
        $payment->save();
    
        return redirect()->back()->with('success', 'Payment marked as Paid.');
    }
    
    public function markAsUnpaid($id)
    {
        $payment = Payments::find($id);
    
        if (!$payment) {
            return redirect()->back()->with('error', 'Payment not found.');
        }
    
        // Update the payment status to "Unpaid" (0)
        $payment->status = 0;
        if (!$payment->save()) {
            return redirect()->back()->with('error', 'Failed to mark payment as Unpaid.');
        }
    
        return redirect()->back()->with('success', 'Payment marked as Unpaid.');
    }
    

    public function trash(): View
    {
        $payments = Payments::onlyTrashed()->get();
    
        return view('admin.p_trash', compact('payments'));
    }

    
    public function restore($id): RedirectResponse
    {
        $payments = Payments::onlyTrashed()->findOrFail($id);
        $payments->restore();
    
        return redirect()->route('admin.p_index')->with('success', 'Payments restored successfully');
    }



    public function forceDelete($id): RedirectResponse
    {
        $payments = Payments::onlyTrashed()->findOrFail($id);
        $payments->forceDelete(); // Permanently delete

        return redirect()->route('admin.p_trash')->with('success', 'Payments permanently deleted');
    }

    public function searchpaid(Request $request)
{

    $query = Payments::where('status', 1);

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where(function ($query) use ($search) {
            $query->where('firstname', 'LIKE', "%$search%")
                ->orWhere('lastname', 'LIKE', "%$search%")
                ->orWhere('amount', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%"); 
        });
    }

    $paidPayments = $query->paginate(5);

    return view('admin.p_paid-persons', compact('paidPayments'));
}


public function searchUnpaid(Request $request)
{

    $query = Payments::where('status', 0);

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where(function ($query) use ($search) {
            $query->where('firstname', 'LIKE', "%$search%")
                ->orWhere('lastname', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('amount', 'LIKE', "%$search%"); 
        });
    }

    $unpaidPayments = $query->paginate(5);

    return view('admin.p_unpaid-persons', compact('unpaidPayments'));
}
}