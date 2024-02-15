

@extends('layouts.mainlayout')

@section('title', 'Services')

@section('content')

<div class="card col-lg-6" style="margin: 8px 2%;">
  <div class="card-header text-bg-dark">
    <div class="row">
      <div class="col-lg-10">
        <h4>Provider</h4>
      </div>
      @if(isset($service))
      <div class="col-lg-2">
        <a class="btn-outline-light btn" style="margin-left: 35px;" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></a>
      </div>
      @endif
    </div>
  </div>

  <div class="card-body">
    <div class="row">
      <form action="{{route($url, $service->id ?? '')}}" method="post">
      @if(isset($service))
      @method('put')
      @endif
      @csrf
       	<div>
	  <label for="name" class="form-label">Name</label>
	  <input type="text" class="form-control" name="name" value="{{old('name') ?? $service->name ?? ''}}"/>
	  @error('name')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
	</div>
	<div>
 	@php
	  $group = $service->group ?? ''
	@endphp
	  <label for="group" class="mt-2 form-label">Group</label>
	  <select name="group" class="form-select">
	    <option value="">-- Pilih paket --</option>
	    <option value="Corporate" @if($group == 'Corporate') ? selected : '' @endif >Corporate</option>
	    <option value="SMB" @if($group == 'SMB') ? selected : '' @endif >Business</option>
	    <option value="Residential" @if($group == 'Residential') ? selected : '' @endif >Residential</option>
	  </select>
	  @error('group')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
  	</div>
       	<div>
	  <label for="upload" class="mt-2 form-label">Upload(Mbps)</label>
	  <input type="number" class="form-control" name="upload" value="{{old('upload') ?? $service->upload ?? ''}}"/>
	  @error('upload')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
	</div>
       	<div>
	  <label for="download" class="mt-2 form-label">Download(Mbps)</label>
	  <input type="number" class="form-control" name="download" value="{{old('download') ?? $service->download ?? ''}}"/>
	  @error('download')
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
@if(isset($service))
<div class="fade modal" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-bg-dark">
        <h5>Delete Service</h5>
        <button type="button" data-bs-dismiss="modal">X</button> 
      </div>

      <div class="modal-body">
        <label class="form-label">Apakah anda yakin ingin menghapus Service <b>{{$service->name}}</b></label>
      </div>

      <div class="modal-footer">
        <form method="post" action="{{route('dashboard.services.delete', $service->id)}}">
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
