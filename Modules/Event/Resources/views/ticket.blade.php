@extends('backend.layouts.app')
@section('title')
 Events ticket
@endsection
@section('site_map')
	Events ticket
@endsection
@section('content')
@include('event::layouts.nav')
<div class="row staff">
	<h4>Ticket</h4>	
	<div class="col-md-4 form" >
		<form class="form-horizontal" action="{{url('event/store_ticket')}}" method="post">
		    {{csrf_field()}}
		      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		        <label class="control-label col-sm-4" for="name">Name:</label>
		        <div class="col-sm-8">
		          <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Enter Name" required="">
		          @if ($errors->has('name'))
		              <span class="help-block">
		                  <strong>{{ $errors->first('name') }}</strong>
		              </span>
		          @endif
		        </div>
		      </div>
		      <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
		        <label class="control-label col-sm-4" for="name">Price:</label>
		        <div class="col-sm-8">
		          <input type="text" name="price" value="{{old('price')}}" class="form-control" id="price" placeholder="Enter price" required="">
		          @if ($errors->has('price'))
		              <span class="help-block">
		                  <strong>{{ $errors->first('price') }}</strong>
		              </span>
		          @endif
		        </div>
		      </div>
		      <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
		        <label class="control-label col-sm-4" for="name">quantity:</label>
		        <div class="col-sm-8">
		          <input type="number" name="quantity" value="{{old('quantity')}}" class="form-control" id="quantity" placeholder="Enter quantity" required="">
		          @if ($errors->has('quantity'))
		              <span class="help-block">
		                  <strong>{{ $errors->first('quantity') }}</strong>
		              </span>
		          @endif
		        </div>
		      </div>
		      <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
		        <label class="control-label col-sm-4" for="status">Status:</label>
		        <div class="col-sm-8">
		              <div class="radio">
		                  <label><input type="radio" value="available" name="status">Available</label>
		                </div>
		                <div class="radio">
		                  <label><input type="radio" value="unavailable" name="status">Unavailable</label>
		                </div>
		               
		            	
		          @if ($errors->has('status'))
		              <span class="help-block">
		                  <strong>{{ $errors->first('status') }}</strong>
		              </span>
		          @endif
		        </div>
		      </div>
		      <input type="hidden" name="event_id" value="{{$event_id}}">
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
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Status</th>
					<th>Change Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($tickets as $ticket)
				<tr>
					<td>{{$ticket['name']}}</td>
					<td>{{$ticket['price']}}</td>
					<td>{{$ticket['quantity']}}</td>
					<td>{{$ticket['status']}}</td>
					<td>
						
						<form class="change_status" action="{{url('event/change_status_of_ticket/'.$ticket['event_id'])}}" method="post">
							<input type="hidden" name="id" value="{{$ticket['id']}}">
							{{csrf_field()}}
							@if($ticket['status'] == 'available')
								<input type="checkbox" name="check" class="check" checked> This is Available
							@endif
							@if($ticket['status'] == 'unavailable')
								<input type="checkbox" name="check" class="check">
							@endif
						</form>
						
					</td>									
					<td>
						<div class="btn-group">
							
							<a href="{{url('event/delete_ticket/'.$ticket['id'])}}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete Event"><span class="glyphicon glyphicon-remove"></span></a>
						</div>
					</td>
					
					</tr>
			@endforeach
			</tbody>
		</table>	
	</div>
</div>
<script>
	$(document).on('change','.check',function(){
		$(this).parent().submit();
	})
</script>
@stop