<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Appointments;
use App\Models\Instructor;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;
use App\Models\Admins;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Payments;


class DashboardController extends Controller
{
    public function index()
    {
        $totalAdmins = Admin::count();
        $totalInstructor = Instructor::count();
        $totalClient = Client::count();
        $totalAppointments = Appointment::count();
        $totalPayments = Payments::count();
        $totalPaidPayments = Payments::where('status', 1)->sum('amount');
        $totalUnPaidPayments = Payments::where('status', 0)->sum('amount');
        $totalAmount = Payments::sum('amount');
        $paidPayments = Payments::where('status', 1)->get();
        $unpaidPayments = Payments::where('status', 0)->get();
        return view('admin.a_dashboard', compact('totalAdmins', 'totalInstructor', 'totalClient', 'totalPayments','totalAmount','totalUnPaidPayments', 'totalPaidPayments','paidPayments','unpaidPayments', 'totalAppointments'));
    }
}
