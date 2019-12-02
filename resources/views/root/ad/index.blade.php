@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Advertisement Management</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image Path</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ads as $ads)
                                <tr class="text-center">
                                    <td>{{$ads->id}}</td>
                                    <td>{{$ads->title}}</td>
                                    <td>{{$ads->description}}</td>                           
                                    <td><img src="{{ asset('images/' . $ads->image_path) }}" height="50"></td>
                                    <td>{{$ads->start_date}}</td>
                                    <td>{{$ads->end_date}}</td>
                                    <td>{{$ads->price}}</td>
                                    <td style="width: 150px;">
                                    <div class="row no-gutters">
                                        <div class="col md-6">
                                            <form action="{{route('ad.edit', $ads->id)}}">   
                                                    <button class="btn btn-info btn-circle" title="Edit Ads"><i class="fas fa-edit"></i>
                                                    </button>
                                            </form>
                                        </div>
                                        <div class="col md-6">
                                            <form action="{{route('ad.destroy', $ads->id)}}" method="POST">
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
                   
                </div>
            </div>
        </div>
    </div>
@endsection