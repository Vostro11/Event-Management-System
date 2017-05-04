@extends('backend.layouts.app')
@section('title')
App list
@endsection
@section('site_map')
App list
@endsection
@section('content')
@include('app::layouts.nav')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Permission</h3>
			</div>
			<div class="box-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>App Key</th>
							<th>App Secret</th>
							<th>Permission</th>
							<th>Acton</th>
						</tr>
					</thead>
					<tbody>
						@foreach($apps as $app)
						
						<tr>
							<td>{{$app['name']}}</td>
							<td>{{$app['app_key']}}</td>
							<td>{{$app['app_secret']}}</td>
							<td>
								<a href="{{url('/app/permission/'.$app['id'])}}" type="button" class="btn btn-success btn-xs pull-right"><span class="glyphicon glyphicon-user"></span>Add Permission</a>
							</td>
							<td >
								<div class="button-group">
									
									<a href="{{url('/app/delete/'.$app['id'])}}" type="button" class="btn btn-danger btn-xs pull-right" data-toggle="tooltip" title="Delete App"><span class="glyphicon glyphicon-trash"></span></a>

									<a href="{{url('/app/edit/'.$app['id'])}}" type="button" class="btn btn-primary btn-xs pull-right" data-toggle="tooltip" title="Edit App"><span class="glyphicon glyphicon-edit"></span></a>
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