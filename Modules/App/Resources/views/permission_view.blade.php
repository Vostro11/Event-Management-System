@extends('backend.layouts.app')
@section('title')
Assign Permission
@endsection
@section('site_map')
Assign Permission
@endsection
@section('content')
@include('app::layouts.nav')
<div class="row">
   <div class="col-md-12">
      <div class="box box-primary">
         <div class="box-header with-border">
            <h5 class="box-title">{{$app['name']}}</h5>
         </div>
         <div class="box-body">
            <div class="col-md-3">
         <span><h5>App</h5></span>
         <hr>
         <div style="font-weight: 700;font-size:20px ;color: #3C8DBC">{{$app['name']}}</div>
   </div>
   <div class="col-md-3">
         <span><h5>Available Permissions</h5></span>
         <hr>
         <form method="post" action="{{url('/app/permission/add/'.$app['id'])}}">
         {!! csrf_field() !!}
         @foreach($permissions as $permission)
            <div style="background-color: #abd8d6;font-weight: 800; font-size: 16px; padding: 10px 10px;color:red;">
               {{$permission['name']}}
               <input type="checkbox" value="{{$permission['id']}}" name="check_list[]" class="pull-right">
            </div>
            
            <br/>
         @endforeach
         <hr>
            <button type="submit" class="btn btn-primary pull-right">Grant</button>
         </form>

   </div>
   <div class="col-md-3">
         <span><h5>Granted Permissions</h5></span>
         <hr>
         <form method="post" action="{{url('/app/permission/remove/'.$app['id'])}}">
         {!! csrf_field() !!}
         @foreach($grantedPermissions as $permission)
            <div style="background-color: #abd8d6;font-weight: 800; font-size: 16px; padding: 10px 10px;color:green;">
               {{$permission['name']}}
               <input type="checkbox" value="{{$permission['id']}}" name="check_list1[]" class="pull-right">
            </div>
            
            <br/>
         @endforeach
         <hr>
            <button type="submit" class="btn btn-primary pull-right">Remove</button>
         </form>
   </div>
         </div>
      </div>
   </div>
</div>

@stop