<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Friend;

class UsersController extends Controller
{
    //

    public function updateUserInfo(Request $request)
    {

        $request->validate([
            'email' => ['required', Rule::unique('users')->ignore(Auth::user()->id)],
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',

        ]);

        $password = Hash::make($request->password);

        $toBeUpdated = ["name" => $request->name, "email" => $request->email, "country" => $request->country, "city" => $request->city, "description" => $request->description, 'password' => $password, "status"=>$request->status, "diagnostic" => $request->diagnostic, "therapies" =>$request->therapies, "challenges"=>$request->challenges];

        $userId = Auth::user()->id;
        User::where("id", $userId)->update($toBeUpdated);

        return \redirect()->back()->with('message', 'Data updated successfuly');
    }

    public function uploadUserAvatar(Request $request)
    {
        $request->validate([
            'change_image' => 'image|mimes:jpg,png,jpeg|max:3000',
        ]);

        if ($request->file('change_image')->isValid()) {
            $id = Auth::user()->id;
            $extension = $request->file('change_image')->extension();
            $change_image = $request->file('change_image');
            $change_image->storeAs('/public/images', $id . '.' . $extension);
            // $save = new User;

            // $save->avatar = $change_image;
            // $save->path = $path;

            // $save->save();

            User::where('id', $id)->update(['avatar' => $id . '.' . $extension]);

            return \redirect()->back();
        } else {
            return \redirect()->back()->with('status', 'error... image was not uploaded successfuly!!!!');
        }
    }

    public function addNewPostForm()
    {
        return view('home');
    }

    public function userProfile($id)
    {
        $user = User::find($id);

        $query1 = Friend::where('user1_id', Auth::user()->id)->where('user2_id', $id)->first();
        $query2 = Friend::where('user1_id', $id)->where('user2_id', Auth::user()->id)->first();


        /*
    1 ==> we are friends
    2 ==> I'm waiting for his response
    3 ==> he is waiting for my response
    4 ==> no relationship

*/

        if ($query1 != null) {

            //we are friends
            if ($query1->accepted) {
                $friendship_status = 1;

                // I'm waiting for his response
            } else {
                $friendship_status = 2;
            }
        } else {

            if ($query2 != null) {


                //we are friends
                if ($query2->accepted) {
                    $friendship_status = 1;

                    //he is waiting for my response
                } else {
                    $friendship_status = 3;
                }

                //there is no relationship
            } else {
                $friendship_status = 0;
            }
        }

        return view('userProfile', ['user' => $user, 'friendship_status' => $friendship_status]);
    }

    public function blog()
    {
        return view('blog');
    }
}
