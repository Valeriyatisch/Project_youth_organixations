<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        return view('index', [
            'news' => DB::table('news')->orderBy('created_at', 'desc')->limit(6)->get(),
            'events' => DB::table('events')->orderBy('created_at', 'desc')->limit(6)->get()
        ]);
    }
}
