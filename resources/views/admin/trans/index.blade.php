@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Transaction History</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(count($transaction) > 0)
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>User</th>
                                <th>Bottle (ml)</th>
                                <th>Price</th>
                                <th>Gallon Location</th>
                                <th>Payment Method</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transaction as $tran)
                                <tr class="text-center">
                                    <td>{{$tran->id}}</td>
                                    <td>{{$tran->user->name}}</td>
                                    <td>{{$tran->bottle->capacity}}</td>
                                    <td>{{$tran->bottle->price}}</td>
                                    <td>{{$tran->gallon->description}}</td>
                                    <td><b>{{$tran->is_auto == '1' ? 'Application' : 'Manual'}}</b></td>
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