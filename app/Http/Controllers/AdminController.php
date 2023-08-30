<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    function profile(){
        return Inertia::render('Admin/Profile');
    }
}
