{{-- @extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Edit Gallon</h1>
            </div>
            <div class="card body">
                <div class="col-md-12" style="margin-top: 1em;">
                
                    <form action="{{ route('bottle.update', $gallons->id) }}" method="post">
                    <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Description</label>
                            <input type="number" name="capacity" class="form-control" value="{{$gallons->description}}">
                        </div>
                        <div class="form-group">
                            <label>Current ml</label>
                            <input type="number" name="price" class="form-control" value="{{$bottle->current_ml}}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Edit Gallon</button>
                            <a class="btn btn-danger" href="{{route('bottle.index')}}">Cancel</a>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
@endsection --}}