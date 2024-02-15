<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LogDB;
use App\Models\Customer;
use App\Models\Service;
use App\Models\Bts;
use Validator;

class CustomerController extends Controller
{
    public function index(Request $request, Customer $customers)
    {
	$q = $request->input('q');
	$customers = $customers->when($q, function($query) use ($q) {
		  return $query->where('name', 'like', '%'.$q.'%')    
			       ->orwhere('ip_address_radio', 'like', '%'.$q.'%')
			       ->orwhere('ip_address_router', 'like', '%'.$q.'%');
	})
			       ->with('services')
			       ->with('bts')
			       ->paginate(10);

	$request = $request->all();
	return view('customer.list', ['customers' => $customers, 'request' => $request]);	
    }

    public function detail(Customer $customer) 
    {
	$services = Service::all();
    	return view('customer.detail', ['customer' => $customer, 'services' => $services]);
    }

    public function create()
    {
	$services = Service::all();
	$bts = Bts::all();
	return view('customer.form', ['services' => $services, 
				      'bts' => $bts,
				      'button' => 'Save',
				      'url' => 'dashboard.customers.store']);
    }

    public function store(Request $request, Customer $customer)
    {
	$cst = Customer::latest()->first();
	$kodeTanggal = date('dmY');

	if($cst == null) {
	$nomorUrut = "00001";
	} else {
	  $nomorUrut = substr($cst->id_customer, 4, 5);
	  $nomorUrut = (int)$nomorUrut + 1;
	  $nomorUrut = "0000".$nomorUrut;
	}
	$idCustomer = $kodeTanggal.$nomorUrut;

    	$validator = Validator::make($request->all(), [
		'name' => 'required',
		'service' => 'required',
		'alamat' => 'required',
		'pic' => 'required',
		'phone' => 'required',
		'media' => 'required',
		'tower' => 'required',
		'access_point' => 'required',
		'radio' => 'required',
		'ip_address_radio' => 'required',
		'username_radio' => 'required',
		'password_radio' => 'required',
		'router' => 'required',
		'ip_address_router' => 'required',
		'username_router' => 'required',
		'password_router' => 'required'
	]);

	if($validator->fails()) {
	  return redirect()
		->route('dashboard.customers.create')
		->withErrors($validator)
		->withInput();
	} else {

	$customer['id_customer'] = $idCustomer;
	$customer->name = $request->input('name');
	$customer->service = $request->input('service');
	$customer->alamat = $request->input('alamat');
	$customer->pic = $request->input('pic');
	$customer->phone = $request->input('phone');
	$customer->media = $request->input('media');
	$customer->tower = $request->input('tower');
	$customer->access_point = $request->input('access_point');
	$customer->radio = $request->input('radio');
	$customer->ip_address_radio = $request->input('ip_address_radio');
	$customer->username_radio = $request->input('username_radio');
	$customer->password_radio = $request->input('password_radio');
	$customer->router = $request->input('router');
	$customer->ip_address_router = $request->input('ip_address_router');
	$customer->username_router = $request->input('username_router');
	$customer->password_router = $request->input('password_router');
	$customer->save();

	$custName = $customer->name;
	LogDB::record(Auth::user(), 'Menambah data Customer', $custName);

	return redirect()
		->route('dashboard.customers');
	}
    }

    public function edit(Customer $customer)
    {
	$services = Service::all();
	$bts = Bts::all();
	return view('customer.form', ['customer' => $customer,
				      'services' => $services,
				      'bts' => $bts,
				      'button' => 'Update',
				      'url' => 'dashboard.customers.update']);
    }

    public function update(Request $request, Customer $customer) 
    {
    	$validator = Validator::make($request->all(), [
		'name' => 'required',
		'alamat' => 'required',
		'pic' => 'required',
		'phone' => 'required',
		'media' => 'required',
		'tower' => 'required',
		'access_point' => 'required',
		'radio' => 'required',
		'ip_address_radio' => 'required',
		'username_radio' => 'required',
		'password_radio' => 'required',
		'router' => 'required',
		'ip_address_router' => 'required',
		'username_router' => 'required',
		'password_router' => 'required'
	]);

	if($validator->fails()) {
	  return redirect()
		->route('dashboard.customers.edit', $customer->id)
		->withErrors($validator)
		->withInput();
	} else {

	$customer->name = $request->input('name');
	$customer->alamat = $request->input('alamat');
	$customer->pic = $request->input('pic');
	$customer->phone = $request->input('phone');
	$customer->media = $request->input('media');
	$customer->tower = $request->input('tower');
	$customer->access_point = $request->input('access_point');
	$customer->radio = $request->input('radio');
	$customer->ip_address_radio = $request->input('ip_address_radio');
	$customer->username_radio = $request->input('username_radio');
	$customer->password_radio = $request->input('password_radio');
	$customer->router = $request->input('router');
	$customer->ip_address_router = $request->input('ip_address_router');
	$customer->username_router = $request->input('username_router');
	$customer->password_router = $request->input('password_router');
	$customer->save();

	$custName = $customer->name;
	LogDB::record(Auth::user(), 'Mengubah data Customer', $custName);

	return redirect()
		->route('dashboard.customers');
	}
    }

    public function status(Request $request, Customer $customer) 
    {
	$customer->status = $request->input('status');
	$customer->save();

	$custStatus = $customer->status;
	$custName = $customer->name;
	LogDB::record(Auth::user(), 'Mengubah status customer '.$custName.' menjadi', $custStatus );

	return redirect()
		->route('dashboard.customers.details', $customer->id);
    }

    public function service(Request $request, Customer $customer) 
    {
	$customer->service = $request->input('service');
	$customer->save();

	$custService = $customer->services->name;
	$custName = $customer->name;
	LogDB::record(Auth::user(), 'Mengubah service customer '.$custName.' menjadi', $custService );

	return redirect()
		->route('dashboard.customers.details', $customer->id);
    }

    public function destroy(Customer $customer)
    {
	$customer->delete();

	$custName = $customer->name;
	LogDB::record(Auth::user(), 'Menghapus customer', $custName);

	return redirect()
		->route('dashboard.customers');
    }
}
