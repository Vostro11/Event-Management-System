@extends('backend.layouts.app')
@section('title')
 Edit App
@endsection
@section('site_map')
	Edit App
@endsection
@section('content')
@include('app::layouts.nav')
<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Edit App</h3>
			</div>
			<div class="box-body">
				<form method="post" action="{{url('app/update/'.$app['id'])}}" id="form1" name="form1">
			   		{!! csrf_field() !!}
					  <div class="form-group">
					    <label for="name">App Name:</label>
					    <input type="text" class="form-control" name="name" id="name" value="{{$app['name']}}" required>
					    @if ($errors->has('name'))
			               <span class="help-block" style="color: red;">
			                   <strong>{{ $errors->first('name') }}</strong>
			               </span>
			            @endif
					  </div>
					  <!-- <div class="form-group">
					    <label for="app_key">App Key:</label>
					    <input type="text" class="form-control" name="app_key" id="app_key" value="{{$app['app_key']}}" required>
					    @if ($errors->has('app_key'))
			               <span class="help-block" style="color: red;">
			                   <strong>{{ $errors->first('app_key') }}</strong>
			               </span>
			            @endif
					  </div>
					  <div class="form-group">
					    <label for="app_secret">App secret:</label>
					    <input type="text" class="form-control" name="app_secret" id="app_secret" value="{{$app['app_secret']}}" required>
					    @if ($errors->has('app_secret'))
			               <span class="help-block" style="color: red;">
			                   <strong>{{ $errors->first('app_secret') }}</strong>
			               </span>
			            @endif
					  </div> -->
					  
					  <button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
   
@stop
