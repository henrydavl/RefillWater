<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row no-gutters">
            <div class="col md-10">
                <h1 class="h4 mb-0 font-weight-bold text-primary" style="margin-top: 0.2em;">Reward Transaction History</h1>
            </div>
            <div class="col md-2">
                <button type="button" class="btn btn-dark btn-circle float-right" title="Give New Reward" data-toggle="modal"
                        data-target="#addmodal"><i class="fas fa-plus-circle"></i></button>
                @include('bureau.reward.crud.create')
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($topups) > 0)
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Recipient</th>
                        <th>Amount</th>
                        <th>Submitter</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($topups as $topup)
                        <tr class="text-center">
                            <td>{{$topup->id }}</td>
                            <td>{{$topup->user->name .' ('.$topup->user->majors.')'}}</td>
                            <td>{{$topup->amount .' points'}}</td>
                            <td><b>{{$topup->admin->name .' ('.$topup->admin->role->name.'-Admin)'}}</b></td>
                            <td><b>@if($topup->is_claimed == '1') <p class="text-success">Claimed</p> @else <p class="text-info">Pending</p> @endif </b></td>
                            <td>
                                <form action="{{route('rewards.destroy', $topup->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-circle" title="Delete User" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
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