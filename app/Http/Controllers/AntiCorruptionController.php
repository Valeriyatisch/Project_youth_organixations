<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;

class AntiCorruptionController extends Controller
{
//    public function pmcShow()
//    {
//        if(isset(auth()->user()->role) && auth()->user()->role == 'PMCAdmin')
//            return view('anti-corruption', [
//                'name' => 'pmc-admin',
//                'doc_section' => Documents::where('organization_id', auth()->user()->organization_id)->get()
//            ]);
//        else return view('errors/404');
//    }
}
