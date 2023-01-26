<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\Post;
use App\Models\Comment;

class PostsController extends Controller
{
    //
    public function getTimeAgo($carbonObject)
    {
        return str_ireplace(
            [' seconds', ' second', ' minutes', ' minute', ' hours', ' hour', ' days', ' day', ' weeks', ' week'],
            ['s', 's', 'm', 'm', 'h', 'h', 'd', 'd', 'w', 'w'],
            $carbonObject->diffForHumans()
        );
    }

    public function createNewPost(Request $request)
    {

        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif|max:3000',
            'text' => 'required|max:900'
        ]);

        if ($request->string('text')->isNotEmpty()) {
            $time = time();
            //$time->getTimeAgo($time->created_at);

            if ($request->hasFile('image')) {

                if ($request->file('image')->isValid()) {

                    $extension = $request->file('image')->extension();

                    $request->file('image')->storeAs('/public/posts/', $time . '.' . $extension);

                    $post = new Post();
                    $post->text = $request->text;
                    $post->user_id = Auth::user()->id;
                    $post->image = $time . '.' . $extension;

                    $post->save();
                    return view('updates');
                } else {
                    return \redirect()->back()->with('status', '');
                }
            } else {
                $post = new Post();
                $post->text = $request->text;
                $post->image = Null;
                $post->user_id = Auth::user()->id;
                $post->save();
            }
            $post = Post::find('id');
            $post = Post::with('user')->whereIn('user_id', function ($query) {
                $query->select('user_id')->from('posts');
            })->orderBy('created_at', 'desc')->get();
            return view('home', ['posts' => $post]);
        } else {

            return \redirect()->back()->with('status', 'write something first!');
        }
    }

    public function friendsPosts()
    {
        $posts = Post::with('user')->whereIn('user_id', function ($query) {
            $query->select('user1_id')->from('friends')->where('user2_id', Auth::user()->id)->where('accepted', 1);
        })->orWhereIn('user_id', function ($query) {
            $query->select('user2_id')->from('friends')->where('user1_id', Auth::user()->id)->where('accepted', 1);
        })->orderBy('created_at', 'desc')->paginate(3);

        return view('friendsPosts', ['posts' => $posts]);
    }

    public function singlePost($id)
    {
        $user = Post::find('user');
        $post = Post::find($id);

        return view('singlePost', ['post' => $post]);
    }

    public function sendComment(Request $request)
    {

        $request->validate([
            'text' => 'required|max:900'
        ]);
        $user = Comment::find('user');
        $comment = new Comment();
        $comment->post_id = $request->postId;
        $comment->text = $request->text;
        $comment->user_id = Auth::user()->id;

        $comment->save();

        return redirect()->back();
    }


    public function myPosts()
    {

        $posts = Post::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(4);
        return view('myPosts', ['posts' => $posts]);
    }

    public function deletePost($id)
    {

        $post = Post::find($id);

        if (Auth::user()->id == $post->user_id) {
            $post->delete();
            return redirect()->back()->with('status', 'post has been deleted successfully');
        } else {
            return redirect()->back()->with('status', 'you cannot delete this post');
        }
    }

    public function editPostForm($id)
    {
        $post = Post::find($id);
        return view('editPostForm', ['post' => $post]);
    }

    public function editPost(Request $request)
    {
        if (Auth::user()->id == $request->userId) {
            $request->validate([
                'text' => 'max:2000',
                'image' => 'image|max:3000',

            ]);

            $toBeUpdated = ["text" => $request->text];

            if ($request->has('image')) {
                if ($request->file('image')->isValid()) {
                    $extension = $request->file('image')->extension();

                    $request->file('image')->storeAs('posts', time() . '.' . $extension);

                    $toBeUpdated['image'] = time() . '.' . $extension;

                    $postId = $request->postId;
                    $post = Post::where('id', $postId)->get();
                    $oldImage = $post[0]->image;
                    Storage::disk('public')->delete('posts/' . $oldImage);
                }
            }


            Post::where("id", $request->postId)->update($toBeUpdated);

            $posts = Post::where('user_id', Auth::user()->id)->get();
            return \redirect()->route('myPosts', ['posts' => $posts]);
        } else {
        }
    }

    public function searchForPosts(Request $request)
    {

        $keyword = $request->searchInput;

        $posts = Post::where('text', 'like', "%" . $keyword . "%")->get();

        return view('searchResults', ['posts' => $posts]);
    }

    public function didUserLikeThisPost(Request $request){
        $user_id = $request->user_id;
        $post_id = $request->post_id;

        $didUserLikeThisPost = DB::table('likes')->where(['user_id'=>$user_id,'post_id'=>$post_id])->exists();

        return $didUserLikeThisPost;
    }

    public function likeThisPost(Request $request)
    {
        $user_id = $request->user_id;
        $post_id = $request->post_id;

        $didUserLikeThisPost = $this->didUserLikeThisPost($request);

        if (!$didUserLikeThisPost) {

            //take user_id, post_id -> store in likes

            DB::table('likes')->insert(['user_id' => $user_id, 'post_id' => $post_id]);

            //increase number_of_likes in posts
            DB::table('posts')->where('id', $post_id)->increment('number_of_likes', 1);

            $post = Post::find($post_id);

            return $post;

            //user already liked this post -> unlike this post
        }else{

            //take user_id, post_id -> store in likes

            DB::table('likes')->where(['user_id' => $user_id, 'post_id' => $post_id])->delete();

            //decrease number_of_likes in posts
            DB::table('posts')->where('id', $post_id)->decrement('number_of_likes', 1);

            $post = Post::find($post_id);

            return $post;
        }
    }
}
