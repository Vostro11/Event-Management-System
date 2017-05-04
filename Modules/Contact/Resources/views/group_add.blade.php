@extends('backend.layouts.app')
@section('title')
Group add
@endsection
@section('site_map')
Group add
@endsection
@section('content')
@include('contact::layouts.nav')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Add New Group</h3>
			</div>
			<div class="box-body">
				<form method="post" action="{{url('contact/group/create')}}">
			   		{!! csrf_field() !!}
					  <div class="form-group">
					    <label for="name">*Name:</label>
					    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" required>
					    @if ($errors->has('name'))
			               <span class="help-block" style="color: red;">
			                   <strong>{{ $errors->first('name') }}</strong>
			               </span>
			            @endif
					  </div>
					  <button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
 
@stop
