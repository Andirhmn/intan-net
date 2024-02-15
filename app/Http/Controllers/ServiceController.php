<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\LogDB;
use Validator;

class ServiceController extends Controller
{
    public function index(Request $request, Service $services) 
    {
	$q = $request->input('q');
	$services = $services->when($q, function($query) use ($q) {
	   return $query->where('name', 'like', '%'.$q.'%')
		   	->orWhere('group', 'like', '%'.$q.'%')
		   	->orWhere('upload', 'like', '%'.$q.'%')
		   	->orWhere('download', 'like', '%'.$q.'%');
	})
			->paginate(10);

	$request = $request->all();
	return view('service.list', ['services' => $services, 'request' => $request]);	
    }

    public function create() 
    {
	return view('service.form', ['button' => 'Save',
				     'url' => 'dashboard.services.store']);
    }

    public function store(Request $request, Service $service) 
    {
	$validator = Validator::make($request->all(), [
	 	'name' => 'required',
		'group' => 'required',
		'upload' => 'required',
		'download' => 'required'
	]);	

	if($validator->fails()) {
	  return redirect()
		->route('dashboard.services.create')
		->withErrors($validator)
		->withInput();
	  	 
	} else {
	$service->name = $request->input('name');
	$service->group = $request->input('group');
	$service->upload = $request->input('upload');
	$service->download = $request->input('download');
	$service->save();

	$serviceName = $service->name;
	LogDB::record(Auth::user(), 'Menambah data service', $serviceName);

	return redirect()
		->route('dashboard.services');
	}
    }

    public function edit(Service $service) 
    {
	return view('service.form', ['service' => $service,
		    		     'button' => 'Update',
				     'url' => 'dashboard.services.update']);
    }

    public function update(Request $request, Service $service) 
    {
	$validator = Validator::make($request->all(), [
	 	'name' => 'required',
		'group' => 'required',
		'upload' => 'required',
		'download' => 'required'
	]);	

	if($validator->fails()) {
	  return redirect()
		->route('dashboard.services.edit', $service->id)
		->withErrors($validator)
		->withInput();
	  	 
	} else {
	$service->name = $request->input('name');
	$service->group = $request->input('group');
	$service->upload = $request->input('upload');
	$service->download = $request->input('download');
	$service->save();

	$serviceName = $service->name;
	LogDB::record(Auth::user(), 'Mengubah data service', $serviceName);

	return redirect()
		->route('dashboard.services');
	}
    }

    public function destroy(Service $service) 
    {
	$service->delete();

	$serviceName = $service->name;
	LogDB::record(Auth::user(), 'Menghapus data service', $serviceName);

	return redirect()
		->route('dashboard.services');
	
    }
}
