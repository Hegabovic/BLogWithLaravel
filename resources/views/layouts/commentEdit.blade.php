<div class="modal" tabindex="-1" id="ModalEditComment{{ $comment->id }}">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Comment </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route( 'post.updateComment', $comment->id)  }}">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $comment->description }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                    @csrf
                    @method('PUT')
                    <button  type="submit"  class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>
