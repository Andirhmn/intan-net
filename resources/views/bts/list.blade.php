

@extends('layouts.mainlayout')

@section('title', 'BTS/Tower')

@section('content')

<div style="margin: 20px auto auto 6%;">
  <a class="btn btn-outline-dark" href="{{route('dashboard.bts.create')}}">+ BTS/Tower</a>
</div>

<div class="card" style="margin: 8px 5%;">
  <div class="card-header text-bg-dark">
    <div class="row">
      <div class="col-lg-8">
      <h4>BTS/Tower</h4>
      </div>

      <div class="col-lg-4">
	<form method="get" action="">
	  <div class="input-group">
	    <input type="text" class="form-control" name="q" placeholder="Search" />
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
	    <th>Name</th>
	    <th>Alamat</th>
      	  </tr>
	</thead>
	<tbody>
	  @foreach($bts as $row)
	    <tr>
	      <td>{{($bts->currentPage() - 1) * $bts->perPage() + $loop->iteration}}</td>
	      <td><a href="{{route('dashboard.bts.details', $row->id)}}">{{$row->name}}</a></td>
	      <td>{{$row->alamat}}</td>
	    </tr>
	  @endforeach
	</tbody>
      </table>
    </div>
  </div>

</div>

<div class="container">
  {{$bts->appends($request)->links()}}
</div>

@endsection
