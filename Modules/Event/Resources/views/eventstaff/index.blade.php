@extends('backend.layouts.app')
@section('title')
	index
@endsection
@section('site_map')
	eventstaff/index
@endsection
@section('content')
	@include('event::layouts.nav')
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">index</h3>
					<a href="{{url('admin/event/eventstaff/create')}}" data-toggle="tooltip" title="Create!" class="btn btn-primary btn-xs pull-right"><i class="glyphicon glyphicon-plus"></i></a>
				</div>
				<div class="box-body">
					<table class="table table-condensed table-hover">
						<thead>
							<tr>
								<th>Event_id</th>
								<th>User_id</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($eventstaffs as $eventstaff)
							<tr>
								<td>{{$eventstaff['event_id']}}</td>
								<td>{{$eventstaff['user_id']}}</td>
								<td>
									<a href="{{url('admin/event/eventstaff/'.$eventstaff['id'].'/edit')}}" data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
									<a href="{{url('admin/event/eventstaff/delete/'.$eventstaff['id'])}}" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></a></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
