<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    //Show sign up form
    public function create() {
        return view('users.signup', [
            'pagetitle' => 'Testwebsite_Loi - Sign up',
            'heading' => 'Sign up'
        ]);
    }

    //create new user
    public function store(Request $request) {
        $signupUserFormFields = $request->validate([
            'name' => 'required|min:3|max:64',
            'email' => 'required|email', Rule::unique('users', 'email') . '|max:64',
            'password'=> 'required|min:8|confirmed'
        ]);
        // hash password
        $signupUserFormFields['password'] = bcrypt($signupUserFormFields['password']);
        //Create user
        $user = User::create($signupUserFormFields);
        //Log in user
        auth()->login($user);

        return redirect('/')->with('success', 'Welcome, You now have privileges!');

    }
}
