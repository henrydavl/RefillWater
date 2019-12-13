<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row no-gutters">
            <div class="col md-10">
                <h1 class="h4 mb-0 font-weight-bold text-primary" style="margin-top: 0.2em;">Water Gallon List</h1>
            </div>
            <div class="col md-2">
                <button type="button" class="btn btn-dark btn-circle float-right" title="Give New Reward" data-toggle="modal"
                        data-target="#addmodal"><i class="fas fa-plus-circle"></i></button>
                @include('admin.gallon.crud.create')
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($gallons) > 0)
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Max. Capacity</th>
                        <th>Curr. Capacity</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Refilled</th>
                        <th>Device Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($gallons as $gallon)
                        <tr class="text-center">
                            <td>{{$gallon->id }}</td>
                            <td>{{$gallon->default_ml ? $gallon->default_ml .' (ml)' : '-'}}</td>
                            <td>{{$gallon->current_ml ? $gallon->current_ml .' (ml)' : '-'}}</td>
                            <td>{{$gallon->description}}</td>
                            <td>{{$gallon->is_empty == 1 ? 'Empty' : 'Available' }}</td>
                            <td>{{$gallon->nRefill .' times'}}</td>
                            <td>@if($gallon->is_on == '1')<p class="text-warning">Processing ({{$gallon->current_request}})</p>@else<p class="text-success">Idle</p>@endif</td>
                            <td style="width: 150px;">
                                <div class="row no-gutters">
                                    <div class="col md-6">
                                        <button class="btn btn-info btn-circle" title="Edit" type="button" data-toggle="modal"
                                                data-target="#editModal-{{$gallon->id}}"><i class="fas fa-edit"></i></button>
                                        @include('admin.gallon.crud.edit')
                                    </div>
                                    <div class="col md-6">
                                        <form action="{{route('gallon.destroy', $gallon->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-circle" title="Delete Gallon" type="submit"><i class="fas fa-trash"></i>
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