<?php

namespace App\Http\Controllers;

class ManegeController extends Controller
{
    public function index()
    {
        return redirect()->route('manage.dashboard');
    }

    public function dashboard()
    {
        return view('manage.dashboard');
    }
}
