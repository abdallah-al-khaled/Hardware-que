<?php


namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // return request()->all();
        // unique:database table name , whitch column
        $attributes = request()->validate([
            'name' => 'required|max:255',
            // 'username' => 'required|min:3|max:255|unique:users,username'
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255'
            // or  'password' => ['required', 'min:7', 'max:255'] same shit
            // or 'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')]

        ]);
        $user = User::create($attributes);

        // session()->flash('success', 'Your account has been created');
        // or you can use with method
        auth()->login($user);
        // we set in App\Providers rout services prov that home is '/'

        return redirect('/');
    }
}
