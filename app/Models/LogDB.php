<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogDB extends Model
{
    use HasFactory;

    protected $table = 'activity_logs';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'user_id',
	'log',
	'name'
    ];

    public static function record($user_id, $log, $name)
    {
    	return static::create([
	  'user_id' => is_null($user_id) ? null : $user_id->username,
	  'log' => $log,
	  'name' => $name
	]);
    }
}
