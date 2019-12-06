@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Advertisement List</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(count($ads) > 0)
                        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                            <thead>
                            <tr class="text-center">
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ads as $ad)
                                <tr class="text-center">
                                    <td>{{$ad->title}}</td>
                                    <td>{{$ad->description}}</td>
                                    <td><a href="" data-toggle="modal" data-target="#showModal-{{$ad->id}}"><img src="{{ asset('storage/image/'.$ad->image_path) }}" height="70"></a>
                                        @include('inc.modal.show')
                                    </td>
                                    <td>{{$ad->start_date}}</td>
                                    <td>{{$ad->end_date}}</td>
                                    <td>{{$ad->price}}</td>
                                    <td style="width: 150px;">
                                    <div class="row no-gutters">
                                        <div class="col md-6">
                                            <button class="btn btn-info btn-circle" title="Edit Game" type="button" data-toggle="modal"
                                                    data-target="#editModal-{{$ad->id}}"><i class="fas fa-edit"></i></button>
                                            @include('admin.ad.crud.edit')
                                        </div>
                                        <div class="col md-6">
                                            <form action="{{route('advertisement.destroy', $ad->id)}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-danger btn-circle" title="Delete Ads" type="submit"><i class="fas fa-trash"></i></button>
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