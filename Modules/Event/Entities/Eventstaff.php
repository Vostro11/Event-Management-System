<?php 
namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;

class Eventstaff extends Model{
	protected $table='eventstaffs';
	protected $fillable=[
				'id',
				'event_id',
				'user_id',
			];
	protected $hidden=[
	];
}