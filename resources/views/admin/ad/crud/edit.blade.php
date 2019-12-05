<!-- The Modal -->
<div class="modal fade" id="editModal-{{$ad->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Ads #{{$ad->title}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <div class="text-center py-2">
                    <img src="{{ asset('storage/image/'.$ad->image_path) }}" height="250" class="img-profile" id="imgEdit">
                </div>
                <form action="{{ route('advertisement.update', $ad->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{$ad->title}}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" value="{{$ad->description}}">
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label>Image</label>
                        <input type="file" name="image" id="imgNew"/>
                    </div>
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{$ad->start_date}}">
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{$ad->end_date}}">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control" value="{{$ad->price}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Advertisement</button>
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