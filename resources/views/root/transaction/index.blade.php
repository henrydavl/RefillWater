@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Bottle Management</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(count($transaction) > 0)
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>User</th>
                                <th>Bottle </th>
                                <th>Galon</th>   
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transaction as $tran)
                                <tr class="text-center">
                                    <td>{{$tran->id}}</td>
                                    <td>{{$tran->capacity}}</td>
                                    <td>{{$tran->price}}</td>
                                    <td>{{$tran->user->name}}</td>
                                    <td style="width: 150px;">
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