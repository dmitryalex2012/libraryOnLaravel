<?php

namespace App\Http\Controllers;

class ManageController extends Controller
{
    public function index()
    {
        return redirect()->route('manage.dashboard');
    }

    public function dashboard()
    {
        return view('manage.dashboard');
    }

    public function books()
    {
        return view('manage.books');
    }
}
