@extends('backend.layouts.app')
@section('title')
Permission Edit
@endsection
@section('site_map')
Permission Edith
@endsection
@section('content')
@include('permission::layouts.nav')
<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Permission</h3>
			</div>
			<div class="box-body">
				<form method="post" action="{{url('admin/permission/update/'.$permission['id'])}}" id="form1" name="form1">
			   		{!! csrf_field() !!}
					  <div class="form-group">
					    <label for="name">permission Name:</label>
					    <input type="text" class="form-control" name="name" id="name" value="{{$permission['name']}}" required>
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
