

@extends('layouts.mainlayout')

@section('title', 'Customers')

@section('content')

<div class="card" style="margin: 8px 2%;">
  <div class="card-header text-bg-dark">
    <div class="row">
      <h4>Customer</h4>
    </div>
  </div>

  <div class="card-body">
    <form method="post" action="{{route($url, $customer->id ?? '')}}">
    @if(isset($customer))
    @method('put')
    @endif
    @csrf
      <div class="row">
      	<div class="col-lg-4">
      	  <h5>Customer Details</h5>
      	  <div>
	    <label for="name" class="mt-2 form-label">Name</label>
	    <input type="text" class="form-control" name="name" value="{{old('name') ?? $customer->name ?? ''}}"/>
	    @error('name')
	    <span class="text-danger">{{$message}}</span>
	    @enderror
	  </div>
	  <div>
	    <label for="service" class="mt-2 form-label">Service</label>
	    <select name="service" class="form-select">
	      <option value="">-- Pilih Service --</option>
	      @foreach($services as $service)
	      <option value="{{$service->id}}" @if(isset($customer->service) == $service->id) ? selected : '' @endif >{{$service->name}}</option>
	      @endforeach
	    </select>
	    @error('service')
	      <span class="text-danger">{{$message}}</span>
	    @enderror
	  </div>
	  <div>
	    <label for="alamat" class="mt-2 form-label">Alamat</label>
	    <textarea type="text" class="form-control" name="alamat">{{old('alamat') ?? $customer->alamat ?? ''}}</textarea> 
	    @error('alamat')
	      <span class="text-danger">{{$message}}</span>
	    @enderror
	  </div>
	  <div>
	    <label for="pic" class="mt-2 form-label">PIC</label>
	    <input type="text" class="form-control" name="pic" value="{{old('pic') ?? $customer->pic ?? ''}}"/>
	    @error('pic')
	      <span class="text-danger">{{$message}}</span>
	    @enderror
	  </div>
	  <div>
	    <label for="phone" class="mt-2 form-label">Phone</label>
	    <input type="number" class="form-control" name="phone" value="{{old('phone') ?? $customer->phone ?? ''}}"/>
	    @error('phone')
	      <span class="text-danger">{{$message}}</span>
	    @enderror
	  </div>
	  <div>
	  @php
	  $media = $customer->media ?? '';
	  @endphp 
	    <label for="media" class="mt-2 form-label">Media</label>
	    <select name="media" class="form-select" value="">
	      <option value="">-- Pilih Media --</option>
	      <option value="FO" @if($media == 'FO') ? selected : '' @endif >Fiber Optik</option>
	      <option value="Wireless" @if($media == 'Wireless') ? selected : '' @endif >Wireless</option>
	      <option value="UTP" @if($media == 'UTP') ? selected : '' @endif >UTP</option>
	    </select>
	    @error('media')
	    <span class="text-danger">{{$message}}</span>
	    @enderror
	  </div>
	  <div>
	    <label for="tower" class="mt-2 form-label">BTS/Tower</label>
	    <select name="tower" class="form-select">
	      <option value="">-- Pilih BTS --</option>
	      @foreach($bts as $row)
	      <option value="{{$row->id}}" @if(isset($customer->tower) == $row->id) ? selected : '' @endif >{{$row->name}}</option>
	      @endforeach
	    </select>
	    @error('tower')
	      <span class="text-danger">{{$message}}</span>
	    @enderror
	  </div>
	  <div> 
	    <label for="access_point" class="mt-2 form-label">Access Point</label>
	    <input type="text" class="form-control" name="access_point" value="{{old('access_point') ?? $customer->access_point ?? ''}}"/>
	    @error('access_point')
	      <span class="text-danger">{{$message}}</span>
	    @enderror
      	  </div>
	</div>

	<div class="col-lg-4">
	  <h5>Radio Details</h5>
      	  <div>
	    <label for="radio" class="mt-2 form-label">Radio Type</label>
	    <input type="text" class="form-control" name="radio" value="{{old('radio') ?? $customer->radio ?? ''}}"/>
	    @error('radio')
	      <span class="text-danger">{{$message}}</span>
	    @enderror
	  </div>
	  <div>
	    <label for="ip_address_radio" class="mt-2 form-label">IP Address</label>
	    <input type="text" class="form-control" name="ip_address_radio" value="{{old('ip_address_radio') ?? $customer->ip_address_radio ?? ''}}"/>
	    @error('ip_address_radio')
	      <span class="text-danger">{{$message}}</span>
	    @enderror
	  </div>
	  <div>
	    <label for="username_radio" class="mt-2 form-label">Username</label>
	    <input type="text" class="form-control" name="username_radio" value="{{old('username_radio') ?? $customer->username_radio ?? ''}}"/>
	    @error('username_radio')
	      <span class="text-danger">{{$message}}</span>
	    @enderror
	  </div>
	  <div>
	    <label for="password_radio" class="mt-2 form-label">Password</label>
	    <input type="text" class="form-control" name="password_radio" value="{{old('password_radio') ?? $customer->password_radio ?? ''}}"/>
	    @error('password_radio')
	      <span class="text-danger">{{$message}}</span>
	    @enderror
       	  </div>
	</div>

	<div class="col-lg-4">
	  <h5>Router Details</h5>
      	  <div>
	    <label for="router" class="mt-2 form-label">Router Type</label>
	    <input type="text" class="form-control" name="router" value="{{old('router') ?? $customer->router ?? ''}}"/>
	    @error('router')
	      <span class="text-danger">{{$message}}</span>
	    @enderror
	  </div>
	  <div>
	    <label for="ip_address_router" class="mt-2 form-label">IP Address</label>
	    <input type="text" class="form-control" name="ip_address_router" value="{{old('ip_address_router') ?? $customer->ip_address_router ?? ''}}"/>
	    @error('ip_address_router')
	      <span class="text-danger">{{$message}}</span>
	    @enderror
	  </div>
	  <div>
	    <label for="username_router" class="mt-2 form-label">Username</label>
	    <input type="text" class="form-control" name="username_router" value="{{old('username_router') ?? $customer->username_router ?? ''}}"/>
	    @error('username_router')
	      <span class="text-danger">{{$message}}</span>
	    @enderror
	  </div>
	  <div>
	    <label for="password_router" class="mt-2 form-label">Password</label>
	    <input type="text" class="form-control" name="password_router" value="{{old('password_router') ?? $customer->password_router ?? ''}}"/>
	    @error('password_router')
	      <span class="text-danger">{{$message}}</span>
	    @enderror
       	  </div>
	  <div class="mt-3 offset-lg-6">
	    <button class="btn btn-outline-dark" type="submit" onClick="window.history.back()">Cancel</button>
	    <button class="btn btn-dark" type="submit">{{$button}}</button>
	  </div>
	</div>

      </div>
    </form>
  </div>
</div>

@endsection
