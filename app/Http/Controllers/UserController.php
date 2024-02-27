<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

 public function store(Request $request){
    $formFields = $request->validate([
        'name' => ['required', 'min:3'],
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'password' => 'required|confirmed|min:6'
    ]);

    $formFields['password'] = bcrypt($formFields['password']);
    
    //Create User
    $user = User::create($formFields);

    //Login
    auth()->login($user);

return redirect('/')->with('message','User Created Successfully');
 }

public function logout(Request $request){
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message','You are Successfully logout');
}

//Show Login form
public function login(){
    return view('users.login');
}

// Authenticate USer
public function authenticate(Request $request){
    
    // Validate the form fields
    $formFields = $request->validate([       
        'email' => ['required', 'email'],
        'password' => 'required'
    ]);

    // Attempt to authenticate the user
    if (auth()->attempt($formFields)) {
        $request->session()->regenerate();

        // Redirect to the home 
        return redirect('/')->with('message', 'You are now logged in');
    }

     // Redirect back 
     return back()->withErrors(['email' => 'Invalid Credentials']);

}


}