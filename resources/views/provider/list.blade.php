@extends('layouts.mainlayout')

@section('title', 'Providers')

@section('content')

<div style="margin: 20px auto auto 6%;">
  <a class="btn btn-outline-dark" href="{{route('dashboard.providers.create')}}">+ Provider</a>
</div>

<div class="card" style="margin: 8px 5%;">
  <div class="card-header text-bg-dark">
    <div class="row">
      <div class="col-lg-8">
      	<h4>Providers</h4>
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
	    <th>#</td>
	    <th>Name</th>
	    <th>Telepon</th>
	    <th>Email</th>
	    <th>Modify</th>
      	  </tr>
	</thead>
	<tbody>
	  @foreach($providers as $provider)
	    <tr>
	      <td>{{($providers->currentPage() - 1) * $providers->perPage() + $loop->iteration}}</td>
	      <td>{{$provider->name}}</td>
	      <td>{{$provider->phone}}</td>
	      <td>{{$provider->email}}</td>
	      <td><a class="btn btn-sm btn-outline-primary" href="{{route('dashboard.providers.edit', $provider->id)}}">Edit</a></td>
	    </tr>
	  @endforeach
	</tbody>
      </table>
      </div>
    </div>

</div>

<div class="container">
  {{$providers->appends($request)->links()}}
</div>

@endsection
