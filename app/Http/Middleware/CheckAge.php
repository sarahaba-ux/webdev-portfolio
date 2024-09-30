<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CheckAge
{
    public function handle($request, Closure $next, $minAge = 18)
    {
        $age = $request->input('age', 0);  // Get age from request input (default 0 if not provided)
        
        // Check if age meets the minimum requirement passed as a parameter
        if ($age >= $minAge) {
            // Return different views based on age range
            if ($age <= 20) {
                return response()->view('home');
            } else {
                return response()->view('adults');
            }
        }

        // If age is below the minimum, redirect to denied page
        return response()->view('denied');
    }
}
