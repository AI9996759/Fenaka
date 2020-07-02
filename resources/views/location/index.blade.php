@extends('layouts.master')

@section('title')
Fenaka -Locations
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Location Management</h1>
  <button href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#addcurrency">
        <span class="icon text-white-50">
            <i class="fas fa-check"></i>
         </span>
         <span class="text">Add location</span>
     </button>
</div>

   <!-- DataTales -->
  <div class="card shadow mb-4"> 
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Locations</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Code</th>
              <th>Email</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Code</th>
              <th>Email</th>
              <th>Actions</th>
            </tr>
          </tfoot>
          <tbody>
             @foreach ($location as $data)
            <tr>
              <td>
            {{$data->id}}
          </td>
          <td>
            {{$data->name}}
          </td>
          <td>
            {{$data->code}}
          </td>
          <td>
            {{$data->email}}
          </td>
          <td>
            <a class="btn btn-success edit btn-block" href="#">Activate</a>
            
            <a href="#" class="btn btn-danger rejected btn-block">    Reject    </a>
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

@endsection




