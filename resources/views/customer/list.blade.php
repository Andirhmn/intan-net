

@extends('layouts.mainlayout')

@section('title', 'Customers')

@section('content')

<div style="margin: 20px auto auto 6%;">
  <a class="btn btn-outline-dark" href="{{route('dashboard.customers.create')}}">+ Customer</a>
</div>

<div class="card" style="margin: 8px 5%;">
  <div class="card-header text-bg-dark">
    <div class="row">
      <div class="col-lg-8">
      	<h4>Customers</h4>
      </div>

      <div class="col-lg-4">
	<form method="get" action="">
	  <div class="input-group">
	    <input class="form-control" type="text" name="q" placeholder="Search" />
	    <button class="btn btn-outline-primary">Search</button>
	  </div>
	</form>
      </div>
    </div>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="m-0 table table-dark table-striped">
      	<thead>
      	  <tr>
	    <th>#</th>
	    <th>Customer ID</th>
	    <th>Name</th>
	    <th>Service</th>
	    <th>IP Address Radio</th>
	    <th>IP Address Router</th>
	    <th>Status</th>
      	  </tr>
	</thead>
	<tbody>
	  @foreach($customers as $customer)
	  @php
	    $status = $customer->status;
	  @endphp
	    <tr>
	      <td>{{($customers->currentPage() - 1) * $customers->perPage() + $loop->iteration}}</td>
	      <td><a href="{{route('dashboard.customers.details', $customer->id)}}">{{$customer->id_customer}}</a></td>
	      <td>{{$customer->name}}</td>
	      <td><a href="{{route('dashboard.services')}}">{{$customer->services->name}}</a></td>
	      <td>{{$customer->ip_address_radio}}</td>
	      <td>{{$customer->ip_address_router}}</td>
	      <td @if($status == 'Block_access') ? style='color: red;' 
	  	  @else($status == 'Active') ? style='color: green;' @endif >
		  {{$customer->status}} 
	      </td>
	    </tr>
	  @endforeach
	</tbody>
      </table>
    </div>
  </div>

</div>

<div class="container">
  {{$customers->appends($request)->links()}}
</div>

@endsection
