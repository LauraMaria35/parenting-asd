<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    //

    public function editComment(Request $request)
    {

        $request->validate([
            'editCommentTextarea' => 'required|max:500'
        ]);


        $commentText = $request->editCommentTextarea;
        $commentId = $request->commentIdInput;

        Comment::where('id', $commentId)->update(['text' => $commentText]);

        return \redirect()->back();
    }

    public function deleteComment(Request $request){

        $commentId = $request->commentId;
        $comment = Comment::find($commentId);

        $comment->delete();

        return redirect()->back();

    }
}
