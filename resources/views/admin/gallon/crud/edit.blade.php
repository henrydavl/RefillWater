<!-- The Modal -->
<div class="modal fade" id="editModal-{{$gallon->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Gallon #{{$gallon->id}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <form action="{{route ('gallon.update', $gallon->id)}}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label>Capacity (ml)</label>
                        <input type="number" name="default_ml" class="form-control" required placeholder="Gallon max. capacity">
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label>Location</label>
                        <input type="text" name="description" class="form-control" required placeholder="Gallon Location">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Gallon</button>
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