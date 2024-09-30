<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CheckAge
{
    public function handle($request, Closure $next, $minAge = 18)
    {
        $age = $request->input('age', 0);
        if ($age >= 18 && $age <= 20) {
            return response()->view('home');
        }
        if ($age >= 21) {
            return response()->view('adults');
        }
        return response()->view('denied');
    }
}