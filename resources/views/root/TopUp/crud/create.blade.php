@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        @include('inc.alert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h4 mb-0 font-weight-bold text-primary">Add New Top Up</h1>
            </div>
            <div class="card body">
                <div class="col-md-12" style="margin-top: 1em;">
                    <form action="{{ route('topup.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" name="amount" class="form-control" required placeholder="Enter Amount">
                        </div>
                        <div class="form-group">
                            <label>User ID</label>
                            <input type="number" name="user_id" class="form-control" required placeholder="Enter User ID">
                        </div>
                        <div class="form-group">
                            <label>Admin ID</label>
                            <input type="number" name="admin_id" class="form-control" required placeholder="Enter Admin ID">
                        </div>
                        
                        
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Confirm</button>
                            <button class="btn btn-danger" type="reset">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection