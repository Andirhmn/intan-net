

@extends('layouts.mainlayout')

@section('title', 'Infrastructures')

@section('content')

<div class="card col-lg-6" style="margin: 8px 2%;">
  <div class="card-header text-bg-dark">
    <div class="row">
      <h4>Infrastructure</h4>
    </div>
  </div>

  <div class="card-body">
    <div class="row">
      <form action="{{route($url, $infrastructure->id ?? '')}}" method="post">
      @if(isset($infrastructure))
      @method('put')
      @endif
      @csrf
       	<div>
	  <label for="hostname" class="form-label">Name</label>
	  <input type="text" class="form-control" name="hostname" value="{{old('hostname') ?? $infrastructure->hostname ?? ''}}"/>
	  @error('hostname')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
	</div>
	<div>
	@php 
	  $deviceType = $infrastructure->device_type ?? '';
	@endphp
	  <label for="device_type" class="mt-2 form-label">Device Type</label>
	  <select name="device_type" class="form-select">
	    <option value="">-- Pilih Type --</option>
	    <option value="Router" @if($deviceType == 'Router') ? selected : '' @endif >Router</option>
	    <option value="Radio" @if($deviceType == 'Radio') ? selected : '' @endif >Radio</option>
	    <option value="Switch" @if($deviceType == 'Switch') ? selected : '' @endif >Switch</option>
	    <option value="Lainnya" @if($deviceType == 'Lainnya') ? selected : '' @endif >Lainnya</option>
	  </select>
	  @error('device_type')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
  	</div>
       	<div>
	  <label for="sn" class="mt-2 form-label">SN / MAC Address</label>
	  <input type="text" class="form-control" name="sn" value="{{old('sn') ?? $infrastructure->sn ?? ''}}"/>
	  @error('sn')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
	</div>
	<div>
	  <label for="location" class="mt-2 form-label">Location</label>
	  <select name="location" class="form-select">
	    <option value="">-- Pilih Type --</option>
	    @foreach($bts as $row)
	    <option value="{{$row->id}}" @if(isset($infrastructure->location) == $row->id) ? selected : '' @endif >{{$row->name}}</option>
	    @endforeach
	  </select>
	  @error('location')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
  	</div>
       	<div>
	  <label for="model" class="mt-2 form-label">Model</label>
	  <input type="text" class="form-control" name="model" value="{{old('model') ?? $infrastructure->model ?? ''}}"/>
	  @error('model')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
	</div>
       	<div>
	  <label for="ip_address" class="mt-2 form-label">IP Address</label>
	  <input type="text" class="form-control" name="ip_address" value="{{old('ip_address') ?? $infrastructure->ip_address ?? ''}}"/>
	  @error('ip_address')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
	</div>
       	<div>
	  <label for="username" class="mt-2 form-label">Username</label>
	  <input type="text" class="form-control" name="username" value="{{old('username') ?? $infrastructure->username ?? ''}}"/>
	  @error('username')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
	</div>
       	<div>
	  <label for="password" class="mt-2 form-label">Password</label>
	  <input type="text" class="form-control" name="password" value="{{old('password') ?? $infrastructure->password ?? ''}}"/>
	  @error('password')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
	</div>
	<div class="mt-3 offset-lg-9">
	  <button class="btn btn-outline-dark" type="submit" onClick="window.history.back()">Cancel</button>
	  <button class="btn btn-dark" type="submit">{{$button}}</button>
	</div>
      </form>
    </div>
  </div>
</div>

@endsection
