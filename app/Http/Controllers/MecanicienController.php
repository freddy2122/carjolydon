<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MecanicienController extends Controller
{
    public function index()
    {
        return view('mecanicienpages/dashboard');
    }
}
