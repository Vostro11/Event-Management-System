@extends('backend.layouts.app')
@section('title')
 Email Templete edit
@endsection
@section('site_map')
	Email Templete edit
@endsection
@section('content')
@include('email::layouts.nav')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Email</h3>
			</div>
			<div class="box-body">
				<form method="post" action="{{url('email/template/update/'.$template['id'])}}" id="form1" name="form1">
			   		{!! csrf_field() !!}
					  <div class="form-group">
					    <label for="template_id">*Template Id:</label>
					    <input type="text" class="form-control" name="template_id" id="template_id" value="{{$template['template_id']}}" required>
					    @if ($errors->has('template_id'))
			               <span class="help-block" style="color: red;">
			                   <strong>{{ $errors->first('template_id') }}</strong>
			               </span>
			            @endif
					  </div>
					  <div class="form-group">
					    <label for="subject">*Subject:</label>
					    <input type="text" class="form-control" name="subject" id="template_id" value="{{$template['subject']}}" required>
					    @if ($errors->has('subject'))
			               <span class="help-block" style="color: red;">
			                   <strong>{{ $errors->first('subject') }}</strong>
			               </span>
			            @endif
					  </div>
					  <div class="form-group">
					    <label for="message">*Message:</label>
					    <textarea class="form-control" name="message" rows="5" required>{{$template['message']}}</textarea>
					    @if ($errors->has('message'))
			               <span class="help-block" style="color: red;">
			                   <strong>{{ $errors->first('message') }}</strong>
			               </span>
			            @endif
					  </div>
				        <script>
				            CKEDITOR.replace( 'message' );
				        </script>
					  <button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
   
@stop
