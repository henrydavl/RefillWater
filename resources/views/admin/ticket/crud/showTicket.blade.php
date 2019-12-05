<!-- The Modal -->
<div class="modal fade" id="showModal-{{$ticket->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ticket <b>{{$ticket->title}}</b> Detail's</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="text-align: left;">
                <div class="form-group">
                    <label>Title</label>
                    <p>{{$ticket->title}}</p>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <p>{{$ticket->description}}</p>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>