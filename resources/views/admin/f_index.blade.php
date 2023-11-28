


@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert text-white bg-dark bg-gradient">
        {{ session('success') }}
    </div>
@endif


<br><br><br><br>
<div class="container">
<h1 class="text-danger"> Feedbacks</h1><br>
<div class="container col-sm-9 border border-secondary p-3 ">


    <table id="acc_apptsTbl" class="display">
       
          <tbody>
          @foreach ($feedbacks as $feedback)
            <tr> 
        
            <td>  <div class="overflow-hidden shadow-lg p-3 mt-3 ">
            <p> <h4> {{ $feedback->id}}</h4>{{ $feedback->content}}</p>    
            </div></td>
           
            </tr>
            <tr> 
                <td>
            <form action="{{ route('feedback.destroy',$feedback->id) }}" method="POST"><br>
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteConfirmationModal{{ $feedback->id }}">Delete</button>

                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteConfirmationModal{{ $feedback->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="deleteConfirmationModalLabel{{ $feedback->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title"
                                                id="deleteConfirmationModalLabel{{ $feedback->id }}">Delete Confirmation</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="lead">Are you sure you want to delete this feedback permanently?</p>
                                        </div>
                                        <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete Permanently</button>
                                            </form>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Delete Confirmation Modal -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
