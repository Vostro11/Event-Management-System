@extends('backend.layouts.app')
@section('title')
Events details
@endsection
@section('site_map')
Events details
@endsection
@section('content')
@include('event::layouts.nav')
<style>
	img{
		height: 300px;
		width: 100%;
	}
	p{
		line-height: 1.8em;
		font-family: sans-serif;
		font-size: 16px;
		padding: 10px 10px;
		margin-top:10px;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">{{$client['client_name']}}: {{$event['event_title']}}</h3>
			</div>
			<div class="box-body">
				<div class="col-md-8">
					<div class="details-img">
						<img src="{{URL::asset('uploads/image/event/'.$feature)}}" alt="">
					</div>
					<div class="description">
						<p>
							{{$event['description']}}
						</p>
					</div>
					<div class="details-detail">
						<div class="row">
							<div  class="col-md-6">
								<h2>Date</h2>
								<p>{{$event['start_date']}} <b>-to-</b> {{$event['end_date']}}</p>
							</div>
							<div  class="col-md-6">
								<h2>Time</h2>
								<p>{{$event['start_time']}} <b>-to-</b> {{$event['end_time']}}</p>
							</div>
						</div>
						<div class="row">
							<div  class="col-md-6">
								<h2>Venue</h2>
								<p>{{$event['venue']}}</p>
							</div>
							<div  class="col-md-6">
								<h2>Address</h2>
								<p>{{$event['address']}}</p>
							</div>
						</div>
					</div>
					<div class="details-slider">
						<h2>Other Images</h2>
						@foreach($images as $image)
						<div class="col-md-4">
							<img src="{{url('/uploads/image/event/'.$image['image'])}}">
						</div>
						@endforeach
					</div>
				</div>
				<div class="col-md-4">
				<div class="panel panel-primary">
						<div class="panel-heading">Action</div>
						<div class="panel-body">
							<a href="{{url('event/add_partner/'.$event['id'].'/'.$event['client_id'])}}" type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Delete Event"><span class="glyphicon glyphicon-user pull-left"></span>   View Partners</a><br/>

							<a href="{{url('admin/event/eventstaff/'.$event['id'])}}" type="button" class="btn btn-success btn-block" data-toggle="tooltip" title="Delete Event"><span class="glyphicon glyphicon-user pull-left"></span> Manage Staff</a><br/>

							<a href="{{url('event/add_image/'.$event['id'].'/'.$event['client_id'])}}" type="button" class="btn btn-primary btn-block" data-toggle="tooltip" title="Delete Event"><span class="glyphicon glyphicon-picture pull-left"></span>   Add Image</a><br/>
							<a href="{{url('event/event-category/'.$event['id'])}}" type="button" class="btn btn-default btn-block" data-toggle="tooltip" title="Delete Event"><span class="glyphicon glyphicon-picture pull-left"></span>   Add Category</a><br/>
							<a href="{{url('admin/event/eventsetting/'.$event['id'])}}" type="button" class="btn btn-default btn-block" data-toggle="tooltip" title="Delete Event"><span class="glyphicon glyphicon-picture pull-left"></span>   Manage Partner and Participants</a><br/>
							@if($event['if_paid'] == 'paid')
							<a href="{{url('event/add_ticket/'.$event['id'])}}" type="button" class="btn btn-warning btn-block" data-toggle="tooltip" title="Add Ticket"><span class="glyphicon glyphicon-credit-card pull-left"></span>   Add Ticket</a><br/>
							@endif
							<a href="{{url('event/add_form/'.$event['id'].'/'.$event['client_id'])}}" type="button" class="btn btn-info btn-block" data-toggle="tooltip" title="Delete Event"><span class="glyphicon glyphicon-pencil pull-left"></span>   Add Form</a><br/>
							<a href="{{url('event/single-view/'.$event['id'])}}" type="button" class="btn btn-default btn-block" data-toggle="tooltip" title="View Event"><span class="glyphicon glyphicon-calendar pull-left"></span> View Event</a><br/>
							<a href="{{url('event/edit/'.$event['id'])}}" type="button" class="btn btn-primary btn-block" data-toggle="tooltip" title="Update Event info"><span class="glyphicon glyphicon-edit pull-left"></span> Update Event</a><br/>
							
							<a href="{{url('event/delete/'.$event['id'])}}" type="button" class="btn btn-danger btn-block" data-toggle="tooltip" title="Delete Event"><span class="glyphicon glyphicon-remove pull-left"></span> Delete Event</a><br/>
							
						</div>
					</div>
					<div class="details-form">
						<h2>Assigned Form</h2>
						<ul>
							<li>{{$form_info['title']}}</li>
						</ul>
					</div>
					<div class="details-form">
						<h2>Partners</h2>
						<ul>
							@foreach($partners as $partner)
							<li>{{$partner['name']}}: {{$partner['type']}}</li>
							@endforeach
						</ul>
					</div>
					<div class="details-form">
						<h2>Tickets</h2>
						<ul>
							@foreach($tickets as $ticket)
							@if($ticket['status'] == 'available')
							<li>{{$ticket['name']}} : Rs {{$ticket['price']}}</li>
							@endif
							@endforeach
						</ul>
					</div>
					<!-- <div class="details-form">
						<h2>Participents</h2>
						<h3>5369</h3>
					</div> -->
					
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
	$('#lightSlider').lightSlider({
	item:4,
	loop:false,
	slideMove:2,
	easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
	speed:600,
	responsive : [
	{
	breakpoint:800,
	settings: {
	item:3,
	slideMove:1,
	slideMargin:6,
	}
	},
	{
	breakpoint:480,
	settings: {
	item:2,
	slideMove:1
	}
	}
	]
	});
	});
	</script>
	@stop