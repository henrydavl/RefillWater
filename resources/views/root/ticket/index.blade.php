@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Ticket List</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Submitted by</th>
                                <th>Responded by</th>
                                <th>Is Done</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as $ticket)
                                <tr class="text-center">
                                    <td>{{$ticket->id }}</td>
                                    <td>{{$ticket->title}}</td>
                                    <td>{{$ticket->description}}</td>
                                    <td>{{$ticket->submitted_by}}</td>
                                    <td>{{$ticket->responded_by}}</td>
                                    <td>{{$ticket->is_done}}</td>
                                    <td>
                                        <form action="{{route('ticket.destroy', $ticket->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger btn-circle" title="Delete Ticket" type="submit"><i class="fas fa-trash"></i>
                                                </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                   
                </div>
            </div>
        </div>
    </div>
@endsection