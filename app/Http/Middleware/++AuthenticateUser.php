<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Student;

class AuthenticateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the session contains a username
        if ($request->session()->has('username')) {
            // Get the username from the session
            $sessionUsername = $request->session()->get('username');

            // Attempt to find the user by username
            $student = Student::where('username', $sessionUsername)->first();

            // Check if the user exists
            if ($student) {
                // User exists, proceed to the next middleware or route
                return $next($request);
            }
        }

        // Redirect to the login page if authentication fails
        return redirect('/');
    }
}
