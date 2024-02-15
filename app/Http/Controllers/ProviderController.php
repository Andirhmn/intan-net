<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LogDB;
use App\Models\Provider;
use Validator;

class ProviderController extends Controller
{
    public function index(Request $request, Provider $providers)
    {
	$q = $request->input('q');
	$providers = $providers->when($q, function($query) use ($q) {
	   return $query->where('name', 'like', '%'.$q.'%');
	
	})
			->paginate(10);

	$request = $request->all();
    	return view('provider.list', ['providers' => $providers, 'request' => $request]);
    }

    public function create()
    {
	return view('provider.form', ['button' => 'Save', 
				      'url' => 'dashboard.providers.store']);
    }

    public function store(Request $request, Provider $provider)
    {
    	$validator = Validator::make($request->all(), [
		'name' => 'required',
		'phone' => 'required',
		'email' => 'required'
	]);
	
	if($validator->fails()) {
	  return redirect()
		->route('dashboard.providers.create')
	  	->withErrors($validator)
		->withInput();
	} else {
	
	$provider->name = $request->input('name');
	$provider->phone = $request->input('phone');
	$provider->email = $request->input('email');
	$provider->save();

	$providerName = $provider->name;
	LogDB::record(Auth::user(), 'Menambah data Provider', $providerName);

	return redirect()
		->route('dashboard.providers');
	}
    }

    public function edit(Provider $provider)
    {
	return view('provider.form', ['provider' => $provider,
				      'button' => 'Update', 
				      'url' => 'dashboard.providers.update']);
    }

    public function update(Request $request, Provider $provider)
    {
    	$validator = Validator::make($request->all(), [
		'name' => 'required',
		'phone' => 'required',
		'email' => 'required'
	]);
	
	if($validator->fails()) {
	  return redirect()
		->route('dashboard.providers.edit', $provider->id)
	  	->withErrors($validator)
		->withInput();
	} else {
	
	$provider->name = $request->input('name');
	$provider->phone = $request->input('phone');
	$provider->email = $request->input('email');
	$provider->save();

	$providerName = $provider->name;
	LogDB::record(Auth::user(), 'Mengubah data Provider', $providerName);

	return redirect()
		->route('dashboard.providers');
	}
    }

    public function destroy(Provider $provider)
    {
	$provider->delete();

	$providerName = $provider->name;
	LogDB::record(Auth::user(), 'Menghapus data Provider', $providerName);

	return redirect()
		->route('dashboard.providers');
    }
}
