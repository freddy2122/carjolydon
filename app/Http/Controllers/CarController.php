<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bodyaccueil');
    }

    public function listing()
    {
        return view('listing');
    }

}
