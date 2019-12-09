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
                    @if(count($tickets) > 0)
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Submitted by</th>
                                <th>Responded by</th>
                                <th>Status</th>
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
                                    <td><b class="text-info">{{$ticket->submitter->name}}</b></td>
                                    <td><b class="text-success">{{$ticket->responded_by ? $ticket->responder->name.' ('.$ticket->responder->role->name.'-Admin)' : '-'}}</b></td>
                                    <td>@if($ticket->is_done == '0') <p class="text-info">Open</p> @else <p class="text-danger">Closed</p> @endif </td>
                                    <td>{{ $ticket->created_at ?: '-'}}</td>
                                    @if($ticket->updated_at != $ticket->created_at && $ticket->responded_by != null)
                                        <td>{{ $ticket->updated_at }}</td>
                                    @else
                                        <td> - </td>
                                    @endif
                                    <td>
                                        <form action="{{route('ticket.update', $ticket->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="PATCH">
                                            <input type="hidden" value="1" name="is_done">
                                            <button class="btn btn-success btn-circle" title="Close Ticket" type="submit" {{$ticket->is_done == '1' ? 'disabled' : ''}}><i class="fas fa-check"></i></button>
                                        </form>
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