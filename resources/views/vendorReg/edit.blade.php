@extends('layouts.master')

@section('title')
Fenaka - Vendor View

@endsection



@section('content')
<div class="col-xl-6 col-md-60 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                  @if ($vendor->edit_status === 'Edited')
                  <h3>Vendor View <span class="badge badge-pill badge-info">Last Edited | {{$vendor->editby}} | {{$vendor->updated_at}}</span></h3>
                  @else
                  <h3 class="m-0 font-weight-bold text-primary">Vendor View</h3>
                  @endif
                  <br>
                  <h6 class="m-0 font-weight text-dark"><b>Vendor Reference Number:</b> {{$vendor->number}}</h6>
                  <h6 class="m-0 font-weight text-dark"><b>Vendor Type: </b>{{$vendor->vendor_type}}</h6>
                  <h6 class="m-0 font-weight text-dark"><b>Location: </b>{{$vendor->location}}</h6>
                  <h6 class="m-0 font-weight text-dark"><b>Requested By:</b> {{$vendor->createdby}}</h6>
                  <h6 class="m-0 font-weight text-dark"><b>Requested Date:</b> {{$vendor->created_at}}</h6>
                  <br>
                </div>
              <form action="{{ url('vendor-update/'.$vendor->id) }}" form class="user" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                @if (Auth::user()->location === 'ALL')
                <div class="form-group">
                  <label ><b>Location</b></label>
                  <select class="form-control" name="location">
                    @foreach ($location as $loc)
                    <option value="{{$loc->code}}" {{ $vendor->location == $loc->code ? 'selected' : '' }}>{{$loc->name}}</option>
                    @endforeach
                    </select>
                </div>
                @else
                @endif
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label ><b>Name</b></label>
                    <input type="text" name="name" required value="{{$vendor->name}}" class="form-control form-control-user"  placeholder="Name">
                  </div>
                  @if ($vendor->vendor_type === 'Individual')
                  <div class="col-sm-6">
                    <label ><b>ID Card Number</b></label>
                    <input type="text" name="id_card" required value="{{$vendor->id_card}}" class="form-control form-control-user" placeholder="ID Card Number">
                  </div>
                  @else
                  <div class="col-sm-6">
                    <label ><b>VAT Registration No</b></label>
                    <input type="text" name="reg_no"  value="{{$vendor->reg_no}}" class="form-control form-control-user" placeholder="VAT Registration No">
                  </div>
                  @endif
                </div>
                @if ($vendor->vendor_type === 'Individual')
                @else
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label ><b>Fax Number</b></label>
                    <input type="text" name="fax_number" value="{{$vendor->fax_number}}" class="form-control form-control-user"  placeholder="Fax Number">
                  </div>
                  <div class="col-sm-6">
                    <label ><b>Website</b></label>
                    <input type="text" name="website" value="{{$vendor->website}}" class="form-control form-control-user" placeholder="Website">
                  </div>
                </div>
                @endif
                <div class="form-group">
                  <label ><b>Vendor Email</b></label>
                  <input type="email" name="vendor_email" value="{{$vendor->vendor_email}}" class="form-control form-control-user"  placeholder="Email Address">
                </div>
                <div class="form-group">
                  <label ><b>Address</b></label>
                  <input type="text" name="address" value="{{$vendor->address}}" class="form-control form-control-user"  placeholder="Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label ><b>Contact Person</b></label>
                    <input type="text" name="contact_person" value="{{$vendor->contact_person}}" class="form-control form-control-user"  placeholder="Contact Person">
                  </div>
                  <div class="col-sm-6">
                    <label ><b>Contact Number</b></label>
                    <input type="number" name="contact_number" value="{{$vendor->contact_number}}" class="form-control form-control-user"  placeholder="Contact Number">
                  </div>
                </div>
                @if ($vendor->vendor_type === 'Individual')
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" name="agreement" value="1" required type="checkbox">
                    <label class="form-check-label"  style="color: red">
                      <b>I acknowledge that all required documents are clear and have been combined into a single PDF file.Please do not mix irrelevant  documents (for instance, other vendors' documents) other than required one.
                        <br>
                        Verify the following<br>
                        - Clear ID Card copy  (both sides)<br>
                        -   Quotation 
                      </b>
                    </label>
                  </div>
                </div>
                @else
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" name="agreement" value="1" required type="checkbox">
                    <label class="form-check-label"  style="color: red">
                      <b>I acknowledge that all required documents are clear and have been combined into a single PDF file.Please do not mix irrelevant  documents (for instance, other vendors' documents) other than required one.
                        <br>
                        Verify the following<br>
                        - Business registration certificate<br>
                        - GST registration certificate (If not eligible, attach no-gst acknowledgment letter from the relevant 
                              branch)<br>
                        -   Quotation 
                      </b>
                  
                    </label>
                  </div>
                </div>
                @endif
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" name="urgent" value="Urgent" type="checkbox" >
                    <label class="form-check-label" style="color: black">
                      If Urgent
                    </label>
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-6">
                <div class="text-center">
                  <a href="{{asset('uploads/Vendor/'.$vendor->file)}}" class="text-danger"><i class="far fa-file-pdf fa-3x"></i><br>{{$vendor->number}}</a>
                 </div>
                  <input type="file" name="image" class="form-control " id="exampleFormControlFile1">
                </div>
                </div>
                <br>
                <a href="{{ URL::previous() }}" class="btn btn-primary btn-user">
                  Back
                </a>
                @if ($vendor->status === 'Pending')
                @if (Auth::user()->location === 'ALL')
                    <button type="submit" name="submit" class="btn btn-success btn-user">Update</button>
                    @else
                    <button type="submit" name="location" value="{{$vendor->location}}" class="btn btn-success btn-user">Update</button>
                    @endif
                    @else
                    @endif
                    </form>

                    </div>
                  </div>
                </div>
              </div>
              </div>
              </div>



@endsection


@section('scripts')

@endsection

