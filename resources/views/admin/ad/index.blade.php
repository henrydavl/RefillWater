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
                    @if(count($ads) > 0)
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
                            @foreach($ads as $ad)
                                <tr class="text-center">
                                    <td>{{$ad->id}}</td>
                                    <td>{{$ad->title}}</td>
                                    <td>{{$ad->description}}</td>
                                    <td><img src="{{ asset('images/' . $ad->image_path) }}" height="50"></td>
                                    <td>{{$ad->start_date}}</td>
                                    <td>{{$ad->end_date}}</td>
                                    <td>{{$ad->price}}</td>
                                    <td style="width: 150px;">
                                        <div class="row no-gutters">
                                            <div class="col md-6">
                                                <form action="{{route('ad.edit', $ad->id)}}">
                                                    <button class="btn btn-info btn-circle" title="Edit Ads"><i class="fas fa-edit"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col md-6">
                                                <form action="{{route('ad.destroy', $ad->id)}}" method="POST">
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