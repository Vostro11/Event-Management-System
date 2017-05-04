<?php 
namespace Modules\Event\Repositories;

use Modules\Event\Entities\Eventstaff;

class EventstaffEloquent implements EventstaffRepository{
	private $eventstaff;

	public function __construct(Eventstaff $eventstaff){
		$this->eventstaff = $eventstaff;
	}
	public function getAllEventstaff(){
		return $this->eventstaff->all();
	}

	public function getEventstaffById($id){
		return $this->eventstaff->findorfail($id);
	}

	public function createEventstaff(array $attributes){
		return $this->eventstaff->create($attributes);
	}

	public function updateEventstaff($id,array $attributes){
		return $this->eventstaff->findorfail($id)->update($attributes);
	}

	public function deleteEventstaff($id){
		return $this->eventstaff->findorfail($id)->delete();
	}

}