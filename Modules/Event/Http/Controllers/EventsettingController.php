<?php 

namespace Modules\Event\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Modules\Event\Repositories\EventsettingRepository;


class EventsettingController extends Controller{
	private $eventsettingRepo;

	public function __construct(
		EventsettingRepository $eventsettingRepo
	){
		$this->eventsettingRepo = $eventsettingRepo;
	}

	public function index($event_id){
		$eventsettings = $this->eventsettingRepo->getEventsettingByEventId($event_id);
		return view('event::eventsetting.index',compact('eventsettings','event_id'));
	}

	public function create($event_id){
		return view('event::eventsetting.create',compact('event_id'));
	}

	public function store(Request $request){
		if($this->eventsettingRepo->isAlready($request['event_id'])){
			Session::flash('error','Cannot add more then One');
			return redirect('admin/event/eventsetting/'.$request['event_id']);
		}
		$this->eventsettingRepo->createEventsetting($request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/event/eventsetting/'.$request['event_id']);
	}

	public function show(){
		return view('event::eventsetting.show');
	}

	public function edit($id){
		$eventsetting = $this->eventsettingRepo->getEventsettingById($id);
		return view('event::eventsetting.edit',compact('eventsetting'));
	}

	public function update($id ,Request $request){
		$this->eventsettingRepo->updateEventsetting($id,$request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/event/eventsetting/'.$request['event_id']);
	}

	public function delete($id){
		$this->eventsettingRepo->deleteEventsetting($id);
		Session::flash('success','Operation Success');
		return back();
	}

}