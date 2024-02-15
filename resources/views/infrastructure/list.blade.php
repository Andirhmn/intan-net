

@extends('layouts.mainlayout')

@section('title', 'Infrastructures')

@section('content')

<div style="margin: 20px auto auto 6%;">
  <a class="btn btn-outline-dark" href="{{route('dashboard.infrastructures.create')}}">+ Infrastructure</a>
</div>

<div class="card" style="margin: 8px 5%;">
  <div class="card-header text-bg-dark">
    <div class="row">
      <div class="col-lg-8">
      	<h4>Infrastructures</h4>
      </div>

      <div class="col-lg-4">
	<form method="get" action"">
	  <div class="input-group">
	    <input class="form-control" type="text" name="q" placeholder="Search" value="" />
	    <button class="btn btn-outline-primary" type="submit">Search</button>
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
	    <th>Hostname</th>
	    <th>IP Address</th>
	    <th>Device Type</th>
	    <th>Location</th>
      	  </tr>
	</thead>
	<tbody>
	  @foreach($infrastructures as $infrastructure)
	    <tr>
	      <td>{{($infrastructures->currentPage() - 1) * $infrastructures->perPage() + $loop->iteration}}</td>
	      <td><a href="{{route('dashboard.infrastructures.details', $infrastructure->id)}}">{{$infrastructure->hostname}}</a></td>
	      <td>{{$infrastructure->ip_address}}</td>
	      <td>{{$infrastructure->device_type}}</td>
	      <td><a href="{{route('dashboard.bts.details', $infrastructure->bts->id)}}">{{$infrastructure->bts->name}}</a></td>
	  @endforeach
	    </tr>
	</tbody>
      </table>
    </div>
  </div>

</div>

<div class="container">
  {{$infrastructures->appends($request)->links()}}
</div>

@endsection
