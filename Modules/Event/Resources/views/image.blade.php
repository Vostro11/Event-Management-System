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
				<h3 class="box-title">Image</h3>
			</div>
			<div class="box-body">
				<div class="col-md-4" >
					<form class="form-horizontal" action="{{url('event/store_image')}}" method="post" enctype="multipart/form-data">
					    {{csrf_field()}}
					      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					        <label class="control-label col-sm-4" for="image">Select Logo:</label>
					        <div class="col-sm-8">
					          <input type="file" class="form-control" name="image" id="file">
					          @if ($errors->has('image'))
					              <span class="help-block">
					                  <strong>{{ $errors->first('image') }}</strong>
					              </span>
					          @endif
					        </div>
					      </div>
					      
					      <input type="hidden" name="event_id" value="{{$event_id}}">
					      <input type="hidden" name="client_id" value="{{$client_id}}">
					      <input type="hidden" name="status" value="logo">
					      <div class="form-group">
					        <div class="col-sm-offset-2 col-sm-10">
					          <button type="submit" class="btn btn-success">Create</button>
					        </div>
					      </div>
			      	</form>
			

					<form class="form-horizontal" action="{{url('event/store_image')}}" method="post" enctype="multipart/form-data">
					    {{csrf_field()}}
					      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					        <label class="control-label col-sm-4" for="image">Select Image:</label>
					        <div class="col-sm-8">
					          <input type="file" class="form-control" name="image" id="file">
					          @if ($errors->has('image'))
					              <span class="help-block">
					                  <strong>{{ $errors->first('image') }}</strong>
					              </span>
					          @endif
					        </div>
					      </div>
					      
					      <input type="hidden" name="event_id" value="{{$event_id}}">
					      <input type="hidden" name="client_id" value="{{$client_id}}">
					      <input type="hidden" name="status" value="other">
					      <div class="form-group">
					        <div class="col-sm-offset-2 col-sm-10">
					          <button type="submit" class="btn btn-success">Create</button>
					        </div>
					      </div>
			      	</form>
			</div>
	<div class="col-md-8 ">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Image</th>
					<th>Option</th>
					<th>Change Feature Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($images as $image)
				
				<tr>
					<td><img src="{{URL::asset('uploads/image/event/'.$image['image'])}}" alt="" height="60" width="60"></td>
					<td>{{$image['status']}}</td>									
					<td>
						<form class="change_status" action="{{url('event/change_status_of_image/'.$image['event_id'].'/'.$image['client_id'])}}" method="post">
							<input type="hidden" name="id" value="{{$image['id']}}">
							{{csrf_field()}}
							@if($image['status'] == 'feature')
								<input type="checkbox" name="check" class="check" checked> This is Featured
							@endif
							@if($image['status'] == 'other')
								<input type="checkbox" name="check" class="check">
							@endif
						</form>
					</td>									
					<td>
						<div class="btn-group">
							
							<a href="{{url('event/delete_image/'.$image['id'].'/'.$image['event_id'].'/'.$image['client_id'])}}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete Event"><span class="glyphicon glyphicon-remove"></span></a>


						</div>
					</td>
					
					</tr>
				
			@endforeach
			</tbody>
		</table>	
	</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).on('change','.check',function(){
		$(this).parent().submit();
	})
</script>
@stop