@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">User List</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(count($users) > 0)
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                            <tr class="text-center">
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Major</th>
                                <th>Balance</th>
                                <th>Login Status</th>
                                <th>Account Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="text-center">
                                    <td>{{ucwords($user->name)}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>@if($user->gender == 'L') <p class="text-info">Male</p> @else <p class="text-danger">Female</p> @endif </td>
                                    <td>{{ $user->majors }}</td>
                                    <td>{{ $user->balance }} points</td>
                                    <td>@if($user->is_login == '1') <p class="text-success">Logged in</p> @else <p>Logged Out</p> @endif </td>
                                    <td>@if($user->is_active == '1') <p class="text-success">Enabled</p> @else <p class="text-danger">Disabled</p> @endif</td>
                                    <td width="150px">
                                        <div class="row no-gutters">
                                            <div class="col-md-12">
                                                @if($user->is_active == '1')
                                                    <form action="{{route('users.deactivate')}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input name="id" type="hidden" value="{{$user->id}}">
                                                        <button class="btn btn-warning btn-circle" title="Deactivate User" type="submit"><i class="fas fa-exclamation-triangle"></i></button>
                                                    </form>
                                                @else
                                                    <form action="{{route('users.activate')}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input name="id" type="hidden" value="{{$user->id}}">
                                                        <button class="btn btn-success btn-circle" title="Activate User" type="submit"><i class="fas fa-check"></i></button>
                                                    </form>
                                                @endif
                                            </div>
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