

@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')

<div class="card" style="margin: 8px 5%;">
  <div class="bg-dark card-header">
    <div class="row">
       <div @if(Auth::user()->role_id == 1) ? class='col-lg-6' @else(Auth::user()->role_id == 2) class='col-lg-8' @endif>
        <h4 style="color: white;">Welcome, {{Auth::user()->username}}</h4>
      </div>

      @if(Auth::user()->role_id == 1) 
      <div class="col-lg-2" style="padding-left: 7%;">
        <div class="dropdown">
          <a class="btn text-primary dropdown-toggle" role="button" data-bs-toggle="dropdown">User status</a>
            <ul class="dropdown-menu bg-dark">
            @foreach($users as $user)   
              @php
                $status = $user->last_seen >= now()->subMinutes(2) ? 'Online' : 'Offline';
                $last_seen = Carbon\Carbon::parse($user->last_seen)->diffForHumans();
              @endphp
                <li class="dropdown-item" 
                  @if($status == 'Online') ? style='color: green;' 
                  @else($status == 'Offline') ? style='color: red;'
                  @endif >
                  {{$user->username}} | {{$status}} | {{$last_seen}}
                </li> 
            @endforeach
            </ul>
        </div>
      </div>
      @endif
          
      <div class="col-lg-4">
      	<form method="get" action="{{route('dashboard')}}">
          <div class="input-group d-flex justify-content-end">
            <input type="text" placeholder="Search" class="form-control"name="q" value="{{$request['q'] ?? ''}}" />
            <button style="z-index: 0;" class="btn btn-outline-primary" type="submit">Search</button>
          </div>
      	</form>
      </div>
    </div>
  </div>

  <div class="card-body"> 
    <div class="row">
      <div class="col-lg-3">
      	<div class="card-data customers">
      	  <div class="row">
            <div class="col-5"><i class="bi bi-people-fill"></i></div>
            <div class="col-7 d-flex flex-column justify-content-center">
              <a href="" class="card-desc">Customers</a>
              <div class="card-count">{{$customers}}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="card-data infrastructure">
     	  <div class="row">
            <div class="col-4"><i class="bi bi-reception-4"></i></div>
            <div class="col-8 d-flex flex-column justify-content-center">
              <a href="" class="card-desc">Infrastructures</a>
                <div class="card-count">{{$infrastructures}}</div>
	    </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="card-data bts">
       	  <div class="row">
            <div class="col-5"><i class="bi bi-broadcast-pin"></i></div>
            <div class="col-7 d-flex flex-column justify-content-center">
              <a href="" class="card-desc">BTS/Tower</a>
              <div class="card-count">{{$bts}}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="card-data provider">
       	  <div class="row">
            <div class="col-5"><i class="bi bi-card-list"></i></div>
            <div class="col-7 d-flex flex-column justify-content-center">
              <a href="" class="card-desc">Providers</a>
              <div class="card-count">{{$providers}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-3">
      <h5>#Recent Activities</h5>
	<div class="table-responsive">
      	  <table class="table table-dark table-stripped">
      	    <thead>
              <tr class="">
              	<th>#</th>
              	<th>Waktu</th>
              	<th>User</th>
              	<th>Log</th>
              </tr>
            </thead>
	    <tbody>
	    @foreach($logs as $log)
	      <tr>
	      	<td>{{($logs->currentPage() - 1) * $logs->perPage() + $loop->iteration}}</td>
	      	<td>{{$log->created_at}}</td>
	      	<td>{{$log->user_id}}</td>
	      	<td>{{$log->log}} <b>{{$log->name}}</b></td>
	      </tr>
	    @endforeach
            </tbody>
	  </table>
        </div>
    </div>
  </div>

</div>

<div class="container">
  {{$logs->appends($request)->links()}}
</div>

@endsection
