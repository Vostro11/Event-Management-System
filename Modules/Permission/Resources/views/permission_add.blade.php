@extends('backend.layouts.app')
@section('title')
 Add Permission
@endsection
@section('site_map')
Add Permission
@endsection
@section('content')
@include('permission::layouts.nav')
<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"> Add Permission</h3>
			</div>
			<div class="box-body">
				<form method="post" action="{{url('admin/permission/store')}}">
			   		{!! csrf_field() !!}
					  <div class="form-group">
					    <label for="name">Permission Name:</label>
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
   
@endsection
