<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    /**
     * Display the specified resource.
     */

    public function show(string $lang)
    {
        App::setLocale($lang);
        Session::put("locale", $lang);

        return redirect()->back();
    }
    
}
