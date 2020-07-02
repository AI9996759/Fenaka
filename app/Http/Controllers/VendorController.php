<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Vendor;
use App\Locations;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function index()
    {
        $vendor = Vendor::where('status','Pending')->get();
        $vendoruser = Vendor::where('location',Auth::user()->location)->where('status','Pending')->get();
        return view('vendorReg.index')
        ->with('vendor',$vendor)
        ->with('vendoruser',$vendoruser)
            ;

    }  

    public function individualstore(Request $request)
    {
        
    
        $this->validate($request, [
            
            'name' => 'required',
            'file' => 'mimes:jpeg,png,jpg,gif,svg,pdf,xlx,csv',

        ]);

        $vendor = new Vendor;
        $id = IdGenerator::generate(['table' => 'vendor', 'field' => 'number','length' => 20, 'prefix' =>'FNK-VEN/'.date('Y/')]);

        $vendor->number = $id;
        $vendor->name = $request->input('name');
        $vendor->reg_no = $request->input('reg_no');
        $vendor->address = $request->input('address');
        $vendor->contact_person = $request->input('contact_person');
        $vendor->contact_number = $request->input('contact_number');
        $vendor->website = $request->input('website');
        $vendor->fax_number = $request->input('fax_number');
        $vendor->agreement = $request->input('agreement');
        $vendor->createdby = Auth::user()->name;
        $vendor->location = Auth::user()->location;
        $vendor->email = Locations::where('code',$vendor->location)->first()->email;

        if ($request->hasfile('file')) {
            $filepath = $request->file('file');
            $extension = $filepath->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $filepath->move('uploads/Vendor/',$filename);
            $vendor->file = $filename;
        }

        $vendor->save();

        return redirect('/vendor')->with('success','Vendor Creating Request Sent');
    }
}
