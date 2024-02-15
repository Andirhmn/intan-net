@extends('layouts.mainlayout')

@section('title', 'Providers')

@section('content')

<div class="card col-lg-6" style="margin: 8px 2%;">
  <div class="card-header text-bg-dark">
    <div class="row">
      <div class="col-lg-10">
      	<h4>Provider</h4>
      </div>
      @if(isset($provider))
      <div class="col-lg-2">
	<a class="btn-outline-light btn" style="margin-left: 35px;" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></a>
      </div>
      @endif
    </div>
  </div>

  <div class="card-body">
    <div class="row">
      <form action="{{route($url, $provider->id ?? '')}}" method="post">
      @if(isset($provider))
      @method('put')
      @endif
      @csrf
       	<div>
	  <label for="name" class="form-label">Name</label>
	  <input type="text" class="form-control" name="name" value="{{old('name') ?? $provider->name ?? ''}}"/>
	  @error('name')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
	</div>
       	<div>
	  <label for="phone" class="mt-2 form-label">Telepon</label>
	  <input type="number" class="form-control" name="phone" value="{{old('phone') ?? $provider->phone ?? ''}}"/>
	  @error('phone')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
	</div>
       	<div>
	  <label for="email" class="mt-2 form-label">Email</label>
	  <input type="email" class="form-control" name="email" value="{{old('email') ?? $provider->email ?? ''}}"/>
	  @error('email')
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

<!-- Modal Delete--!>
@if(isset($provider))
<div class="fade modal" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-bg-dark">
        <h5>Delete Provider</h5>
        <button type="button" data-bs-dismiss="modal">X</button> 
      </div>

      <div class="modal-body">
        <label class="form-label">Apakah anda yakin ingin menghapus provider <b>{{$provider->name}}</b></label>
      </div>

      <div class="modal-footer">
        <form method="post" action="{{route('dashboard.providers.delete', $provider->id)}}">
        @method('delete')
        @csrf
          <button class="btn btn-outline-dark">Delete</button> 
        </form>
      </div>

    </div>
  </div>
</div>
@endif

@endsection
