<?php 
namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;

class RegisterInfo extends Model{
	protected $table='register_infos';
	protected $fillable=[
				'id',
				'event_id',
				'unique_code',
				'form_submission_id',
				'isattend',
				'user_id',
				'status',
			];
	protected $hidden=[
	];
}