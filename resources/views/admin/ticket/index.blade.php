@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">My Ticket List</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(count($tickets) > 0)
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Responded by</th>
                                <th>Submitted at</th>
                                <th>Responded at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as $ticket)
                                <tr class="text-center">
                                    <td>{{$ticket->id }}</td>
                                    <td>{{$ticket->title}}</td>
                                    <td>{{$ticket->description}}</td>
                                    <td>@if($ticket->is_done == '0') <p class="text-info">Open</p> @else <p class="text-danger">Closed</p> @endif </td>
                                    <td><b class="text-success">{{$ticket->responded_by ? $ticket->responder->name.' ('.$ticket->responder->role->name.'-Admin)' : '-'}}</b></td>
                                    <td>{{ $ticket->created_at ?: '-'}}</td>
                                    @if($ticket->updated_at != $ticket->created_at && $ticket->responded_by != null)
                                        <td>{{ $ticket->updated_at }}</td>
                                    @else
                                        <td> - </td>
                                    @endif
                                    <td width="150px">
                                        <div class="row no-gutters">
                                            @if($ticket->is_done == '0')
                                                <div class="col-md-6">
                                                    <button class="btn btn-info btn-circle" title="Edit" type="button" data-toggle="modal"
                                                            data-target="#editModal-{{$ticket->id}}"><i class="fas fa-edit"></i></button>
                                                    @include('admin.ticket.crud.editTicket')
                                                </div>
                                                <div class="col-md-6">
                                                    <form action="{{route('tickets.destroy', $ticket->id)}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button class="btn btn-danger btn-circle" title="Delete Ticket" type="submit"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="col-md-12">
                                                    <button class="btn btn-info btn-circle" title="Detail" type="button" data-toggle="modal"
                                                            data-target="#showModal-{{$ticket->id}}"><i class="fas fa-search"></i></button>
                                                    @include('admin.ticket.crud.showTicket')
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h1 class="h4 mb-0 font-weight-bold text-primary">No Records</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection