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
              <label for="inputEmail4">Name</label>
              <input type="text" name="name" required class="form-control" placeholder="Name">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">ID Card</label>
              <input type="text" name="reg_no" required class="form-control" placeholder="A00000">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" name="address" required class="form-control" id="inputAddress" placeholder="House Name, Island">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">Contact Person</label>
              <input type="text" name="contact_person" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Contact Number</label>
              <input type="number" name="contact_number"  class="form-control" min="7000000" max="9999999" id="inputAddress2" placeholder="7000000 , 9000000">
            </div>
            <div class="form-group col-md-2">
              <label for="inputZip">Documents</label>
              <input type="file" name="file"  required class="form-control" id="inputZip">
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" name="agreement" value="1" required type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                I acknowledge that all required documents are clear and have been combined into a single PDF file.
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
        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Company Name</label>
              <input type="text" required class="form-control" placeholder="Company Name">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">VAT Registration No</label>
              <input type="text" required class="form-control" placeholder="0000000GST501">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" required class="form-control" id="inputAddress" placeholder="Office Address, Island">
          </div>
          <div class="form-group">
            <label for="inputAddress2">Email</label>
            <input type="name" required class="form-control" placeholder="Email">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">Contact Person</label>
              <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Contact Number</label>
              <input type="number" class="form-control" min="7000000" max="9999999" id="inputAddress2" placeholder="7000000 , 9000000">
            </div>
            <div class="form-group col-md-2">
              <label for="inputZip">Documents</label>
              <input type="file" required class="form-control" id="inputZip">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Fax Number</label>
              <input type="name" required class="form-control" placeholder="Fax Number">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">WebSite</label>
              <input type="id_card" class="form-control" placeholder="WebSite">
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input"  type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                I acknowledge that all required documents are clear and have been combined into a single PDF file.
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

      <button type="button" class="btn btn-block btn-info" data-dismiss="modal" data-toggle="modal" data-target="#individual">Individual</button>
      <button type="button" class="btn btn-block btn-info" data-dismiss="modal" data-toggle="modal" data-target="#business">Business</button>

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
              <th>Email</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tfoot>
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
              <th>Email</th>
              <th>Actions</th>
            </tr>
          </tfoot>
          <tbody>
            @if (Auth::user()->location === 'ALL')
             @foreach ($vendor as $data)
            <tr>
              <td>
            {{$data->id}}
          </td>
            <td style="text-align: center">
              <a href="{{asset('uploads/Vendor/'.$data->file)}}" class="text-danger"><i class="far fa-file-pdf fa-3x"></i><br>{{$data->number}}</a>
            </td>
          <td>
            {{$data->name}} ({{$data->reg_no}})
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
            {{$data->email}}
          </td>
          <td>
            <a href="#" class="btn btn-info rejected btn-block">    View    </a>

            <a class="btn btn-success edit btn-block" href="#">Create</a>
            
            <a href="#" class="btn btn-danger rejected btn-block">    Reject    </a>

            
          </td>
            </tr>
            @endforeach
            @else
            @foreach ($vendoruser as $data)
           <tr>
              <td>
            {{$data->id}}
          </td>
            <td style="text-align: center">
              <a href="{{asset('uploads/Vendor/'.$data->file)}}" class="text-danger"><i class="far fa-file-pdf fa-3x"></i><br>{{$data->number}}</a>
            </td>
          <td>
            {{$data->name}} ({{$data->reg_no}})
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
            {{$data->email}}
          </td>
          <td>
            <a href="#" class="btn btn-info rejected btn-block">    View    </a>
            
            <a class="btn btn-success edit btn-block" href="#">Create</a>
            
            <a href="#" class="btn btn-danger rejected btn-block">    Reject    </a>

            
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




