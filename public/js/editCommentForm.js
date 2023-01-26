function showEditCommentForm(commentText, commentId){

    //Get the Popp Window
    var editCommentForm = document.getElementById("editCommentForm");
    //Get the <span> element that closes the modal
    var closeEditCommentForm = document.getElementsByClassName("close-edit-comment-form")[0];
    //Get Textarea
    var editCommentTextarea = document.getElementById('editCommentTextarea');
    //Get Comment id input
    var commentIdInput = document.getElementById('commentIdInput');

    editCommentForm.style.display = "block";
    editCommentTextarea.innerHTML = commentText;
    commentIdInput.value = commentId;

    //When the user clicks on <span> (x), close the modal
    closeEditCommentForm.onclick = function() {
        editCommentForm.style.display = "none";
        editCommentTextarea.innerHTML = "";
        commentIdInput.value = "";
    }

    window.onclick = function(event){
        if (event.target == editCommentForm){
            editCommentForm.style.display = "none";
            editCommentTextarea.innerHTML = "";
            commentIdInput.value = "";
        }
    }
}