<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminIndex()
    {
        return view('adminpages.bodyadmin');
    }

    public function componentsAlerts()
    {
        return view('adminpages.components-alerts');
    }
}
