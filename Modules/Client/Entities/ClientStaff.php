<?php 
namespace Modules\Client\Entities;

use Illuminate\Database\Eloquent\Model;

class ClientStaff extends Model{
	protected $table='client_staffs';
	protected $fillable=[
				'id',
				'name',
				'mobile',
				'address',
				'status',
				'job_description',
				'user_id',
				'client_id',
			];
	protected $hidden=[
	];
}