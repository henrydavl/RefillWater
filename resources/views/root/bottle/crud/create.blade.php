@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Create New Bottle</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Capacity</th>
                                <th>Price</th>
                                <th>User ID</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bottle as $bottle)
                                <tr class="text-center">
                                    <td>{{$bottle->id}}</td>
                                    <td>{{$bottle->capacity}}</td>
                                    <td>{{$bottle->price}}</td>
                                    <td>{{$bottle->user_id}}</td>
                                    <td><button class="btn btn-warning btn-circle" title="create" type="submit" onclick="{{ url('/bottlecreate') }}"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                   
                </div>
            </div>
        </div>
    </div>
@endsection