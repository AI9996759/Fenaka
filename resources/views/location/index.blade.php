@extends('layouts.master')

@section('title')
Fenaka -Locations
@endsection

@section('content')

<!-- add location -->
<div class="modal fade" id="locationadd" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Location </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('location-store') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{method_field('POST')}}
          <div class="form-row">
            <div class="form-group col-md-6">
              <label><b>Name</b></label>
              <input type="text" name="name" required class="form-control" placeholder="Name">
            </div>
            <div class="form-group col-md-6">
              <label><b>Code</b></label>
              <input type="text" name="code" required class="form-control" placeholder="Code">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label><b>Email</b></label>
              <input type="email" name="email" required class="form-control" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
              <label ><b>View In Dropdownlist</b></label>
              <select name="view" class="form-control">
                <option value="No">NO</option>
                <option value="Yes" >YES</option>
            </select>
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


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Location Management</h1>
  <button href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#locationadd">
    <span class="icon text-white-50">
        <i class="fas fa-check"></i>
     </span>
     <span class="text">Add Location</span>
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
              <th>View In Dropdownlist</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Code</th>
              <th>Email</th>
              <th>View In Dropdownlist</th>
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
            {{$data->view}}
          </td>
          <td>
            <a class="btn btn-success edit btn-block" href="#">Edit</a>
            
            <a href="#" class="btn btn-danger rejected btn-block">    Delete    </a>
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




