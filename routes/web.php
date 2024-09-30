<?php

use App\Http\Middleware\LogRequests;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMe;
use App\Http\Middleware\CheckAge;

// Route for displaying the Age verification form
Route::get('/', function () {
    return view('Age');
})->name('Age');

// Group routes logreq
Route::middleware([LogRequests::class])->group(function () {
    Route::post('/', function (Request $request) {
        return view('/adults');
    })->name('age.verify')->middleware(CheckAge::class);//route specific

Route::get('/homepage', function () {
    return view('homepage');
})->name('homepage');

    Route::get('/homepage/{username?}', function ($username = 'Guest') {
        return view('homepage', ['username' => $username]);
    })->where('username', '[a-zA-Z]+')->name('homepage');

    Route::get('/about/{username?}', function ($username = 'Guest') {
        return view('about', ['username' => $username]);
    })->where('username', '[a-zA-Z]+')->name('about');

    Route::get('/content/{username?}', function ($username = 'Guest') {
        return view('content', ['username' => $username]);
    })->where('username', '[a-zA-Z]+')->name('content');

    Route::get('/contact/{username?}', function ($username = 'Guest') {
        return view('contact', ['username' => $username]);
    })->where('username', '[a-zA-Z]+')->name('contact');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
});

// form submission and redirect to the homepage with username
Route::post('/homepage', function (Request $request) {
    $loginType = $request->input('login_type');
    $username = $loginType === 'guest' ? 'Guest' : $request->input('username');
    if ($loginType === 'user') {
        $request->validate(['username' => 'required|alpha']);
    }
    return redirect()->route('homepage', ['username' => $username]);
});

//Access Denied page
Route::get('/denied', function () {
    return view('denied');
})->name('denied');


// CheckAge middleware to restricted contents
Route::get('/adults', function () {
    return view('adults');
})->name('adults')->middleware(CheckAge::class.':21');


Route::get('/logout', function (Request $request) {
    $request->session()->forget('age');
    return redirect('/');
})->name('logout');

// Contact form route
Route::post('/contact', function () {
    $data = request()->all();
    Mail::to('mingkai103019@gmail.com')->send(new ContactMe($data));
    return redirect('/contact')->with('flash', 'Message Sent Successfully');
});
