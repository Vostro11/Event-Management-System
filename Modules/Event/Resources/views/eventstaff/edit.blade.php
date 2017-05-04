@extends('backend.layouts.app')
@section('title')
	edit
@endsection
@section('site_map')
	eventstaff/edit
@endsection
@section('content')
	@include('event::layouts.nav')
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">edit</h3>
					<a href="{{url('admin/event/eventstaff/create')}}" data-toggle="tooltip" title="Create!" class="btn btn-primary btn-xs pull-right"><i class="glyphicon glyphicon-plus"></i></a>
				</div>
				<div class="box-body">
					<form role="form" action="{{url('admin/event/eventstaff/update/'.$eventstaff['id'])}}" method="post" enctype="multipart/form-data">
						{!! csrf_field() !!}
						<div class="form-group">
							<div class="col-md-3">
								<label for="event_id" {{ $errors->has('event_id') ? ' has-error' : '' }}>Event_id:</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" id="event_id" placeholder="Enter event_id" name="event_id" value="{{$eventstaff['event_id']}}" required>
								@if ($errors->has('event_id'))
									<span class="help-block" style="color: #cc0000">
										<strong> * {{ $errors->first('event_id') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<label for="user_id" {{ $errors->has('user_id') ? ' has-error' : '' }}>User_id:</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" id="user_id" placeholder="Enter user_id" name="user_id" value="{{$eventstaff['user_id']}}" required>
								@if ($errors->has('user_id'))
									<span class="help-block" style="color: #cc0000">
										<strong> * {{ $errors->first('user_id') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary btn-flat btn-sm">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
