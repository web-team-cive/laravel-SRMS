<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class loginController extends Controller
{
    public function loginApi(Request $request)
    {
        $credentials = $request->only('username', 'pwd');

        // Validate the request data
        $request->validate([
            'username' => 'required|string',
            'pwd' => 'required|string',
        ]);

        // Attempt to find the user by username
        $student = Student::where('username', $credentials['username'])->first();

        // Check if the user exists and if the password matches
        if ($student && password_verify($credentials['pwd'], $student->pwd)) {

            // Authentication successful

            // Store the username in the session
            $request->session()->put('username', $credentials['username']);

            // Authentication successful
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'Login successful',
                'data' => $student, // Include user data in response
            ], 200);
        } else {
            // Authentication failed
            return response()->json([
                'code' => 401,
                'status' => 'fail',
                'message' => 'Invalid username or password',
            ], 401);
        }
    }
}
