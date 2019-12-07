@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Add New Gallon</h1>
            </div>
            <div class="card body">
                <div class="col-md-12" style="margin-top: 1em;">
                    <form action="{{ route('bottle.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Current_ml</label>
                            <input type="number" name="capacity" class="form-control" required placeholder="Enter Current_ml (mL)">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="number" name="price" class="form-control" required placeholder="Enter Price (Rp)">
                        </div>
                        <div class="form-group">
                            <label>Id</label>
                            <select class="custom-select sel-user" name="user">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Create New Gallon</button>
                            <button class="btn btn-danger" type="reset">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection