

@extends('layouts.mainlayout')

@section('title', 'Services')

@section('content')

<div style="margin: 20px auto auto 6%;">
  <a class="btn btn-outline-dark" href="{{route('dashboard.services.create')}}">+ Service</a>
</div>

<div class="card" style="margin: 8px 5%;">
  <div class="card-header text-bg-dark">
    <div class="row">
      <div class="col-lg-8">
      	<h4>Services</h4>
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
	    <th>Name</th>
	    <th>Group</th>
	    <th>Upload</th>
	    <th>Download</th>
	    <th>Modify</th>
      	  </tr>
	</thead>
	<tbody>
	  @foreach($services as $service)
	    <tr>
	      <td>{{($services->currentPage() - 1) * $services->perPage() + $loop->iteration}}</td>
	      <td>{{$service->name}}</td>
	      <td>{{$service->group}}</td>
	      <td>{{$service->upload}}Mbps</td>
	      <td>{{$service->download}}Mbps</td>
	      <td><a class="btn btn-sm btn-outline-primary" href="{{route('dashboard.services.edit', $service->id)}}">Edit</a></td>
	    </tr>
	  @endforeach
	</tbody>
      </table>
    </div>
  </div>

</div>

<div class="container">
  {{$services->appends($request)->links()}}
</div>
@endsection
