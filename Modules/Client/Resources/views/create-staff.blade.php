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
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">client</h3>
      </div>
      <div class="box-body">
        <form class="form-horizontal" action="{{url('client/staff')}}" method="post">
    {{csrf_field()}}
      
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="name">Name:</label>
        <div class="col-sm-8">
          <input type="hidden" name="client_id" value="{{$client_id}}"  >
          <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Enter name" required="">
          @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
        </div>
      </div>
      <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="mobile">Mobile:</label>
        <div class="col-sm-8">
          <input type="number" name="mobile" value="{{old('mobile')}}" class="form-control" id="mobile" placeholder="Enter mobile">
          @if ($errors->has('mobile'))
              <span class="help-block">
                  <strong>{{ $errors->first('mobile') }}</strong>
              </span>
          @endif

        </div>
      </div>

      <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="address">Address:</label>
        <div class="col-sm-8">
          <input type="text" name="address" value="{{old('address')}}" class="form-control" id="address" placeholder="Enter address">
          @if ($errors->has('address'))
              <span class="help-block">
                  <strong>{{ $errors->first('address') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('job_description') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="job_description">Job Description:</label>
        <div class="col-sm-8">
          <select name="job_description" class="form-control">
            <option value="Manager">Manager</option>
            <option value="Reception">Reception</option>
          </select>
        </div>
      </div>

      <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="status">Status:</label>
        <div class="col-sm-8">
          <select name="status" class="form-control">
            <option value="active">Active</option>
            <option value="inactive">InActive</option>
          </select>
        </div>
      </div>

      <div class="form-group" id="islogin">
        <label class="control-label col-sm-4" for="islogin">Is Staff Can Login:</label>
        <div class="col-sm-8">
          <div class="radio-inline">
            <label><input type="radio" name="islogin" checked="checked" value="1">Yes</label>
          </div>
          <div class="radio-inline">
            <label><input type="radio" name="islogin"  value="0">No</label>
          </div>
        </div>
      </div>

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="email">Email:</label>
        <div class="col-sm-8">
          <input type="text" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Enter email" >
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="password">Password:</label>
        <div class="col-sm-8">
        <input type="hidden" name="user_type" value="staff">
          <input type="text" name="password" value="{{old('password')}}" class="form-control" id="password" placeholder="Enter password" >

          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif

        </div>
      </div>
      
     
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">Create</button>
        </div>
      </div>
    </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("input:radio[name=islogin]").click(function() {
     
    var value = $(this).val();
    if(value==1){
      //alert('selected');
      $('#email').parent().parent().show();
      $('#password').parent().parent().show();
    }else{
      //alert('not selected');
      $('#email').parent().parent().hide();
      $('#password').parent().parent().hide();
    }
    //alert(value);
});
</script>
@stop