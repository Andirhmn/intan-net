

@extends('layouts.mainlayout')

@section('title', 'BTS/Tower')

@section('content')

<div class="card" style="margin: 8px 5%;">
  <div class="card-header text-bg-dark">
    <div class="row">
      <div class="col-lg-10">
      	<h4>BTS/Tower Details</h4>
      </div>

      <div class="col-lg-2" style="padding-left: 65px;">
        <div class="dropdown">
          <a class="btn text-primary dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Action
          </a>
          <ul class="dropdown-menu bg-dark">
            <li> <a class="dropdown-item" href="{{route('dashboard.bts.edit', $bts->id)}}">Edit Data BTS/Tower</a></li>
            <li> <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal" href="">Delete BTS/Tower</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>


  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="m-0 table table-dark table-bordered table-striped">
	<tbody>
      	  <tr>
	    <th class="col-md-2">Name</th>
	    <td class="col-md-8">{{$bts->name}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Alamat</th>
	    <td class="col-md-8">{{$bts->alamat}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Telepon</th>
	    <td class="col-md-8">{{$bts->telepon}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Pic</th>
	    <td class="col-md-8">{{$bts->pic}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Latitude</th>
	    <td class="col-md-8">{{$bts->latitude}}</td>
      	  </tr>
      	  <tr>
	    <th class="col-md-2">Longitude</th>
	    <td class="col-md-8">{{$bts->longitude}}</td>
      	  </tr>
	</tbody>
      </table>
    </div>
  </div>

</div>

<!-- Modal Delete--!>
<div class="fade modal" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-bg-dark">
        <h5>Delete BTS/Tower</h5>
        <button type="button" data-bs-dismiss="modal">X</button> 
      </div>

      <div class="modal-body">
        <label class="form-label">Apakah anda yakin ingin menghapus BTS/Tower <b>{{$bts->name}}</b></label>
      </div>

      <div class="modal-footer">
        <form method="post" action="{{route('dashboard.bts.delete', $bts->id)}}">
        @method('delete')
        @csrf
          <button class="btn btn-outline-dark">Delete</button> 
        </form>
      </div>

    </div>
  </div>
</div>

@endsection
