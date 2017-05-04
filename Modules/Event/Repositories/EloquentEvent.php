<?php
namespace Modules\Event\Repositories;

use Modules\Event\Entities\Event;
use Modules\Event\Entities\Partner;
use Modules\Event\Entities\ImageModel;
use Modules\Event\Entities\EventCategory;
use Modules\Event\Entities\AssignForm;
use Modules\Event\Entities\Ticket;
use Modules\Event\Entities\RegisterInfo;

use DB;


/**
* 
*/
class EloquentEvent implements EventRepository
{
	private $event;
	private $partner;
	private $image;
	private $assignForm;
	private $ticket;
	private $registerInfo;
	private $eventCategory;
	public function __construct(Event $event,Partner $partner, ImageModel $image, AssignForm $assignForm, Ticket $ticket,RegisterInfo $registerInfo, EventCategory $eventCategory)
	{
		$this->event = $event;
		$this->partner = $partner;
		$this->image = $image;
		$this->assignForm = $assignForm;
		$this->ticket = $ticket;
		$this->eventCategory = $eventCategory;
		$this->registerInfo = $registerInfo;
	}

	public function getAll(){
		return $this->event->all();
	}

	public function getById($id){
		return $this->event->where('id',$id)->first();
	}

	public function create(array $attributes){
		//$attributes['client_id'] = 1;
		$start_date = $attributes['start_date'];
		$end_date = $attributes['end_date'];
		$todays_date = date('Y-m-d');
		if($todays_date < $end_date && $todays_date > $start_date){
			$attributes['status'] = 'running';
		}elseif($end_date < $todays_date){
			$attributes['status'] = 'finished';
		}else{
			$attributes['status'] = 'upcomming';
		}
		return $this->event->create($attributes);
	}

	public function update($id,array $attributes){
		return $this->event->findorfail($id)->update($attributes);
	}	

	public function delete($id){
		return $this->event->findorfail($id)->delete();
	}

	//partner

	public function store_partner(array $attributes){
		return $this->partner->create($attributes);
	}
	public function getAll_partner_byEvent_id($event_id){
		return $this->partner->where('event_id', $event_id)->get();
	}
	public function delete_partner($id){
		return $this->partner->findorfail($id)->delete();
	}

	//Ticket

	public function store_ticket(array $attributes){
		return $this->ticket->create($attributes);
	}
	public function getAll_ticket_byEvent_id($event_id){
		return $this->ticket->where('event_id', $event_id)->get();
	}
	public function delete_ticket($id){
		return $this->ticket->findorfail($id)->delete();
	}
	public function change_status_of_ticket($id,$event_id){
		$clickedticket = new Ticket();
		$array = array();
		$clickedticket = $this->ticket->findorfail($id);
		if($clickedticket['status'] == 'available'){
			$array['status'] = 'unavailable';
			return $this->ticket->findorfail($id)->update($array);
		}else{
			 
			$array['status'] = 'available';
			return $this->ticket->findorfail($id)->update($array);
		}
	}

	//image

	public function store_image(array $attributes){
		//$attributes['status'] = 'other';
		return $this->image->create($attributes);
	}
	public function getAll_image_byEvent_id($event_id){
		return $this->image->where('event_id', $event_id)->get();
	}
	public function delete_image($id){
		$oldimage = ImageModel::findOrFail($id);
        $destinationpath='uploads/image/event/';
        if(unlink($destinationpath.$oldimage['image']))
        {
            echo 'old image is deleted';
        }else{
            echo 'unable to delete old image';
        }
		return $this->image->findorfail($id)->delete();
	}
	public function change_status_of_image($id,$event_id){
		$clickedImage = new ImageModel();
		$array = array();
		$clickedImage = $this->image->findorfail($id);
		if($clickedImage['status'] == 'feature'){
			$array['status'] = 'other';
			return $this->image->findorfail($id)->update($array);
		}else{
			 
			$array['status'] = 'feature';
			return $this->image->findorfail($id)->update($array);
		}
	}

	//=========================================================================api===================================================

	public function ApiGetEventByClientId($client_id){
		$mypath='http://beta.ems.socialaves.com/uploads/image/event/';
		$events =  $this->event->where('client_id',$client_id)->get();
		$otherImages = array();
		$result = array();
		foreach ($events as $event) {
			$response = array();
			$response['id'] = $event['id'];
			$response['event_title'] = $event['event_title'];
            $response['start_date'] = $event['start_date'];
            $response['end_date'] = $event['end_date'];
            $response['start_time'] = $event['start_time'];
            $response['end_time'] = $event['end_time'];
            $response['address'] = $event['address'];
            $response['description'] = $event['description'];
            $response['venue'] = $event['venue'];
            $response['event_title'] = $event['event_title'];
            $image = $this->image->where('event_id', $event['id'])->where('status','feature')->first();
			$response['image'] = $mypath.$image['image'];
			
			$images = $this->image->where('event_id', $event['id'])->where('status','other')->get();
			if(count($images)>0){
				foreach ($images as $image) {
					$temp['image'] = $mypath.$image['image'];
					array_push($otherImages,$temp);
				}
				$response['otherImage'] = $otherImages;
			}
			array_push($result,$response);
		}
		
		return $result;
	}
	//Assign form
	public function assign_form($attributes){
		$input = array();
        $input['form_id'] = $attributes['form_id'];
        $input['event_id'] = $attributes['event_id'];
        $input['status'] = 'active';
        if($this->is_assignd($input['event_id'], $input['form_id'])){
        	$this->assignForm->create($input);
        	return true;
        }
        return false;
        

	}

	public function getAssignedForm($event_id){
		return $this->assignForm->where('event_id',$event_id)->get();
	}
	public function is_assignd($event_id,$form_id){
		if(count($this->assignForm->where('event_id',$event_id)->where('form_id', $form_id)->first())>0){
			return false;
		}
		return true;
	}

	public function change_status_of_assigned_form($id){
		$form = new AssignForm();
		$array = array();
		$form = $this->assignForm->findorfail($id);
		if($form['status'] == 'active'){
			$array['status'] = 'inactive';
			return $this->assignForm->findorfail($id)->update($array);
		}else{
			 
			$array['status'] = 'active';
			return $this->assignForm->findorfail($id)->update($array);
		}
	}

	public function delete_form($id){
		return $this->assignForm->findorfail($id)->delete();
	}





	//by suman------------------------------------------------
	public function getEventByFormId($form_id){
		$event= $this->assignForm->where('form_id','=',$form_id)->select('event_id')->first();
		return $event['event_id'];
	}
	public function createRegisterInfos(array $attributes){
		return $this->registerInfo->create($attributes);
	}

	public function deleteRegisterInfos($id){
		return $this->registerInfo->findorfail($id)->delete();
	}
	//by suman ends--------------------------------------------

	//Categories

	public function getAllCategoriesByEventId($event_id){
		return $this->eventCategory->where('event_id',$event_id)->where('parent_id',0)->get();//only category not subcategory
	}
	public function storeEventCategory($attributes){
		return $this->eventCategory->create($attributes);
	}

	public function getCategoriesByParentId($parent_id){
		return $this->eventCategory->where('parent_id',$parent_id)->get();
	}
	public function deleteEventCategory($category_id){
		$this->eventCategory->findorfail($category_id)->delete();
		return true;
	}

	public function getClientUserByEventId($event_id){
		$client = DB::table('events')->where('id','=',$event_id)->select('client_id')->first();
		$users = DB::table('users')->where('client_id',$client['client_id'])->get();
		return $users;

	}
	

}