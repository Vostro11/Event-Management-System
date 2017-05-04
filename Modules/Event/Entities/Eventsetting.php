<?php 
namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;

class Eventsetting extends Model{
	protected $table='eventsettings';
	protected $fillable=[
				'id',
				'call_partner_as',
				'call_participant_as',
				'event_id',
			];
	protected $hidden=[
	];
}