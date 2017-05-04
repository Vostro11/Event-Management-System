<?php 

namespace Modules\Event\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Modules\Event\Repositories\EventstaffRepository;
use Modules\Event\Repositories\EventRepository;


class EventstaffController extends Controller{
	private $eventstaffRepo;
	private $eventRepo;

	public function __construct(
		EventstaffRepository $eventstaffRepo,
		EventRepository $eventRepo
	){
		$this->eventstaffRepo = $eventstaffRepo;
		$this->eventRepo = $eventRepo;
	}

	public function index($event_id){
		$eventstaffs = $this->eventstaffRepo->getAllEventstaff();
		return view('event::eventstaff.index',compact('eventstaffs','event_id'));
	}

	public function create($event_id){
		$users = $this->eventRepo->getClientUserByEventId($event_id);
		return $users;
		return view('event::eventstaff.create');
	}

	public function store(Request $request){
		$this->eventstaffRepo->createEventstaff($request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/event/eventstaff');
	}

	public function show(){
		return view('event::eventstaff.show');
	}

	public function edit($id){
		$eventstaff = $this->eventstaffRepo->getEventstaffById($id);
		return view('event::eventstaff.edit',compact('eventstaff'));
	}

	public function update($id ,Request $request){
		$this->eventstaffRepo->updateEventstaff($id,$request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/event/eventstaff');
	}

	public function delete($id){
		$this->eventstaffRepo->deleteEventstaff($id);
		Session::flash('success','Operation Success');
		return redirect('admin/event/eventstaff');
	}

}