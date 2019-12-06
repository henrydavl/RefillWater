<!-- The Modal -->
<div class="modal fade" id="addmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">New Reward</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <form action="{{route ('rewards.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" name="amount" class="form-control" required placeholder="Enter Amount">
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label>User</label>
                        <select class="custom-select sel-user" name="user_id" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Give Reward</button>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>