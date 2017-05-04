@extends('backend.layouts.app')
@section('title')
Clients
@endsection
@section('site_map')
Clients
@endsection
@section('content')
@include('client::layouts.nav')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Clients</h3>
			</div>
			<div class="box-body">
				<table class="table table-hover">
			<thead>
				<tr>
					<th>CLient Name</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Address</th>
					<th>Slug</th>
					<th>Expire on</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($clients as $client)
				<tr>
					<td>{{$client['client_name']}}</td>
					<td>{{$client['email']}}</td>
					
					<td>{{$client['mobile']}}</td>
					<td>{{$client['address']}}</td>
					<td>{{$client['slag']}}</td>
					<td>{{$client['expire_on']}}</td>
					<td>{{$client['status']}}</td>					
					<td>
						<div class="btn-group">
							<a href="{{('/client/permission/'.$client['id'])}}" type="button" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Add Permission"><span class="glyphicon glyphicon-check"></span></a>

							<a href="{{('/client/manage-staff/'.$client['id'])}}" type="button" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Manage Staff"><span class="glyphicon glyphicon-user"></span></a>

							<a href="{{url('client/edit/'.$client['id'])}}" type="button" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Update Client info"><span class="glyphicon glyphicon-pencil"></span></a>
							
							<a href="{{url('client/delete/'.$client['id'])}}" type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete Client"><span class="glyphicon glyphicon-remove"></span></a>
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