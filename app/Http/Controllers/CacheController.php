<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    public function clearCache()
    {
        Artisan::call('cache:clear');

        return back()->with('success', 'Cache succesvol geleegd!');
    }
}
