@extends('backend.layouts.app')
@section('title')
Clients Permission
@endsection
@section('site_map')
Clients Permission
@endsection
@section('content')
@include('client::layouts.nav')
<div class="row">
   <div class="col-md-12">
      <div class="box box-primary">
         <div class="box-header with-border">
            <h3 class="box-title">client</h3>
         </div>
         <div class="box-body">
            <div class="col-md-3">
         <span><h5>{{$client['client_name']}}</h5></span>
         <hr>
         <div style="font-weight: 700;font-size:20px ;color: #3C8DBC">{{$client['name']}}</div>
   </div>
   <div class="col-md-3">
         <span><h5>Available Permissions</h5></span>
         <hr>
         <form method="post" action="{{url('/client/permission/add/'.$client['id'])}}">
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
         <form method="post" action="{{url('/client/permission/remove/'.$client['id'])}}">
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