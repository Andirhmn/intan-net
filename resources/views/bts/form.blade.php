

@extends('layouts.mainlayout')

@section('title', 'BTS')

@section('content')

<div class="card col-lg-6" style="margin: 8px 2%;">
  <div class="card-header text-bg-dark">
    <div class="row">
      <h4>BTS/Tower</h4>
    </div>
  </div>

  <div class="card-body">
    <div class="row">
      <form action="{{route($url, $bts->id ?? '')}}" method="post">
      @if(isset($bts))
      @method('put')
      @endif
      @csrf
       	<div>
	  <label for="name" class="form-label">Name</label>
	  <input type="text" class="form-control" name="name" value="{{old('name') ?? $bts->name ?? ''}}"/>
	  @error('name')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
	</div>
       	<div>
	  <label for="alamat" class="mt-2 form-label">Alamat</label>
	  <textarea type="text" class="form-control" name="alamat">{{old('alamat') ?? $bts->alamat ?? ''}}</textarea>
	  @error('alamat')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
	</div>
       	<div>
	  <label for="telepon" class="mt-2 form-label">Telepon</label>
	  <input type="number" class="form-control" name="telepon"  value="{{old('telepon') ?? $bts->telepon ?? ''}}" />
	  @error('telepon')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
	</div>
       	<div>
	  <label for="pic" class="form-label">Pic</label>
	  <input type="text" class="form-control" name="pic" value="{{old('pic') ?? $bts->pic ?? ''}}"/>
	  @error('pic')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
	</div>
       	<div>
	  <label for="latitude" class="form-label">Gps latitude</label>
	  <input type="text" class="form-control" name="latitude" value="{{old('latitude') ?? $bts->latitude ?? ''}}"/>
	  @error('latitude')
	    <span class="text-danger">{{$message}}</span>
	  @enderror
	</div>
       	<div>
	  <label for="longitude" class="form-label">Gps longitude</label>
	  <input type="text" class="form-control" name="longitude" value="{{old('longitude') ?? $bts->longitude ?? ''}}"/>
	  @error('longitude')
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
