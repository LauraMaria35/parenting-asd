

<div id="editCommentForm">
    <!--Modal content -->
    <div id="editContentFormContent">
        <span class="close-edit-comment-form">&times;</span>
        <h4>Edit Your Comment</h4>
        <form action="{{route('editComment')}}" method="post">
            {{csrf_field()}}
            <textarea class="form-control" rows="5" maxlength="255" id="editCommentTextarea" name="editCommentTextarea" placeholder="Your Comment Goes Here" aria-label="With textarea"></textarea>
            <input type="hidden" id="commentIdInput" name="commentIdInput">
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-succes btn-block">submit
                </button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>