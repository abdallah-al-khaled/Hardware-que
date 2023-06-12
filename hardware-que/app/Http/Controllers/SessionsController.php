<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // validate the request
        // find in in the users table the email that exist or if it exist
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // attempt to authenticate and log in the user
        // based on the provided credentials
        if (! auth()->attempt($attributes)) {

            throw ValidationException::withMessages([
                'email'=>'your provided credentials could not be verified.'
            ]);

        }
    

        session()->regenerate();
        // redirect with a success flash message
            // it will check if the password and the email maches each other
            return redirect('/');
        
    }
}
