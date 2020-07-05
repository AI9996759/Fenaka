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

    public function store(Request $request)
    {
        
    
        $this->validate($request, [
            
            'name' => 'required',
            'code' => 'required',
            'email' => 'required',
            'view' => 'required',
            

        ]);

        $location = new Locations;

        $location->name = $request->input('name');
        $location->code = $request->input('code');
        $location->email = $request->input('email');
        $location->view = $request->input('view');
       
        $location->save();

        return redirect('/location')->with('success','Location Created Successfully');
    }
}
