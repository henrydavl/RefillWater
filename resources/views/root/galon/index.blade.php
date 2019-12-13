@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Gallon List</h1>
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
                                <th>Status IOT</th>
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
                                    <td>@if($gallon->is_on == '1')<p class="text-warning">Processing ({{$gallon->current_request}})</p>@else<p class="text-success">Idle</p>@endif</td>
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