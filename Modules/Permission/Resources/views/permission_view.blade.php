@extends('backend.layouts.app')
@section('title')
Permission View
@endsection
@section('site_map')
Permission View
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
				<table class="table table-bordered">
			<thead>
			    <tr>
			        <th>Permission Name</th>
			        <th>Action</th>
			    </tr>
			    </thead>
			    <tbody>
			    @foreach($permissions as $permission)
			    
				<tr>
			      	<td>{{$permission['name']}}</td>
			       
			        <td width="100">
			        	
			        	<a href="{{url('admin/permission/delete/'.$permission['id'])}}" type="button" class="btn btn-danger btn-xs pull-right"  data-toggle="tooltip" title="Delete Permission"><span class="glyphicon glyphicon-trash"></span></a>
			        	<a href="{{url('admin/permission/edit/'.$permission['id'])}}" type="button" class="btn btn-primary btn-xs pull-right"  data-toggle="tooltip" title="Edit Permission"><span class="glyphicon glyphicon-edit"></span></a>
					</td>
		        </tr>
				@endforeach
		    </tbody>
		</table>
			</div>
		</div>
	</div>
</div>
@endsection