<?php

namespace App\Http\Controllers;

use App\Models\Vcard;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('vcard.index');
    }

}
