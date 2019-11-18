@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Add New Advertisement</h1>
            </div>
            <div class="card body">
                <div class="col-md-12" style="margin-top: 1em;">
                    <form action="{{ route('ad.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" required placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" required placeholder="Enter Description">
                        </div>

                        <div class="form-group">
                            <label>Image Path</label>
                            <br>
                            <input type='file' name='image_path' class="btn btn-primary"/>
                        </div>

                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" name="start_date" class="form-control" required placeholder="Enter Start Date">
                        </div>
                        
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="date" name="end_date" class="form-control" required placeholder="Enter End Date">
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" required placeholder="Enter Price (Rp)">
                        </div>
                        
                        
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Create New Advertisement</button>
                            <button class="btn btn-danger" type="reset">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection