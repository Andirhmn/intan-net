<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bts extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name',
	'alamat',
	'telepon',
	'pic',
	'latitude',
	'longitude'
    ];
}
