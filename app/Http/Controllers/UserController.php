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

    return redirect('/')->with('message', 'You now have privileges!');
  }

  //Log user out
  public function destroy(Request $request) {
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message', 'You have been logged out!');
  }

  //Show login form
  public function login() {
    return view('users.login', [
      'pagetitle' => 'Testwebsite_Loi - Login',
      'heading' => 'Login'
    ]);
  }

  //Log user in
  public function authenticate(Request $request) {
    $loginUserFormFields = $request->validate([
      'email' => 'required|email|max:64',
      'password'=> 'required'
    ]);

    if (auth()->attempt($loginUserFormFields)) {
      $request->session()->regenerate();
      return redirect()->intended('/')->with('message', 'You are now logged in!');
    }

    return back()->withErrors([
      'email' => 'The provided data is incorrect.',
    ]);
  }
}