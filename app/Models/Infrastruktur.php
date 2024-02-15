<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infrastruktur extends Model
{
    use HasFactory;

    protected $fillable = [
    	'hostname',
	'device_type',
	'sn',
	'location',
	'model',
	'ip_address',
	'username',
	'password'
    ];

    public function bts()
    {
    	return $this->belongsTo(Bts::class, 'location');
    }
}
