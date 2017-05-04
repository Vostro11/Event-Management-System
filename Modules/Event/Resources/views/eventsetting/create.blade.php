@extends('backend.layouts.app')
@section('title')
	create
@endsection
@section('site_map')
	eventsetting/create
@endsection
@section('content')
	@include('event::layouts.nav')
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">create</h3>
					<a href="{{url('admin/event/eventsetting/create')}}" data-toggle="tooltip" title="Create!" class="btn btn-primary btn-xs pull-right"><i class="glyphicon glyphicon-plus"></i></a>
				</div>
				<div class="box-body">
					<form role="form" action="{{url('admin/event/eventsetting/store')}}" method="post" enctype="multipart/form-data">
						{!! csrf_field() !!}
						<div class="form-group">
							<div class="col-md-3">
								<label for="call_partner_as" {{ $errors->has('call_partner_as') ? ' has-error' : '' }}>Call_partner_as:</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" id="call_partner_as" placeholder="Enter call_partner_as" name="call_partner_as" value="{{old('call_partner_as')}}" required>
								@if ($errors->has('call_partner_as'))
									<span class="help-block" style="color: #cc0000">
										<strong> * {{ $errors->first('call_partner_as') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<label for="call_participant_as" {{ $errors->has('call_participant_as') ? ' has-error' : '' }}>Call_participant_as:</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" id="call_participant_as" placeholder="Enter call_participant_as" name="call_participant_as" value="{{old('call_participant_as')}}" required>
								@if ($errors->has('call_participant_as'))
									<span class="help-block" style="color: #cc0000">
										<strong> * {{ $errors->first('call_participant_as') }}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<input type="hidden"  name="event_id" value="{{$event_id}}" required>
							
						<div class="box-footer">
							<button type="submit" class="btn btn-primary btn-flat btn-sm">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
