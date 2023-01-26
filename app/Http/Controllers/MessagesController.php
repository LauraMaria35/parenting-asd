<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

use Illuminate\Support\Facades\Auth;


class MessagesController extends Controller
{
    //
    public function messagesList()
    {

        // $messages = Message::where('user2_id', Auth::user()->id)->get();

        //geting last received message
$query1= Message::where('user2_id',Auth::user()->id)->orderBy('created_at','desc')->get()->unique('user1_id');

        //getting last sent message
        $query2= Message::where('user1_id',Auth::user()->id)->orderBy('created_at','desc')->get()->unique('user2_id');

        $messages = $query1->merge($query2);

        return view('messagesList', ['messages' => $messages]);
    }

//Implement Notifications:
    //1. notifications function in MessagesController (sessions)
    //2. notification route
    //3. notifications JS call (header.blade.php)
    //4. notifications session acces (header.blade.php)


public function notifications(Request $request){
    //getting last received message
    $query1 = Message::where('user2_id',Auth::user()->id)
    ->orderBy('created_at','desc')
    ->limit(5)->get()->unique('user1_id');

    $request->session()->put('notifications',$query1);
    
    return $query1;
    
}

    public function conversation($user_id)
    {

        $messages = Message::where(['user1_id' => $user_id, 'user2_id' => Auth::user()->id])->orWhere(['user1_id' => Auth::user()->id, 'user2_id' => $user_id])->orderBy('created_at', 'desc')->get();
        return view('conversation', ['user_id' => $user_id, 'messages' => $messages]);
    }

    public function sendMessage(Request $request)
    {
        $message = new Message();
        $message->text = $request->text;
        $message->user1_id = Auth::user()->id;
        $message->user2_id = $request->user_id;

        $message->save();

        return \redirect()->route('conversation', ['user_id' => $request->user_id]);
    }
}
