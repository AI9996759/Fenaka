@extends('layouts.master')

@section('title')
Fenaka - Track Service Reuests
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Track Service Requests</h1>
  <button href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#type">
    <span class="icon text-white-50">
        <i class="fas fa-check"></i>
     </span>
     <span class="text">Add Service Requests </span>
 </button>
</div>

   <!-- DataTales -->
  <div class="card shadow mb-4"> 
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Created Vendors</h6>
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
              <th>Tracking</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Tracking</th>
              <th>Attachments</th>
              <th>Name</th>
              <th>Tracking</th>
              <th>Actions</th>
            </tr>
          </tfoot>
          <tbody>
             @foreach ($servicerequests as $data)
            <tr>
              <td>
            {{$data->id}}
          </td>
          <td>
            {{$data->number}}
          </td>
            <td style="text-align: center">
              <a href="{{asset('uploads/Vendor/'.$data->file)}}" class="text-danger"><i class="far fa-file-pdf fa-3x"></i><br>{{$data->vendor_no}}</a>
            </td>
          <td>
            {{$data->name}} 
          </td>
          <td>
            <div class="track">
                <div class="step active"> <span class="icon"> <i class="fas fa-ship"></i> </span> <span class="text">Shipped From Island</span> </div>
                <div class="step active"> <span class="icon"> <i class="fas fa-dolly"></i> </span> <span class="text"> Logistics received</span> </div>
                <div class="step "> <span class="icon"> <i class="fas fa-tools"></i> </span> <span class="text"> ICT Received </span> </div>
                <div class="step "> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Handover to Logistics</span> </div>
                <div class="step "> <span class="icon"> <i class="fas fa-ship"></i> </span> <span class="text">Shipped To Island</span> </div>
                <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Received</span> </div>
            </div>
        </td>
          <td>
            <a href="{{ url('vendor-edit/'.$data->id) }}" class="btn btn-info btn-block">    View    </a>
            
          </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="container">
    <article class="card">
        <header class="card-header"> Track Service Reuest</header>
        <div class="card-body">
            <h6>Reuests Reference Number: OD45345345435</h6>
            <div class="track">
                <div class="step active"> <span class="icon"> <i class="fas fa-ship"></i> </span> <span class="text">Shipped From Island</span> </div>
                <div class="step active"> <span class="icon"> <i class="fas fa-dolly"></i> </span> <span class="text"> Logistics received</span> </div>
                <div class="step "> <span class="icon"> <i class="fas fa-tools"></i> </span> <span class="text"> ICT Received </span> </div>
                <div class="step "> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Handover to Logistics</span> </div>
                <div class="step "> <span class="icon"> <i class="fas fa-ship"></i> </span> <span class="text">Shipped To Island</span> </div>
                <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Received</span> </div>
            </div>
            <br>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div>
                    <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                    <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                </div>
            </article>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div>
                    <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                    <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                </div>
            </article>
            <br>
          
            <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
</div>

@endsection
@section('script')
<script> 
  $(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
@endsection




