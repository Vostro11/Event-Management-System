<?php 
namespace Modules\Event\Repositories;

use Modules\Event\Entities\Eventsetting;
use DB;

class EventsettingEloquent implements EventsettingRepository{
	private $eventsetting;

	public function __construct(Eventsetting $eventsetting){
		$this->eventsetting = $eventsetting;
	}
	public function getAllEventsetting(){
		return $this->eventsetting->all();
	}

	public function getEventsettingById($id){
		return $this->eventsetting->findorfail($id);
	}

	public function createEventsetting(array $attributes){
		return $this->eventsetting->create($attributes);
	}

	public function updateEventsetting($id,array $attributes){
		return $this->eventsetting->findorfail($id)->update($attributes);
	}

	public function deleteEventsetting($id){
		return $this->eventsetting->findorfail($id)->delete();
	}

	public function getEventsettingByEventId($event_id){
		return DB::table('eventsettings')
				->where('event_id','=',$event_id)
				->select('*')
				->get();
	}

	public function isAlready($event_id){
		$check = $this->getEventsettingByEventId($event_id);
		if(count($check)>0){
			return true;
		}
		return false;
	}

}