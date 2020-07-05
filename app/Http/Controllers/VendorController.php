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
        $vendorpending = Vendor::where('status','Pending')->get();
        $location = Locations::where('view','Yes')->get();
        $vendoruserpending = Vendor::where('location',Auth::user()->location)->where('status','Pending')->get();
        return view('vendorReg.index')
        ->with('vendorpending',$vendorpending)
        ->with('vendoruserpending',$vendoruserpending)
        ->with('location',$location)
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
        $vendor->id_card = $request->input('id_card');
        $vendor->address = $request->input('address');
        $vendor->vendor_type = 'Individual';
        $vendor->vendor_email = $request->input('vendor_email');
        $vendor->contact_person = $request->input('contact_person');
        $vendor->contact_number = $request->input('contact_number');
        $vendor->urgent = $request->input('urgent');
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

    public function allindividualstore(Request $request)
    {
        
    
        $this->validate($request, [
            
            'name' => 'required',
            'file' => 'mimes:jpeg,png,jpg,gif,svg,pdf,xlx,csv',

        ]);

        $vendor = new Vendor;
        $id = IdGenerator::generate(['table' => 'vendor', 'field' => 'number','length' => 20, 'prefix' =>'FNK-VEN/'.date('Y/')]);

        $vendor->number = $id;
        $vendor->name = $request->input('name');
        $vendor->id_card = $request->input('id_card');
        $vendor->address = $request->input('address');
        $vendor->vendor_type = 'Individual';
        $vendor->vendor_email = $request->input('vendor_email');
        $vendor->contact_person = $request->input('contact_person');
        $vendor->urgent = $request->input('urgent');
        $vendor->contact_number = $request->input('contact_number');
        $vendor->agreement = $request->input('agreement');
        $vendor->createdby = Auth::user()->name;
        $vendor->location = $request->input('location');
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

    public function businessstore(Request $request)
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
        $vendor->vendor_type = 'Business';
        $vendor->vendor_email = $request->input('vendor_email');
        $vendor->contact_person = $request->input('contact_person');
        $vendor->contact_number = $request->input('contact_number');
        $vendor->urgent = $request->input('urgent');
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

    public function allbusinessstore(Request $request)
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
        $vendor->vendor_type = 'Business';
        $vendor->vendor_email = $request->input('vendor_email');
        $vendor->contact_person = $request->input('contact_person');
        $vendor->contact_number = $request->input('contact_number');
        $vendor->urgent = $request->input('urgent');
        $vendor->website = $request->input('website');
        $vendor->fax_number = $request->input('fax_number');
        $vendor->agreement = $request->input('agreement');
        $vendor->createdby = Auth::user()->name;
        $vendor->location = $request->input('location');
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

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        $location = Locations::where('view','Yes')->get();

        return view('vendorReg.edit')
        ->with('vendor',$vendor)
        ->with('location',$location);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'file' => 'mimes:jpeg,png,jpg,gif,svg,pdf,xlx,csv',

        ]);

        $vendor = Vendor::findOrFail($id);

        $vendor->number = $id;
        $vendor->name = $request->input('name');
        $vendor->id_card = $request->input('id_card');       
        $vendor->reg_no = $request->input('reg_no');
        $vendor->address = $request->input('address');
        $vendor->vendor_type = 'Business';
        $vendor->vendor_email = $request->input('vendor_email');
        $vendor->contact_person = $request->input('contact_person');
        $vendor->urgent = $request->input('urgent');
        $vendor->contact_number = $request->input('contact_number');
        $vendor->website = $request->input('website');
        $vendor->fax_number = $request->input('fax_number');
        $vendor->agreement = $request->input('agreement');
        $vendor->createdby = Auth::user()->name;
        $vendor->location = $request->input('location');
        $vendor->email = Locations::where('code',$vendor->location)->first()->email;


        if ($request->hasfile('file')) {
            $filepath = $request->file('file');
            $extension = $filepath->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $filepath->move('uploads/Vendor/',$filename);
            $vendor->file = $filename;
        }
        $vendor->update();

     
        return redirect('/vendor')->with('success','Vendor Updated');
    }

}
