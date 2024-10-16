<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admindashboard');
    }

    public function novopost()
    {
        return view('adminnovopost');
    }

    public function meusposts()
    {
        return view('adminmeusposts');
    }
}
