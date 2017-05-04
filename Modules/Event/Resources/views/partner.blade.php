@extends('backend.layouts.app')
@section('title')
 Partner
@endsection
@section('site_map')
	Partner
@endsection
@section('content')
@include('event::layouts.nav')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Email</h3>
			</div>
			<div class="box-body">
				<div class="col-md-4" >
		<form class="form-horizontal" action="{{url('event/store_partner')}}" method="post">
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
		      <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
		        <label class="control-label col-sm-4" for="name">Address:</label>
		        <div class="col-sm-8">
		          <input type="text" name="address" value="{{old('address')}}" class="form-control" id="address" placeholder="Enter Address" required="">
		          @if ($errors->has('address'))
		              <span class="help-block">
		                  <strong>{{ $errors->first('address') }}</strong>
		              </span>
		          @endif
		        </div>
		      </div>
		      <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
		        <label class="control-label col-sm-4" for="mobile">Mobile:</label>
		        <div class="col-sm-8">
		          <input type="text" name="mobile" value="{{old('mobile')}}" class="form-control" id="mobile" placeholder="Enter Mobile No" required="">
		          @if ($errors->has('mobile'))
		              <span class="help-block">
		                  <strong>{{ $errors->first('mobile') }}</strong>
		              </span>
		          @endif
		        </div>
		      </div>
		      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		        <label class="control-label col-sm-4" for="email">Email:</label>
		        <div class="col-sm-8">
		          <input type="text" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Enter email" required="">
		          @if ($errors->has('email'))
		              <span class="help-block">
		                  <strong>{{ $errors->first('email') }}</strong>
		              </span>
		          @endif
		        </div>
		      </div>
		      <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
		        <label class="control-label col-sm-4" for="website">Website:</label>
		        <div class="col-sm-8">
		          <input type="text" name="website" value="{{old('website')}}" class="form-control" id="website" placeholder="Enter website No" required="">
		          @if ($errors->has('website'))
		              <span class="help-block">
		                  <strong>{{ $errors->first('website') }}</strong>
		              </span>
		          @endif
		        </div>
		      </div>
		      <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
		        <label class="control-label col-sm-4" for="type">Type:</label>
		        <div class="col-sm-8">
		          <input type="text" name="type" value="{{old('type')}}" class="form-control" id="type" placeholder="Enter type No" required="">
		          @if ($errors->has('type'))
		              <span class="help-block">
		                  <strong>{{ $errors->first('type') }}</strong>
		              </span>
		          @endif
		        </div>
		      </div>
		      <input type="hidden" name="event_id" value="{{$event_id}}">
		      <input type="hidden" name="client_id" value="{{$client_id}}">
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
					<th>Email</th>
					<th>Address</th>
					<th>Mobile</th>
					<th>Website</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($partners as $partner)
				<tr>
					<td>{{$partner['name']}}</td>
					<td>{{$partner['email']}}</td>
					<td>{{$partner['address']}}</td>
					<td>{{$partner['mobile']}}</td>									
					<td><a href="{{$partner['website']}}">{{$partner['website']}}</a></td>									
					<td>{{$partner['type']}}</td>									
					<td>
						<div class="btn-group">
							
							<a href="{{url('event/delete_partner/'.$partner['id'])}}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete Event"><span class="glyphicon glyphicon-remove"></span></a>


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

@stop