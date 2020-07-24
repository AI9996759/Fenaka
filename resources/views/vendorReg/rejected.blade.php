@extends('layouts.master')

@section('title')
Fenaka - Vendor Create
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Vendor Registration</h1>
</div>

   <!-- DataTales -->
  <div class="card shadow mb-4"> 
    <div class="card-header py-3">
      @if (Auth::user()->location === 'ALL')
        <a type="button" href="/vendor" class="btn btn-warning">
          Pending Vendors <span class="badge badge-light">{{$vendorpending->count('status')}}</span>
        </a>
        <a type="button" href="/vendor-create"  class="btn btn-success" disabled>
          Created Vendors <span class="badge badge-light">{{$vendorcreated->count('status')}}</span>
        </a>
        <button type="button" class="btn btn-danger" disabled>
          Rejected Vendors <span class="badge badge-light">{{$vendorrejected->count('status')}}</span>
        </button>
      @else
      <a type="button" href="/vendor" class="btn btn-warning">
          Pending Vendors <span class="badge badge-light">{{$vendoruserpending->count('status')}}</span>
      </a>
      <button type="button"  class="btn btn-success" disabled>
          Created Vendors <span class="badge badge-light">{{$vendorusercreated->count('status')}}</span>
        </button>
        <a type="button"  href="/vendor-reject"  class="btn btn-danger">
          Rejected Vendors <span class="badge badge-light">{{$vendoruserrejected->count('status')}}</span>
        </a>
      @endif
    </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Rejected Vendors</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Vendor Reference Number</th>
              <th>Attachments</th>
              <th>Name</th>
              <th>VAT Registration No / ID Card Number</th>
              <th>Address</th>
              <th>Contact Person</th>
              <th>Contact Number</th>
              <th>Location</th>
              <th>Details</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Vendor Reference Number</th>
              <th>Attachments</th>
              <th>Name</th>
              <th>VAT Registration No </th>
              <th>Address</th>
              <th>Contact Person</th>
              <th>Contact Number</th>
              <th>Location</th>
              <th>Details</th>
              <th>Actions</th>
            </tr>
          </tfoot>
          <tbody>
            @if (Auth::user()->location === 'ALL')
             @foreach ($vendorrejected as $data)
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
          </td>
          <td>
            <a href="{{ url('vendor-edit/'.$data->id) }}" class="btn btn-info btn-block">    View    </a>

            
          </td>
            </tr>
            @endforeach
            @else
            @foreach ($vendoruserrejected as $data)
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
          </td>
          <td>
            {{$data->vendor_email}}
          </td>
          <td>
            <a href="{{ url('vendor-edit/'.$data->id) }} " class="btn btn-info  btn-block">    View    </a>

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




