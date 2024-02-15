

@extends('layouts.mainlayout')

@section('title', 'Infrastructures')

@section('content')

<div class="card" style="margin: 8px 5%;">
  <div class="card-header text-bg-dark">
    <div class="row">
      <div class="col-lg-10">
      	<h4>Infrastructure Details</h4>
      </div>

      <div class="col-lg-2" style="padding-left: 65px;">
        <div class="dropdown">
          <a class="btn text-primary dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Action
          </a>
          <ul class="dropdown-menu bg-dark">
            <li> <a class="dropdown-item" href="{{route('dashboard.infrastructures.edit', $infrastructure->id)}}">Edit Data Infrastructure</a></li>
            <li> <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal" href="">Delete Infrastructure</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="m-0 table table-dark table-bordered table-striped">
	<tbody>
      	  <tr>
	    <th class="col-md-2">Hostname</th>
	    <td class="col-md-8">{{$infrastructure->hostname}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Device Type</th>
	    <td class="col-md-8">{{$infrastructure->device_type}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Model</th>
	    <td class="col-md-8">{{$infrastructure->model}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">SN / MAC Address</th>
	    <td class="col-md-8">{{$infrastructure->sn}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Location</th>
	    <td class="col-md-8"><a href="{{route('dashboard.bts.details', $infrastructure->bts->id)}}">{{$infrastructure->bts->name}}</a></td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">IP Address</th>
	    <td class="col-md-8">{{$infrastructure->ip_address}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Username</th>
	    <td class="col-md-8">{{$infrastructure->username}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Password</th>
	    <td class="col-md-8">{{$infrastructure->password}}</td>
      	  </tr>
	</tbody>
      </table>
    </div>
  </div>

</div>

<!-- Modal Delete--!>
<div class="fade modal" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-bg-dark">
        <h5>Delete Infrastructure</h5>
        <button type="button" data-bs-dismiss="modal">X</button> 
      </div>

      <div class="modal-body">
        <label class="form-label">Apakah anda yakin ingin menghapus infrastructure <b>{{$infrastructure->hostname}}</b></label>
      </div>

      <div class="modal-footer">
        <form method="post" action="{{route('dashboard.infrastructures.delete', $infrastructure->id)}}">
        @method('delete')
        @csrf
          <button class="btn btn-outline-dark">Delete</button> 
        </form>
      </div>

    </div>
  </div>
</div>

@endsection
