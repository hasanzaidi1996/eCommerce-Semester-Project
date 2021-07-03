<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

Session();

class UserController extends Controller
{
    // gets the data from the signup form
    function signup(Request $req) {

        $userData = User::where(['email'=>$req->email])->first();

        if($userData == NULL) {
            
            // creating a new record in the database by creating the instance
            // of the User model
            $user = new User();
            $user->first_name = $req->firstName;
            $user->last_name = $req->lastName;
            $user->user_name = $req->username;
            $user->email = $req->email;
            $user->password = $req->password;
            $user->profile = $req->profile_pic;
            $user->save(); 
            
            $userData = User::where(['email'=>$req->email])->first();
            $req->session()->put('user', $userData);

            return redirect('/home');
        } 
        else {
            // user already exists
            return redirect('/user_exists');
        }
    }

    function login(Request $req) {
        $userData = User::where(['user_name' => $req->username])->first();

        if($userData == NULL) {
            return redirect('/failure');
        } else if(($userData->user_name == $req->username && $userData->password == $req->password)) {
            $req->session()->put('user', $userData);
        }
        
        $expireTime = time() + 60 * 60 * 24; // 24 hours
        if (!empty($_POST["RememberMe"])) {
            setcookie("username", $_POST["username"], $expireTime);
            setcookie("password", $_POST["password"], $expireTime);
            return redirect('/home');
        } else {
            // invalid username or password
            return redirect('/failure');
        }
    }
    

    // send message -> contact page
    function sendMessage() {
        if(Session()->has('user')) {
            return redirect('/msg_sent');
        } else {
            return redirect('/login');
        }
    }

    function updateProfile(Request $req) {
        $userID = Session()->get('user')['id'];

        $username = $req->username;
        $email = $req->email;
        $profile = "/images/".$req->profile_pic;

        DB::update('UPDATE users SET user_name = ?, email = ?, profile = ? WHERE id = ?',
         [$username, $email, $profile, $userID]);

        return redirect('/profile');
    }

    function displayProfileDetails() {
        $userID = Session()->get('user')['id'];
        $profileDetails = User::where('id', '=', $userID)->get();

        return view('profile', ['details' => $profileDetails]);
        // return $profileDetails;
    }
}

