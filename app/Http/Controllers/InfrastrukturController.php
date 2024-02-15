<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LogDB;
use App\Models\Infrastruktur;
use App\Models\Bts;
use Validator;

class InfrastrukturController extends Controller
{
    public function index(Request $request, Infrastruktur $infrastructures)
    {
	$q = $request->input('q');
	$infrastructures = $infrastructures->when($q, function($query) use ($q) {
		return $query->where('hostname', 'like', '%'.$q.'%')
		    	     ->orWhere('device_type', 'like', '%'.$q.'%')	
		    	     ->orWhere('ip_address', 'like', '%'.$q.'%');
	})
			     ->with('bts')
		 	     ->paginate(10);

	$request = $request->all();
    	return view('infrastructure.list', ['infrastructures' => $infrastructures, 'request' => $request]);
    }

    public function detail(Infrastruktur $infrastructure)
    {
    	return view('infrastructure.detail', ['infrastructure' => $infrastructure]);
    }

    public function create() 
    {
	$bts = Bts::all();
	return view('infrastructure.form', ['bts' => $bts,
					    'button' => 'Save',
					    'url' => 'dashboard.infrastructures.store']);
    }

    public function store(Request $request, Infrastruktur $infrastructure)
    {
    	$validator = Validator::make($request->all(), [
		'hostname' => 'required',
		'device_type' => 'required',
		'sn' => 'required',
		'location' => 'required',
		'model' => 'required',
		'ip_address' => 'required',
		'username' => 'required',
		'password' => 'required',
	]);

	if($validator->fails()) {
	  return redirect()
		->route('dashboard.infrastructures.create')
  		->withErrors($validator)
      		->withInput();		
	} else {
	$infrastructure->hostname = $request->input('hostname');
	$infrastructure->device_type = $request->input('device_type');
	$infrastructure->sn = $request->input('sn');
	$infrastructure->location = $request->input('location');
	$infrastructure->model = $request->input('model');
	$infrastructure->ip_address = $request->input('ip_address');
	$infrastructure->username = $request->input('username');
	$infrastructure->password = $request->input('password');
	$infrastructure->save();

	$infraName = $infrastructure->hostname;
	LogDB::record(Auth::user(), 'Menambah data infrastructure', $infraName);

	return redirect()
		->route('dashboard.infrastructures');
	}
    }

    public function edit(Infrastruktur $infrastructure) 
    {
	$bts = Bts::all();
	return view('infrastructure.form', ['infrastructure' => $infrastructure,
					    'bts' => $bts,
	    				    'button' => 'Update',
					    'url' => 'dashboard.infrastructures.update']);
    }

    public function update(Request $request, Infrastruktur $infrastructure)
    {
    	$validator = Validator::make($request->all(), [
		'hostname' => 'required',
		'device_type' => 'required',
		'sn' => 'required',
		'location' => 'required',
		'model' => 'required',
		'ip_address' => 'required',
		'username' => 'required',
		'password' => 'required',
	]);

	if($validator->fails()) {
	  return redirect()
		->route('dashboard.infrastructures.edit', $infrastructure->id)
  		->withErrors($validator)
      		->withInput();		
	} else {
	$infrastructure->hostname = $request->input('hostname');
	$infrastructure->device_type = $request->input('device_type');
	$infrastructure->sn = $request->input('sn');
	$infrastructure->location = $request->input('location');
	$infrastructure->model = $request->input('model');
	$infrastructure->ip_address = $request->input('ip_address');
	$infrastructure->username = $request->input('username');
	$infrastructure->password = $request->input('password');
	$infrastructure->save();

	$infraName = $infrastructure->hostname;
	LogDB::record(Auth::user(), 'Mengubah data infrastructure', $infraName);

	return redirect()
		->route('dashboard.infrastructures');
	}
    	
    }

    public function destroy(Infrastruktur $infrastructure)
    {
    	$infrastructure->delete();

	$infraName = $infrastructure->hostname;
	LogDB::record(Auth::user(), 'Menghapus data infrastructure', $infraName);

	return redirect()
		->route('dashboard.infrastructures');
    }
}
