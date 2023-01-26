<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friend;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;



class FriendsController extends Controller
{
    //

    public function findFriends()
    {
        //$users = User::all();
        $id = Auth::user()->id;
        $users = User::whereNotIn('id', [$id])->paginate(5);
        return view('findFriends', ['users' => $users]);
    }

    public function friendRequests()
    {
        $users = DB::table('users')->rightJoin('friends', function ($join) {
            $join->on('users.id', '=', 'friends.user1_id');
        })->where('user2_id', Auth::user()->id)->where('accepted', 0)->get();

        return view('friendRequests', ['users' => $users]);
        
    }


    public function modifyFriendship($friendship_status, $user_id)
    {
       
        //remove friend
        if ($friendship_status == 1) {

            DB::table('friends')->where('user1_id', Auth::user()->id)->where('user2_id', $user_id)->delete();
            DB::table('friends')->where('user1_id', $user_id)->where('user2_id', Auth::user()->id)->delete();

            DB::table('users')->where('id',Auth::user()->id)->update(['number_of_friends' => DB::raw('number_of_friends - 1')]);
            DB::table('users')->where('id',$user_id)->update(['number_of_friends' => DB::raw('number_of_friends - 1')]);

            return \redirect('findFriends')->with('status', 'friend was removed');

            //friend request sent
        } else if ($friendship_status == 2) {

            return \redirect('findFriends')->with('status', 'friend request was already sent, wait for response');

            //accept friendship
        } else if ($friendship_status == 3) {

            DB::table('friends')->where('user1_id', $user_id)->where('user2_id', Auth::user()->id)->update(['accepted' => 1]);
            DB::table('users')->where('id',Auth::user()->id)->update(['number_of_friends' => DB::raw('number_of_friends + 1')]);
            DB::table('users')->where('id',$user_id)->update(['number_of_friends' => DB::raw('number_of_friends + 1')]);

            return \redirect('friends')->with('status', "you're now friends");

            //add friend
        } else if ($friendship_status == 0){
           
            $friend = new Friend();
            $friend->user1_id = Auth::user()->id;
            $friend->user2_id = $user_id;
            $friend->accepted = 0;

            $friend->save();
            return \redirect('findFriends')->with('status', "friend request sent successfully");
        }else{}
    }

    public function checkoutFriends()
    {
        $users = DB::table('users')->whereIn('id', function ($query) {
            $query->select('user1_id')->from('friends')->where('user2_id', Auth::user()->id)->where('accepted', 1);
        })->orWhereIn('id', function ($query) {
            $query->select('user2_id')->from('friends')->where('user1_id', Auth::user()->id)->where('accepted', 1);
        })->paginate(5);
        return view('friends', ['users' => $users]);
    }

    public function articles()
    {
        return view('articles');
    }
}
