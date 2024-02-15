<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name',
	'service',
	'alamat',
	'pic',
	'phone',
	'media',
	'tower',
	'access_point',
	'radio',
	'ip_address_radio',
	'username_radio',
	'password_radio',
	'router',
	'ip_address_router',
	'username_router',
	'password_router'
    ];
  
    public function services()
    {
    	return $this->belongsTo(Service::class, 'service');	
    }

    public function bts()
    {
    	return $this->belongsTo(Bts::class, 'tower');	
    }
}
