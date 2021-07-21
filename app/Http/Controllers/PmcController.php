<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PmcController extends Controller
{
    public function index()
    {
        return view('pmc-admin');
    }
}
