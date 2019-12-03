@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Top Up List</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Amount</th>
                                <th>Admin ID</th>
                                <th>Is Claimed</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($topups as $topup)
                                <tr class="text-center">
                                    <td>{{$topup->id }}</td>
                                    <td>{{$topup->user_id}}</td>
                                    <td>{{$topup->amount}}</td>
                                    <td>{{$topup->admin_id}}</td>
                                    <td>{{$topup->is_claimed}}</td>
                                    <td>
                                        <form action="{{route('topup.destroy', $topup->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger btn-circle" title="Delete User" type="submit"><i class="fas fa-trash"></i>
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