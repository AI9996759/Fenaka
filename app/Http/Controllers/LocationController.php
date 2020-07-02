<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locations;

class LocationController extends Controller
{
    public function index()
    {
        $location = Locations::orderBy('id', 'ASC')->get();
        return view('location.index')
        ->with('location',$location)
            ;

    }  
}
