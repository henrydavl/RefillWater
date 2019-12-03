@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Edit Bottle</h1>
            </div>
            <div class="card body">
                <div class="col-md-12" style="margin-top: 1em;">
                
                    <form action="{{ route('bottle.update', $bottle->id) }}" method="post">
                    <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Capacity</label>
                            <input type="number" name="capacity" class="form-control" required placeholder="{{$bottle->capacity}}">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" required placeholder="{{$bottle->price}}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Edit Bottle</button>
                            <a class="btn btn-danger" href="{{route('bottle.index')}}">Cancel</a>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
@endsection