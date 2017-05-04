@extends('backend.layouts.app')
@section('title')
 Email Templete Single view
@endsection
@section('site_map')
	Email Templete Single view
@endsection
@section('content')
@include('email::layouts.nav')
<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Email</h3>
			</div>
			<div class="box-body">
				<table class="table table-bordered" style="background-color: #f9f9f9;">
			<thead>
			    <tr>
			        <th>Template</th>
			        <th>Subject</th>
			        <th>Message</th>
			        
			    </tr>
			    </thead>
			    <tbody>
			   
			    
				<tr>
			      	<td>{{$template['template_id']}}</td>
			        <td>{{$template['subject']}}</td>
			        <td>{!! $template['message'] !!}</td>
		        </tr>
			
		    </tbody>
		</table>
			</div>
		</div>
	</div>
</div>

@stop