@extends('backend.layouts.app')
@section('title')
	index
@endsection
@section('site_map')
	eventsetting/index
@endsection
@section('content')
	@include('event::layouts.nav')
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">index</h3>
					<a href="{{url('admin/event/eventsetting/create/'.$event_id)}}" data-toggle="tooltip" title="Create!" class="btn btn-primary btn-xs pull-right"><i class="glyphicon glyphicon-plus"></i></a>
				</div>
				<div class="box-body">
					<table class="table table-condensed table-hover">
						<thead>
							<tr>
								<th>Call_partner_as</th>
								<th>Call_participant_as</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($eventsettings as $eventsetting)
							<tr>
								<td>{{$eventsetting['call_partner_as']}}</td>
								<td>{{$eventsetting['call_participant_as']}}</td>
								<td>
									<a href="{{url('admin/event/eventsetting/'.$eventsetting['id'].'/edit')}}" data-toggle="tooltip" title="Edit" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
									<a href="{{url('admin/event/eventsetting/delete/'.$eventsetting['id'])}}" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></a></i></a>
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
