@extends('backend.layouts.app')
@section('title')
 Category Setup
@endsection
@section('site_map')
	Category Setup
@endsection
@section('content')
@include('event::layouts.nav')

<div class="row">
	<div class="col-md-3">
		<form class="form-horizontal" action="{{url('event/event-category/')}}" method="post">
		    {{csrf_field()}}
		      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		        <label class="control-label col-sm-4" for="name">Category:</label>
		        <div class="col-sm-8">
		          <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Enter Category/Sub-category Name" required="">
		          @if ($errors->has('name'))
		              <span class="help-block">
		                  <strong>{{ $errors->first('name') }}</strong>
		              </span>
		          @endif
		        </div>
		      </div>
		      <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
		        <label class="control-label col-sm-4" for="parent_id">Parent:</label>
		        <div class="col-sm-8">
			      <select name="parent_id" class="form-control">
			      		<option value="0">None</option>
						@foreach($categories as $category)
							<option value="{{$category['id']}}">{{$category['name']}}</option>
						@endforeach
				   </select>
				</div>
			   </div>
			   <input type="hidden" name="event_id" value="{{$event_id}}">
			   <div class="form-group">
		        <div class="col-sm-offset-2 col-sm-10">
		          <button type="submit" class="btn btn-success">Submit</button>
		        </div>
		      </div>
		</form>
	</div>
	<div class="col-md-9">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Categories</th>
					<th>Sub Categories</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($eventRepo->getAllCategoriesByEventId($event_id) as $category)
				<tr>
					<td>{{$category['name']}}</td>
					<td>
						<ul>
						@foreach($eventRepo->getCategoriesByParentId($category['id']) as $subcategory)

							<li>
								{{$subcategory['name']}}
								<a type="button" href="{{url('event/delete-event-category/'.$subcategory['id'])}}" class="btn btn-xs btn-danger float-right"> <span class="glyphicon glyphicon-trash"></span></a>
							</li>

						@endforeach
						<ul>
					</td>
					<td>
						<a type="button" href="{{url('event/delete-event-category/'.$category['id'])}}" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span> Delete Category</a>
					</td>
						
				</tr>
			@endforeach
			</tbody>
			</table>		
	</div>
</div>
@endsection