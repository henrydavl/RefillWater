@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Gallons Management</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(count($gallons) > 0)
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Current ml</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Refilled</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gallons as $gallon)
                                <tr class="text-center">
                                    <td>{{$gallon->id}}</td>
                                    <td>{{$gallon->current_ml?:'-'}}</td>
                                    <td>{{$gallon->description}}</td>
                                    <td>{{$gallon->is_empty == 1 ? 'Empty' : 'Available' }}</td>
                                    <td>{{$gallon->nRefill}}</td>
                                    <td style="width: 150px;">
                                    <div class="row no-gutters">
                                        <div class="col md-6">
                                            <form action="{{route('bottle.edit', $gallon->id)}}">
                                                    <button class="btn btn-info btn-circle" title="Edit Bottle"><i class="fas fa-edit"></i>
                                                    </button>
                                            </form>
                                        </div>
                                        <div class="col md-6">
                                            <form action="{{route('bottle.destroy', $gallon->id)}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-danger btn-circle" title="Delete User" type="submit"><i class="fas fa-trash"></i>
                                                    </button>
                                            </form>
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