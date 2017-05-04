@extends('backend.layouts.app')
@section('title')
Manage staff
@endsection
@section('site_map')
Manage staff
@endsection
@section('content')
@include('client::layouts.nav')
<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">client <a href="{{url('/client/staff/'.$client_id)}}" class="btn btn-success">Add new Staff</a></h3>
			</div>
			<div class="box-body">
			
				<table class="table table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Mobile</th>
					<th>Address</th>
					<th>Job</th>					
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($staffs as $staff)
				<tr>
					<td>{{$staff['name']}}</td>
					<td>{{$staff['mobile']}}</td>
					<td>{{$staff['address']}}</td>					
					<td>{{$staff['job_description']}}</td>					
					<td>{{$staff['status']}}</td>					
					<td>
						<div class="btn-group">
							
							<a href="{{url('client/staff/edit/'.$staff['client_id'].'/'.$staff['id'])}}" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" title="Update staff"><span class="glyphicon glyphicon-edit"></span></a>
							
							<a href="{{url('client/staff/delete/'.$staff['client_id'].'/'.$staff['id'])}}" type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete staff"><span class="glyphicon glyphicon-remove"></span></a>
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

@stop