<div class="modal fade" id="alertModal-{{$gallon->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Galon#{{$gallon->id}}</h5>
                <button class="close" type="button" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">{{$gallon->descrtiption . ' habis!'}}</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>