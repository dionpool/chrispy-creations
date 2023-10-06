<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email'     => ['required', 'email', 'max:255'],
            'password'  => ['required', 'min:8', 'max:255']
        ]);

        if (auth()->attempt($attributes)) {
            return redirect('/')->with('success', 'U bent succesvol ingelogd.');
        }

        return back()->with('error', 'De ingevulde gegevens zijn niet correct.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('Je bent succesvol uitgelogd.');
    }
}
