<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogDB;
use App\Models\Customer;
use App\Models\Infrastruktur;
use App\Models\Bts;
use App\Models\Provider;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request, LogDB $logs)
    {
	$customers = Customer::count();
	$infrastructures = Infrastruktur::count();
	$bts = Bts::count();
	$providers = Provider::count();
	$users = User::orderBy('last_seen', 'DESC')->get();

	$q = $request->input('q');
	$logs = LogDB::latest()->when($q, function($query) use ($q) {
		  return $query->where('user_id', 'like', '%'.$q.'%')
		  	       ->orWhere('log', 'like', '%'.$q.'%')
		  	       ->orWhere('created_at', 'like', '%'.$q.'%');
	})
			       ->paginate(10);

	$request = $request->all();
	return view('dashboard', ['logs' => $logs, 
	 	    		  'customers' => $customers, 
	 	    		  'infrastructures' => $infrastructures, 
	 	    	 	  'bts' => $bts, 
	 	    		  'providers' => $providers,
	 	    		  'users' => $users, 
				  'request' => $request,
				  ]);	
    }
}
