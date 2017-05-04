	<div class="row">
		<div class="col-md-6">
			<div class="btn-group">
				<a href="{{url('event/view')}}" class="btn btn-default">Home</a>
				<a href="{{url('event/create')}}" class="btn btn-default">Add event</a>
				<a href="{{url('event/details/'.Session::get('event_setting_id'))}}" class="btn btn-default">Back</a>
				
			</div>
		</div>
	</div>
