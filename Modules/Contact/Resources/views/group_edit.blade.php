@extends('backend.layouts.app')
@section('title')
Group edit
@endsection
@section('site_map')
Group edit
@endsection
@section('content')
@include('contact::layouts.nav')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Eidt group</h3>
			</div>
			<div class="box-body">
				<form method="post" action="{{url('contact/group/update/'.$group['id'])}}">
			   		{!! csrf_field() !!}
					  <div class="form-group">
					    <label for="name">*Name:</label>
					    <input type="text" class="form-control" name="name" id="name" value="{{$group['name']}}" required>
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
