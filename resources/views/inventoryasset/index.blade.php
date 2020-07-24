@extends('layouts.master')

@section('title')
Fenaka - Asset
@endsection

@section('content')

<!-- add Asset -->
<div class="modal fade" id="asset" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Asset</h5>
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
              <label for="inputEmail4"><b>Asset Name</b></label>
              <input type="text" name="name" required class="form-control" placeholder="Asset Name">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4"><b>Service tag</b></label>
              <input type="text" name="asset_tag" required class="form-control" placeholder="Service tag">
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4"><b>Model</b></label>
              <input type="text" name="name" required class="form-control" placeholder="Model">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4"><b>Serial</b></label>
              <input type="text" name="asset_tag" required class="form-control" placeholder="Serial">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4"><b>MAC Address</b></label>
              <input type="text" name="name" required class="form-control" placeholder="MAC Address">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4"><b>IP Address</Address></b></label>
              <input type="text" name="asset_tag" required class="form-control" placeholder="IP Address">
            </div>
          </div>
          <div class="form-group">
            <label ><b>Catagory</b></label>
            <input type="text" name="address" required class="form-control"  placeholder="Catagory">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label ><b>Purchase Date</b></label>
              <input type="date" name="contact_person" class="form-control" >
            </div>
            <div class="form-group col-md-4">
              <label ><b>Purchase Cost</b></label>
              <input type="number" name="contact_number"  class="form-control"   placeholder="Purchase Cost">
            </div>
            <div class="form-group col-md-2">
              <label><b>Device Image</b></label>
              <input type="file" name="file"  required class="form-control" >
            </div>
          </div>
          <div class="form-group">
            <label ><b>Note</b></label>
            <input type="email" name="vendor_email" required class="form-control"  placeholder="Note">
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


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Asset</h1>
  <button href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#asset">
        <span class="icon text-white-50">
            <i class="fas fa-check"></i>
         </span>
         <span class="text">Add Asset</span>
     </button>
</div>

   <!-- DataTales -->
  <div class="card shadow mb-4"> 
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Asset</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Asset Name</th>
              <th>Device Image</th>
              <th>Asset Tag</th>
              <th>Serial</th>
              <th>Model</th>
              <th>Category</th>
              <th>Status</th>
              <th>Checked Out To</th>
              <th>CheckedOut/CheckIn</th>
              <th>Location</th>
              <th>Used By</th>
              <th>Manufacturer</th>
              <th>Warranty</th>
              <th>IP</th>
              <th>MAC</th>
              <th>OS</th>
              <th>Note</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Asset Name</th>
              <th>Device Image</th>
              <th>Asset Tag</th>
              <th>Serial</th>
              <th>Model</th>
              <th>Category</th>
              <th>Status</th>
              <th>Checked Out To</th>
              <th>CheckedOut/CheckIn</th>
              <th>Location</th>
              <th>Used By</th>
              <th>Manufacturer</th>
              <th>Warranty</th>
              <th>IP</th>
              <th>MAC</th>
              <th>OS</th>
              <th>Note</th>
              <th>Actions</th>
            </tr>
          </tfoot>
          <tbody>
             @foreach ($asset as $data)
            <tr>
              <td>
            {{$data->id}}
          </td>
          <td>
            {{$data->number}}
          </td>
            <td style="text-align: center">
              <a href="{{asset('uploads/Vendor/'.$data->file)}}" class="text-danger"><i class="far fa-file-pdf fa-3x"></i><br>{{$data->number}}</a>
            </td>
          <td>
            {{$data->name}} 
          </td>
          <td>
            {{$data->reg_no}} {{$data->id_card}}
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
            {{$data->location}}
          </td>
          <td style="text-align: center;">
            @if ($data->urgent === 'Urgent')
            <span style="font-size: 2em; color: red; text-align: center;">
              <i class="fas fa-exclamation"></i>
            </span>
            @else
            @endif
            <br>
            <b>Vendor Type: </b>  {{$data->vendor_type}}
            <b>Requested By: </b>  {{$data->createdby}}
            <b>Requested Date: </b>  {{$data->created_at}}
          </td>
          <td>
            <a href="{{ url('vendor-edit/'.$data->id) }}" class="btn btn-info btn-block">    View    </a>

            <a class="btn btn-success created btn-block" href="#">Create</a>
            
            <a href="#" class="btn btn-danger rejected btn-block">Reject</a>

            
          </td>
            </tr>
            @endforeach
            
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




