<div class="modal" tabindex="-1" id="ModalDeleteComment">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p> Are you sure , you want to delete ? </p>
            </div>
            <div class="modal-footer">

                <form method="POST" action=>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    @csrf
                    @method('DELETE')
                    <button href=" " type="submit"  class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
