<?php

use App\Http\Middleware\LogRequests;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Route for Homepage and Laboratory pages
Route::middleware(['web', LogRequests::class])->group(function () {
    Route::get('/homepage', function () {
        return view('homepage'); // Adjust the view name as needed
    })->name('homepage');

    Route::get('/lab1', function () {
        return view('lab1'); // Adjust the view name as needed
    })->name('lab1');

    Route::get('/lab2', function () {
        return view('lab2'); // Adjust the view name as needed
    })->name('lab2');

    Route::get('/lab3', function () {
        return view('lab3'); // Adjust the view name as needed
    })->name('lab3');

    Route::get('/lab4', function () {
        return view('lab4'); // Adjust the view name as needed
    })->name('lab4');
});
