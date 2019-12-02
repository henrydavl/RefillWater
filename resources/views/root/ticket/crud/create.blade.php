@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Add New Ticket</h1>
            </div>
            <div class="card body">
                <div class="col-md-12" style="margin-top: 1em;">
                    <form action="{{ route('ticket.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" required placeholder="Enter Title...">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" required placeholder="Enter Description...">
                        </div>
                        <div class="form-group">
                          <label>Submitted by</label>
                          <input type="number" name="submitted_by" class="form-control" required placeholder="Submitted by...">
                        </div>
                        <div class="form-group">
                          <label>Responded by</label>
                          <input type="number" name="responded_by" class="form-control" required placeholder="Responded by...">
                        </div>
                        <div class="form-group">
                          <label>Is Done</label>
                          <br>
                          <input type="radio" name="is_done" value="0"> 0<br>
                          <input type="radio" name="is_done" value="1"> 1
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Confirm Ticket</button>
                            <button class="btn btn-danger" type="reset">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection