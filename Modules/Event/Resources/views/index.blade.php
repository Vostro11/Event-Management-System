@extends('backend.layouts.app')
@section('title')
 Events
@endsection
@section('site_map')
	Events
@endsection
@section('content')
@include('event::layouts.nav')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Add new Event</h3>
			</div>
			<div class="box-body">
				<table class="table table-hover">
			<thead>
				<tr>
					<th>Title</th>
					<th>Date</th>
					<!-- <th>Time</th>
					<th>Address</th> -->
					<th>Venue</th>
					<th>Type</th>
					<th>Status</th>
					<th>Recurrence</th>
					<th>Recurrence Interval</th>
					<th>Action</th>
					<th>Settings</th>
					<!-- <th>Add</th> -->
				</tr>
			</thead>
			<tbody>
			@foreach($events as $event)
				<tr>
					
					<td>{{$event['event_title']}}</td>
					<td>{{$event['start_date']}} <b>-to-</b> {{$event['end_date']}}</td>
					<!-- <td>{{$event['start_time']}} <b>-to-</b> {{$event['end_time']}}</td> -->
					<!-- <td>{{$event['address']}}</td> -->
					<td>{{$event['venue']}}</td>
					<td>{{$event['if_paid']}}</td>
					<td>{{$event['status']}}</td>					
					<td>{{$event['recurring']}}</td>					
					<td>{{$event['recurring_remarks']}}</td>					
					<td>
						<div class="btn-group">
							<a href="{{url('event/single-view/'.$event['id'])}}" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" title="Event Details"><span class="glyphicon glyphicon-eye-open"></span></a>

							<a href="{{url('event/edit/'.$event['id'])}}" type="button" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Update Event info"><span class="glyphicon glyphicon-edit"></span></a>
							
							<a href="{{url('event/delete/'.$event['id'])}}" type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete Event"><span class="glyphicon glyphicon-remove"></span></a>
						</div>
					</td>
					<td>
						<a href="{{url('event/details/'.$event['id'])}}" type="button" class="btn btn-primary btn-block" data-toggle="tooltip" title="View Event Details"><span class="glyphicon glyphicon-cog pull-left"></span> Open Sttings</a>
					</td>
					<!-- <td>
						<div class="btn-group">
							<a href="{{url('event/add_partner/'.$event['id'].'/'.$event['client_id'])}}" type="button" class="btn btn-success btn-xs" data-toggle="tooltip" title="Delete Event"><span class="glyphicon glyphicon-eye-open"></span>   View Partner</a>
							<a href="{{url('event/add_image/'.$event['id'].'/'.$event['client_id'])}}" type="button" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Delete Event"><span class="glyphicon glyphicon-user"></span>   Add Image</a>
							<a href="{{url('event/add_form/'.$event['id'].'/'.$event['client_id'])}}" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" title="Delete Event"><span class="glyphicon glyphicon-cicle"></span>   Add Form</a>

							<a href="{{url('event/add_ticket/'.$event['id'])}}" type="button" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Delete Event"><span class="glyphicon glyphicon-cicle"></span>   Add Ticket</a>

						</div>
					</td> -->
						
					</tr>
			@endforeach
			</tbody>
		</table>	
			</div>
		</div>
	</div>
</div>

@stop