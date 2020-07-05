@extends('layouts.master')

@section('title')
Fenaka -Locations
@endsection

@section('content')

<!-- add individual -->
<div class="modal fade" id="individual" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Vendor Type: Individual </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('individual-store') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{method_field('POST')}}
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4"><b>Name</b></label>
              <input type="text" name="name" required class="form-control" placeholder="Name">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4"><b>ID Card / Passport Number</b></label>
              <input type="text" name="id_card" required class="form-control" placeholder="ID Card / Passport Number">
            </div>
          </div>
          <div class="form-group">
            <label ><b>Address</b></label>
            <input type="text" name="address" required class="form-control"  placeholder="House Name, Island">
          </div>
          <div class="form-group">
            <label ><b>Vendor Mail</b></label>
            <input type="email" name="vendor_email" required class="form-control"  placeholder="Vendor Mail">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label ><b>Contact Person</b></label>
              <input type="text" name="contact_person" class="form-control" >
            </div>
            <div class="form-group col-md-4">
              <label ><b>Contact Number</b></label>
              <input type="number" name="contact_number"  class="form-control" min="7000000" max="9999999"  placeholder="7000000 , 9000000">
            </div>
            <div class="form-group col-md-2">
              <label><b>Documents</b></label>
              <input type="file" name="file"  required class="form-control" >
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" name="agreement" value="1" required type="checkbox" >
              <label class="form-check-label" style="color: red">
                <b>I acknowledge that all required documents are clear and have been combined into a single PDF file.Please do not mix irrelevant  documents (for instance, other vendors' documents) other than required one.
                  <br>
                  Verify the following<br>
                  - Clear ID Card copy  (both sides)<br>
                  -   Quotation 
                </b>
              </label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" name="urgent" value="Urgent" type="checkbox" >
              <label class="form-check-label" style="color: black">
                If Urgent
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- add All individual -->
<div class="modal fade" id="individualall" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Vendor Type: Individual </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('allindividual-store') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{method_field('POST')}}
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4"><b>Name</b></label>
              <input type="text" name="name" required class="form-control" placeholder="Name">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4"><b>ID Card / Passport Number</b></label>
              <input type="text" name="id_card" required class="form-control" placeholder="ID Card / Passport Number">
            </div>
          </div>
          <div class="form-group">
            <label ><b>Address</b></label>
            <input type="text" name="address" required class="form-control"  placeholder="House Name, Island">
          </div>
          <div class="form-group">
            <label ><b>Vendor Mail</b></label>
            <input type="email" name="vendor_email" required class="form-control"  placeholder="Vendor Mail">
          </div>
          <div class="form-group">
            <label><b>Select Location</b></label>
            <select class="form-control" name="location">
              @foreach ($location as $loc)
              <option value="{{$loc->code}}">{{$loc->name}}</option>
              @endforeach
              </select>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label ><b>Contact Person</b></label>
              <input type="text" name="contact_person" class="form-control" >
            </div>
            <div class="form-group col-md-4">
              <label ><b>Contact Number</b></label>
              <input type="number" name="contact_number"  class="form-control" min="7000000" max="9999999" placeholder="7000000 , 9000000">
            </div>
            <div class="form-group col-md-2">
              <label ><b>Documents</b></label>
              <input type="file" name="file"  required class="form-control" >
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" name="agreement" value="1" required type="checkbox" >
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
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" name="urgent" value="Urgent" type="checkbox" >
              <label class="form-check-label" style="color: black">
                If Urgent
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- add business -->
<div class="modal fade" id="business" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Vendor Type: Business </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('business-store') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{method_field('POST')}}
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Company Name</label>
              <input type="text" name="name" required class="form-control" placeholder="Company Name">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">VAT Registration No</label>
              <input type="text" name="reg_no" required class="form-control" placeholder="0000000GST501">
            </div>
          </div>
          <div class="form-group">
            <label >Address</label>
            <input type="text" name="address" required class="form-control" placeholder="Office Address, Island">
          </div>
          <div class="form-group">
            <label >Vendor Mail</label>
            <input type="name" name="vendor_email" required class="form-control" placeholder="Email">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >Contact Person</label>
              <input type="text" name="contact_person" class="form-control" >
            </div>
            <div class="form-group col-md-4">
              <label >Contact Number</label>
              <input type="number" name="contact_number" class="form-control" min="7000000" max="9999999"  placeholder="7000000 , 9000000">
            </div>
            <div class="form-group col-md-2">
              <label >Documents</label>
              <input type="file" name="file" required class="form-control" >
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Fax Number</label>
              <input type="text"  name="fax_number" required class="form-control" placeholder="Fax Number">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">WebSite</label>
              <input type="text" name="website"  class="form-control" placeholder="WebSite">
            </div>
          </div>
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
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" name="urgent" value="Urgent" type="checkbox" >
              <label class="form-check-label" style="color: black">
                If Urgent
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- add all business -->
<div class="modal fade" id="businessall" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Vendor Type: Business </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('allbusiness-store') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{method_field('POST')}}
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Company Name</label>
              <input type="text" name="name" required class="form-control" placeholder="Company Name">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">VAT Registration No</label>
              <input type="text" name="reg_no" required class="form-control" placeholder="0000000GST501">
            </div>
          </div>
          <div class="form-group">
            <label >Address</label>
            <input type="text" name="address" required class="form-control" placeholder="Office Address, Island">
          </div>
          <div class="form-group">
            <label >Vendor Mail</label>
            <input type="name" name="vendor_email" required class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <label><b>Select Location</b></label>
            <select class="form-control" name="location">
              @foreach ($location as $loc)
              <option value="{{$loc->code}}">{{$loc->name}}</option>
              @endforeach
              </select>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label >Contact Person</label>
              <input type="text" name="contact_person" class="form-control" >
            </div>
            <div class="form-group col-md-4">
              <label >Contact Number</label>
              <input type="number" name="contact_number" class="form-control" min="7000000" max="9999999"  placeholder="7000000 , 9000000">
            </div>
            <div class="form-group col-md-2">
              <label >Documents</label>
              <input type="file" name="file" required class="form-control" >
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Fax Number</label>
              <input type="text"  name="fax_number" required class="form-control" placeholder="Fax Number">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">WebSite</label>
              <input type="text" name="website"  class="form-control" placeholder="WebSite">
            </div>
          </div>
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
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" name="urgent" value="Urgent" type="checkbox" >
              <label class="form-check-label" style="color: black">
                If Urgent
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Select Type -->
<div class="modal fade" id="type" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Select Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      @if (Auth::user()->location === 'ALL')
      <button type="button" class="btn btn-block btn-info" data-dismiss="modal" data-toggle="modal" data-target="#individualall">Individual</button>
      <button type="button" class="btn btn-block btn-info" data-dismiss="modal" data-toggle="modal" data-target="#businessall">Business</button>
      @else
      <button type="button" class="btn btn-block btn-info" data-dismiss="modal" data-toggle="modal" data-target="#individual">Individual</button>
      <button type="button" class="btn btn-block btn-info" data-dismiss="modal" data-toggle="modal" data-target="#business">Business</button>
      @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Vendor Registration</h1>
  <button href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#type">
        <span class="icon text-white-50">
            <i class="fas fa-check"></i>
         </span>
         <span class="text">Add Vendor</span>
     </button>
</div>

   <!-- DataTales -->
  <div class="card shadow mb-4"> 
    <div class="card-header py-3">
      @if (Auth::user()->location === 'ALL')
        <button type="button" class="btn btn-warning">
          Pending Vendors <span class="badge badge-light">{{$vendorpending->count('status')}}</span>
        </button>
        <button type="button" class="btn btn-success">
          Created Vendors <span class="badge badge-light">4</span>
        </button>
        <button type="button" class="btn btn-danger">
          Rejected Vendors <span class="badge badge-light">4</span>
        </button>
      @else
        <button type="button" class="btn btn-warning">
          Pending Vendors <span class="badge badge-light">{{$vendoruserpending->count('status')}}</span>
        </button>
        <button type="button" class="btn btn-success">
          Created Vendors <span class="badge badge-light">4</span>
        </button>
        <button type="button" class="btn btn-danger">
          Rejected Vendors <span class="badge badge-light">4</span>
        </button>
      @endif
    </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Pending Vendor</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Attachments</th>
              <th>Name</th>
              <th>VAT Registration No / ID Card Number</th>
              <th>Address</th>
              <th>Contact Person</th>
              <th>Contact Number</th>
              <th>Web Site</th>
              <th>Fax Number</th>
              <th>Location</th>
              <th>Vendor Email</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Attachments</th>
              <th>Name</th>
              <th>VAT Registration No </th>
              <th>Address</th>
              <th>Contact Person</th>
              <th>Contact Number</th>
              <th>Web Site</th>
              <th>Fax Number</th>
              <th>Location</th>
              <th>Vendor Email</th>
              <th>Actions</th>
            </tr>
          </tfoot>
          <tbody>
            @if (Auth::user()->location === 'ALL')
             @foreach ($vendorpending as $data)
            <tr>
              <td>
            {{$data->id}}
          </td>
            <td style="text-align: center">
              <a href="{{asset('uploads/Vendor/'.$data->file)}}" class="text-danger"><i class="far fa-file-pdf fa-3x"></i><br>{{$data->number}}</a>
            </td>
          <td>
            {{$data->name}} ({{$data->id_card}})
          </td>
          <td>
            {{$data->reg_no}}
          </td>
          <td>
            {{$data->address}}
          </td>
          <td>
            {{$data->contact_person}}
          </td>
          <td>
            {{$data->contact_number}}
          </td>
          <td>
            {{$data->website}}
          </td>
          <td>
            {{$data->fax_number}}
          </td>
          <td>
            {{$data->location}}
          </td>
          <td>
            {{$data->vendor_email}}
          </td>
          <td>
            <a href="{{ url('vendor-edit/'.$data->id) }}" class="btn btn-info rejected btn-block">    View    </a>

            <a class="btn btn-success edit btn-block" href="#">Create</a>
            
            <a href="#" class="btn btn-danger rejected btn-block">Reject</a>

            
          </td>
            </tr>
            @endforeach
            @else
            @foreach ($vendoruserpending as $data)
           <tr>
              <td>
            {{$data->id}}
          </td>
            <td style="text-align: center">
              <a href="{{asset('uploads/Vendor/'.$data->file)}}" class="text-danger"><i class="far fa-file-pdf fa-3x"></i><br>{{$data->number}}</a>
            </td>
          <td>
            {{$data->name}} ({{$data->id_card}})
          </td>
          <td>
            {{$data->reg_no}}
          </td>
          <td>
            {{$data->address}}
          </td>
          <td>
            {{$data->contact_person}}
          </td>
          <td>
            {{$data->contact_number}}
          </td>
          <td>
            {{$data->website}}
          </td>
          <td>
            {{$data->fax_number}}
          </td>
          <td>
            {{$data->location}}
          </td>
          <td>
            {{$data->vendor_email}}
          </td>
          <td>
            <a href="{{ url('vendor-edit/'.$data->id) }} " class="btn btn-info rejected btn-block">    View    </a>

          </td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
@section('script')
<script> 
  $(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
@endsection




