<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicerequests;

class ServicrequestController extends Controller
{
    public function index()
    {
        $servicerequests = Servicerequests::orderBy('id', 'ASC')->get();
        return view('servicerequests.index')
        ->with('servicerequests',$servicerequests)
            ;

    }  
}
