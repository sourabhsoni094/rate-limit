<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\ThrottleRequestsException;

class HomeController extends Controller
{
    public function index(Request $request)
{
    $ip = $request->ip();
    if (session()->has('active_session_'.$ip)) {
        return response()->json(['message' => 'Another session is already in progress.'], 403);
    } else {
        session(['active_session_'.$ip => true]);
        return response()->json(['message' => 'Session started successfully.']);
    }
    // try {
    //     return view('welcome');
    // } catch (ThrottleRequestsException $exception) {
    //     return response()->json(['error' => 'Too Many Requests'], 429);
    // }
}
}
