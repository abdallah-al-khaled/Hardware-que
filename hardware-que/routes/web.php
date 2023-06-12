<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/auth/{provider}/redirect', function ($provider) {
    return Socialite::driver($provider)->redirect();
});

Route::get('/auth/{provider}/callback', function ($provider) {
    try {
        $socialiteUser = Socialite::driver($provider)->user();
    } catch (\Exception $e) {
        return redirect('/login');
    }

    $user = \App\Models\User::where([
        'provider' => $provider,
        'provider_id' => $socialiteUser->getId()
    ])->first();



    if (!$user) {

        // 3mlna hak 3ashan 2za 3aml registration ww rj3 3ml login mn github acc bnafs ll account
        $validator = \Illuminate\Support\Facades\Validator::make(
            ['email' => $socialiteUser->getEmail()],
            ['email' => ['unique:users,email']],
            ['email.unique' => 'Couldn\'t log in. Maybe you used a different login method?']
        );

        if($validator->fails()) {
            return redirect('/login')->with('success', 'Maybe you used a different login method?');
        }


        $user = \App\Models\User::create([
            'name' => $socialiteUser->getName(),
            'username' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
            'provider' => $provider,
            'provider_id' => $socialiteUser->getId(),
            'email_verified_at' => now()
        ]);
    }
    Auth::login($user);
    return redirect('/');

    ddd($socialiteUser->getName(), $socialiteUser->getEmail(), $socialiteUser->getId());

    // $user->token
});



Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');

Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
//you can view this page if you are a guest or this is the first time to enter the page 
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
// if you make post request aka submit
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('can:admin');

Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('can:admin');

Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('can:admin');

Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('can:admin');

Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('can:admin');
