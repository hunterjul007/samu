<?php

namespace App\Http\Controllers;

use App\Models\ParametreGeneral;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $setting = ParametreGeneral::find(1);
        return view('index', compact('setting'));
    }

    public function ViewMentionLegal()
    {
        $setting = ParametreGeneral::find(1);
        return view('conditions', compact('setting'));
    }
}
