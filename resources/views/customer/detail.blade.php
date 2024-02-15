

@extends('layouts.mainlayout')

@section('title', 'Customers')

@section('content')

<div class="card" style="margin: 8px 5%;">
  <div class="card-header text-bg-dark">
    <div class="row">
      <div class="col-lg-10">
      	<h4>Customer Details</h4>
      </div>

      <div class="col-lg-2" style="padding-left: 65px;">
      	<div class="dropdown">
	  <a class="btn text-primary dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	    Action
	  </a>
	  <ul class="dropdown-menu bg-dark">
	    <li> <a class="dropdown-item" href="{{route('dashboard.customers.edit', $customer->id)}}">Edit Data Customer</a></li>
	    <li> <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#statusModal" href="">Change Customer Status</a></li>
	    <li> <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#serviceModal" href="">Upgrade / Downgrade</a></li>
	    <li> <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal" href="">Delete Customer</a></li>
  	  </ul>
     	</div>
      </div>
    </div>
  </div>

  @php
  $status = $customer->status;
  @endphp

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="m-0 table table-dark table-bordered table-striped">
	<tbody>
      	  <tr>
	    <th class="col-md-2">Customer ID</th>
	    <td class="col-md-8">{{$customer->id_customer}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Name</th>
	    <td class="col-md-8">{{$customer->name}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Status</th>
	    <td class="col-md-8" @if($status == 'Active') ? style='color: green;' @else($status == Block_access) ? style='color: red;' @endif >
	        {{$customer->status}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Service</th>
	    <td class="col-md-8"><a href="{{route('dashboard.services')}}">{{$customer->services->name}}</a></td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Alamat</th>
	    <td class="col-md-8">{{$customer->alamat}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Telepon</th>
	    <td class="col-md-8">{{$customer->phone}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Pic</th>
	    <td class="col-md-8">{{$customer->pic}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Media</th>
	    <td class="col-md-8">{{$customer->media}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">BTS/Tower</th>
	    <td class="col-md-8"><a href="{{route('dashboard.bts.details', $customer->bts->id)}}">{{$customer->bts->name}}</a></td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Access Point</th>
	    <td class="col-md-8">{{$customer->access_point}}</td>
      	  </tr>
	</tbody>
      </table>
    </div>
  </div>

</div>

<div class="row" style="margin: 8px 5%;">
<div class="card col-lg-6 p-0 mb-2">
  <div class="card-header text-bg-dark">
    <h4>Radio Details</h4>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="m-0 table table-dark table-bordered table-striped">
	<tbody>
      	  <tr>
	    <th class="col-md-2">Radio Type</th>
	    <td class="col-md-8">{{$customer->radio}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">IP Address</th>
	    <td class="col-md-8">{{$customer->ip_address_radio}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Username</th>
	    <td class="col-md-8">{{$customer->username_radio}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Password</th>
	    <td class="col-md-8">{{$customer->password_radio}}</td>
      	  </tr>
	</tbody>
      </table>
    </div>
  </div>

</div>

<div class="card col-lg-6 p-0">
  <div class="card-header text-bg-dark">
    <h4>Router Details</h4>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="m-0 table table-dark table-bordered table-striped">
	<tbody>
      	  <tr>
	    <th class="col-md-2">Router Type</th>
	    <td class="col-md-8">{{$customer->router}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">IP Address</th>
	    <td class="col-md-8">{{$customer->ip_address_router}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Username</th>
	    <td class="col-md-8">{{$customer->username_router}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Password</th>
	    <td class="col-md-8">{{$customer->password_router}}</td>
      	  </tr>
	</tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Status --!>
<div class="fade modal" id="statusModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-bg-dark">
	<h5>Change Customer Status</h5>
	<button type="button" data-bs-dismiss="modal">X</button> 
      </div>

      <form method="post" action="{{route('dashboard.customers.details.status', $customer->id)}}">
      @csrf
      	<div class="modal-body">
	  <div class="form-check">
	    <input class="form-check-input" type="radio" name="status" value="Active" @if($status == 'Active') ? checked : '' @endif />
	    <label class="form-check-label" for="status">Open Block Access</label>
	  </div>
	  <div class="form-check">
	    <input class="form-check-input" type="radio" name="status" value="Block_access" @if($status == 'Block_access') ? checked : '' @endif />
	    <label class="form-check-label" for="status">Block Access</label>
	  </div>
      	</div>

      	<div class="modal-footer">
	  <button type="submit" class="btn btn-outline-dark">Save</button> 
	</div>
      </form>

    </div>
  </div>
</div>

<!-- Modal Service--!>
<div class="fade modal" id="serviceModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-bg-dark">
	<h5>Change Customer Service</h5>
	<button type="button" data-bs-dismiss="modal">X</button> 
      </div>

      <form method="post" action="{{route('dashboard.customers.details.service', $customer->id)}}">
      @csrf
      	<div class="modal-body">
	  <label for="service" class="form-label">Pilih Service</label>
	  <select class="form-select" name="service" value="">
	  @foreach($services as $service)
	    <option value="{{$service->id}}" @if($customer->service == $service->id) ? selected : '' @endif >{{$service->name}}</option>
	  @endforeach
	  </select>
	</div>

      	<div class="modal-footer">
	  <button type="submit" class="btn btn-outline-dark">Save</button> 
	</div>
      </form>

    </div>
  </div>
</div>

<!-- Modal Delete--!>
<div class="fade modal" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-bg-dark">
	<h5>Delete Customer</h5>
	<button type="button" data-bs-dismiss="modal">X</button> 
      </div>

      <div class="modal-body">
	<label class="form-label">Apakah anda yakin ingin menghapus customer <b>{{$customer->name}}</b></label>
      </div>

      <div class="modal-footer">
      	<form method="post" action="{{route('dashboard.customers.delete', $customer->id)}}">
      	@method('delete')
       	@csrf
	  <button class="btn btn-outline-dark">Delete</button> 
       	</form>
      </div>

    </div>
  </div>
</div>
@endsection
