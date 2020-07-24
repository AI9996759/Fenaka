<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Vendor;
use App\Locations;
use App\Contact; use Mail;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:vendor-list|vendor-create|vendor-edit|vendor-delete', ['only' => ['index','show']]);
         $this->middleware('permission:vendor-create', ['only' => ['create','store']]);
         $this->middleware('permission:vendor-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:vendor-reject', ['only' => ['rejectvendor']]);
    }

    public function index()
    {
        $vendorpending = Vendor::where('status','Pending')->get();      
        $vendorrejected = Vendor::where('status','Rejected')->get();
        $vendorcreated = Vendor::where('status','Created')->get();
        $location = Locations::where('view','Yes')->get();
        $vendoruserpending = Vendor::where('location',Auth::user()->location)->where('status','Pending')->get();
        $vendoruserrejected = Vendor::where('location',Auth::user()->location)->where('status','Rejected')->get();
        $vendorusercreated = Vendor::where('location',Auth::user()->location)->where('status','Created')->get();
        return view('vendorReg.index')
        ->with('vendorpending',$vendorpending)
        ->with('vendoruserpending',$vendoruserpending)
        ->with('location',$location)
        ->with('vendorrejected',$vendorrejected)
        ->with('vendoruserrejected',$vendoruserrejected)
        ->with('vendorcreated',$vendorcreated)
        ->with('vendorusercreated',$vendorusercreated)
            ;

    }  

    public function indexcreate()
    {
        $vendorpending = Vendor::where('status','Pending')->get();
        $vendorrejected = Vendor::where('status','Rejected')->get();
        $vendorcreated = Vendor::where('status','Created')->get();
        $location = Locations::where('view','Yes')->get();
        $vendoruserpending = Vendor::where('location',Auth::user()->location)->where('status','Pending')->get();
        $vendoruserrejected = Vendor::where('location',Auth::user()->location)->where('status','Rejected')->get();
        $vendorusercreated = Vendor::where('location',Auth::user()->location)->where('status','Created')->get();
        return view('vendorReg.create')
        ->with('vendorpending',$vendorpending)
        ->with('vendoruserpending',$vendoruserpending)
        ->with('location',$location)
        ->with('vendorrejected',$vendorrejected)
        ->with('vendoruserrejected',$vendoruserrejected)
        ->with('vendorcreated',$vendorcreated)
        ->with('vendorusercreated',$vendorusercreated)
            ;

    }

    public function indexreject()
    {
        $vendorpending = Vendor::where('status','Pending')->get();
        $vendorrejected = Vendor::where('status','Rejected')->get();
        $vendorcreated = Vendor::where('status','Created')->get();
        $location = Locations::where('view','Yes')->get();
        $vendoruserpending = Vendor::where('location',Auth::user()->location)->where('status','Pending')->get();
        $vendoruserrejected = Vendor::where('location',Auth::user()->location)->where('status','Rejected')->get();
        $vendorusercreated = Vendor::where('location',Auth::user()->location)->where('status','Created')->get();
        return view('vendorReg.rejected')
        ->with('vendorpending',$vendorpending)
        ->with('vendoruserpending',$vendoruserpending)
        ->with('location',$location)
        ->with('vendorrejected',$vendorrejected)
        ->with('vendoruserrejected',$vendoruserrejected)
        ->with('vendorcreated',$vendorcreated)
        ->with('vendorusercreated',$vendorusercreated)
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

        Mail::send('emails.individualrecieved',
        array(
            'createdby' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
            'id_card' => $request->get('id_card'),
            'number' => $id,
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'vendor_email' => $request->get('vendor_email'),
            'location' => $request->get('location'),
            'contact_number' => $request->get('contact_number'),
            'contact_person' => $request->get('contact_person'),
            'urgent' => $request->get('urgent'),

          

        ), function($message) use ($request)
          {
          
             $message->subject('Vendor Creation Request Notification');
             $message->from($address = 'noreplyfenaka@gmail.com', $name = 'Fenaka ICT Support Portal');
             $message->to(Locations::where('code',Auth::user()->location)->first()->email,);
             $message->to("erp.support@fenaka.mv",);
          });

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
  
        Mail::send('emails.individualrecieved',
        array(
            'createdby' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
            'id_card' => $request->get('id_card'),
            'number' => $id,
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'vendor_email' => $request->get('vendor_email'),
            'location' => $request->get('location'),
            'contact_number' => $request->get('contact_number'),
            'contact_person' => $request->get('contact_person'),
            'urgent' => $request->get('urgent'),

          

        ), function($message) use ($request)
          {
          
             $message->subject('Vendor Creation Request Notification');
             $message->from($address = 'noreplyfenaka@gmail.com', $name = 'Fenaka ICT Support Portal');
             $message->to(Locations::where('code',$request->location)->first()->email,);
             $message->to("erp.support@fenaka.mv",);
          });

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

        Mail::send('emails.businessreved',
        array(
            'createdby' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
            'reg_no' => $request->get('reg_no'),
            'number' => $id,
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'vendor_email' => $request->get('vendor_email'),
            'location' => $request->get('location'),
            'website' => $request->get('website'),
            'fax_number' => $request->get('fax_number'),
            'contact_number' => $request->get('contact_number'),
            'contact_person' => $request->get('contact_person'),
            'urgent' => $request->get('urgent'),

          

        ), function($message) use ($request)
          {
          
             $message->subject('Vendor Creation Request Notification');
             $message->from($address = 'noreplyfenaka@gmail.com', $name = 'Fenaka ICT Support Portal');
             $message->to(Locations::where('code',Auth::user()->location)->first()->email,);
             $message->to("erp.support@fenaka.mv",);
          });

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
        
        Mail::send('emails.businessreved',
        array(
            'createdby' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
            'reg_no' => $request->get('reg_no'),
            'number' => $id,
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'vendor_email' => $request->get('vendor_email'),
            'location' => $request->get('location'),
            'website' => $request->get('website'),
            'fax_number' => $request->get('fax_number'),
            'contact_number' => $request->get('contact_number'),
            'contact_person' => $request->get('contact_person'),
            'urgent' => $request->get('urgent'),

          

        ), function($message) use ($request)
          {
          
             $message->subject('Vendor Creation Request Notification');
             $message->from($address = 'noreplyfenaka@gmail.com', $name = 'Fenaka ICT Support Portal');
             $message->to(Locations::where('code',$request->location)->first()->email,);
             $message->to("erp.support@fenaka.mv",);
          });

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
        $vendor->editby = Auth::user()->name;
        $vendor->edit_status = 'Edited';
        $vendor->updated_at = date('Y-m-d H:i:s');
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

    public function  rejectvendor(Request $request, $id)
    {
        $this->validate($request, [
            'rejected_reson' => 'required',
        ]);

        
        $vendor = Vendor::findOrFail($id);

        $vendor->name = $request->input('name');
        $vendor->rejected_reson = $request->input('rejected_reson');
        $vendor->rejected_by = Auth::user()->name;
        $vendor->rejected_date = date('Y-m-d H:i:s');
        $vendor->status = 'Rejected';
        $vendor->location = $request->input('location');
        $vendor->email = Locations::where('code',$vendor->location)->first()->email;

        $vendor->update();

        Mail::send('emails.vendorreject',
        array(
            'createdby' => Vendor::where('id',$id)->first()->createdby,
            'number' => Vendor::where('id',$id)->first()->number,
            'rejected_date' => date('Y-m-d H:i:s'),
            'rejected_by' => Auth::user()->name,
            'rejected_reson' => $request->get('rejected_reson'),
            'name' => $request->get('name'),


        ), function($message) use ($request)
          {
          
             $message->subject('Vendor Request Rjected Notification');
             $message->from($address = 'noreplyfenaka@gmail.com', $name = 'Fenaka ICT Support Portal');
             $message->to(Locations::where('code',$request->location)->first()->email,);
          });

        return redirect('/vendor')->with('deleted','Vendor Rejected');

    }

    public function  createvendor(Request $request, $id)
    {
        $this->validate($request, [
            'vendor_no' => 'required',
        ]);

        
        $vendor = Vendor::findOrFail($id);

        $vendor->name = $request->input('name');
        $vendor->vendor_no = $request->input('vendor_no');
        $vendor->vendor_createdby = Auth::user()->name;
        $vendor->vendor_createddate = date('Y-m-d H:i:s');
        $vendor->status = 'Created';
        $vendor->location = $request->input('location');
        $vendor->email = Locations::where('code',$vendor->location)->first()->email;

        $vendor->update();

        Mail::send('emails.createdvendor',
        array(
            'createdby' => Vendor::where('id',$id)->first()->createdby,
            'number' => Vendor::where('id',$id)->first()->number,
            'vendor_createddate' => date('Y-m-d H:i:s'),
            'name' => $request->get('name'),
            'vendor_no' => $request->get('vendor_no'),
            'vendor_createdby' => Auth::user()->name,
          

        ), function($message) use ($request)
          {
          
             $message->subject('Vendor Created Notification');
             $message->from($address = 'noreplyfenaka@gmail.com', $name = 'Fenaka ICT Support Portal');
             $message->to(Locations::where('code',$request->location)->first()->email,);
          });

        return redirect('/vendor')->with('success','Vendor Created');

    }

}
