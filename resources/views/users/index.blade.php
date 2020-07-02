@extends('layouts.master')

@section('title')

@endsection

@section('content')

{{-- Add a Users form Start --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
    
    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirm Password:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Location:</strong>
            <select class="form-control" name="location">
            @foreach ($location as $loc)
            <option value="{{$loc->code}}">{{$loc->name}}</option>
            @endforeach
            </select>
          </div>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
    {!! Form::close() !!}

        </div>
    </div>
  </div>
</div>
{{-- Add a Users form end --}}

{{-- Edit a Users form Start --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


          <form action="/users-update" method="POST" id="editForm">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            
            <div class="modal-body">
             
            <div class="form-group">
              <strong for="recipient-name" class="col-form-label">Name:</strong>
              <input type="text" name="name" id="name" value="" class="form-control" >
            </div>

            <div class="form-group">
              <strong for="recipient-name" class="col-form-label">Email:</strong>
              <input type="email" name="email" id="email" value="" class="form-control" >
            </div>

            <div class="form-group">
              <strong for="recipient-name" class="col-form-label">Password:</strong>
              <input type="password" name="password" value="" class="form-control" >
            </div>

            <div class="form-group">
              <strong for="recipient-name" class="col-form-label">Confirm Password:</strong>
              <input type="password" name="confirm-password" value="" class="form-control" >
            </div>

              <div class="form-group">
                <strong>Location:</strong>
                <select class="form-control" name="location">
                @foreach ($location as $loc)
                <option value="{{$loc->code}}">{{$loc->name}}</option>
                @endforeach
                </select>
              </div>

            <div class="form-group">
              <strong for="recipient-name" class="col-form-label">Roles:</strong>
              {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple' ,'id'=>'v')) !!}
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
          </div>
            

            </div>

          </form>
      

    </div>
  </div>
</div>
{{-- Edit a Users form end --}}

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Users Management</h4>
        @can('users-create')
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" >Create New User</button>
        @endcan
        <br><br><br>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
              <thead>
                <tr>
                   <th>No</th>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Roles</th>
                   <th>Location</th>
                   <th width="280px">Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Roles</th>
                   <th>Location</th>
                   <th width="280px">Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($data as $key => $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    @if(!empty($user->getRoleNames()))
                      @foreach($user->getRoleNames() as $v)
                      <span class="badge badge-pill badge-success">{{ $v }}</span>
                      @endforeach
                    @endif
                  </td>
                  <td>{{ $user->location }}</td>
                  <td>
                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                    @can('users-edit')
                    <a class="btn btn-primary edit" href="#">Edit</a>
                    @endcan
                    @can('users-delete')
                      {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                    @endcan
                  </td>
                </tr>
                 @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>


{!! $data->render() !!}



@endsection
@section('script')

<script> 
  $(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>

<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#datatable').DataTable();
        //Start Edit Record
        table.on('click','.edit',function(){
          $tr = $(this).closest('tr');
          if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
          }

          var data = table.row($tr).data();
          console.log(data);

          $('#name').val(data[1]);
          $('#email').val(data[2]);
          $('#v').val(data[3]);

          $('#editForm').attr('action', '/users-update/'+data[0]);
          $('#editModal').modal('show');
        });
    });
</script>


@endsection
