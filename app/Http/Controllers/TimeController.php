<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;

class TimeController extends Controller
{

    public function index($id)
    {
        $contents = Content::where('id', $id)->get();
        return view('time.index')->with('contents', $contents);
    } 
    
    
}