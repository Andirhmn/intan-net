<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LogDB;
use App\Models\Bts;
use Validator;

class BtsController extends Controller
{
    public function index(Request $request, Bts $bts)
    {
	$q = $request->input('q');
	$bts = $bts->when($q, function($query) use ($q) {
	   return $query->where('name', 'like', '%'.$q.'%')
			->orWhere('alamat', 'like', '%'.$q.'%');
	})
			->paginate(10);

	$request = $request->all();
	return view('bts.list', ['bts' => $bts, 'request' => $request]);
    }

    public function detail(Bts $bts)
    {
   	return view('bts.detail', ['bts' => $bts]); 
    }

    public function create()
    {
	return view('bts.form', ['button' => 'Save',
				 'url' => 'dashboard.bts.store']);
    }

    public function store(Request $request, Bts $bts) 
    {
	$validator = Validator::make($request->all(), [
		'name' => 'required',
		'alamat' => 'required',
		'telepon' => 'required',
		'pic' => 'required',
		'latitude' => 'required',
		'longitude' => 'required'
	]);

	if($validator->fails()) {
	  return redirect()
		->route('dashboard.bts.create')
		->withErrors($validator)
		->withInput();
	} else {
	  $bts->name = $request->input('name');
	  $bts->alamat = $request->input('alamat');
	  $bts->telepon = $request->input('telepon');
	  $bts->pic = $request->input('pic');
	  $bts->latitude = $request->input('latitude');
	  $bts->longitude = $request->input('longitude');
	  $bts->save();
		
	  $btsName = $bts->name;
	  LogDB::record(Auth::user(), 'Menambah data BTS/Tower', $btsName);

	  return redirect()
		->route('dashboard.bts');
	}
    }

    public function edit(Bts $bts)
    {
	return view('bts.form', ['bts' => $bts,
		    		 'button' => 'Update',
				 'url' => 'dashboard.bts.update']);
    }

    public function update(Request $request, Bts $bts) 
    {
	$validator = Validator::make($request->all(), [
		'name' => 'required',
		'alamat' => 'required',
		'telepon' => 'required',
		'pic' => 'required',
		'latitude' => 'required',
		'longitude' => 'required'
	]);

	if($validator->fails()) {
	  return redirect()
		->route('dashboard.bts.update', $bts->id)
		->withErrors($validator)
		->withInput();
	} else {
	  $bts->name = $request->input('name');
	  $bts->alamat = $request->input('alamat');
	  $bts->telepon = $request->input('telepon');
	  $bts->pic = $request->input('pic');
	  $bts->latitude = $request->input('latitude');
	  $bts->longitude = $request->input('longitude');
	  $bts->save();
		
	  $btsName = $bts->name;
	  LogDB::record(Auth::user(), 'Mengubah data BTS/Tower', $btsName);

	  return redirect()
		->route('dashboard.bts');
	}
    }

    public function destroy(Bts $bts)
    {
	$bts->delete();

	$btsName = $bts->name;
	LogDB::record(Auth::user(), 'Menghapus data BTS/Tower', $btsName);

	return redirect()
		->route('dashboard.bts');
    }

}
