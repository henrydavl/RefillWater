@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Bottle List</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(count($bottles) > 0)
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Capacity</th>
                                <th>Price</th>
                                <th>Owned by</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bottles as $bottle)
                                <tr class="text-center">
                                    <td>{{$bottle->id}}</td>
                                    <td>{{$bottle->capacity}}</td>
                                    <td>{{$bottle->price}}</td>
                                    <td>{{$bottle->user->name}}</td>
                                    <td style="width: 150px;">
                                    <div class="row no-gutters">
                                        <div class="col md-12">
                                            <button class="btn btn-info btn-circle" title="Edit Game" type="button" data-toggle="modal"
                                                    data-target="#editModal-{{$bottle->id}}"><i class="fas fa-edit"></i></button>
                                            @include('admin.bottle.crud.edit')
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