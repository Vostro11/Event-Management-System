@extends('backend.layouts.app')
@section('title')
Clients edit
@endsection
@section('site_map')
Clients edit
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
        <form class="form-horizontal" action="{{url('client/update/'.$client['id'])}}" method="post">
    {{csrf_field()}}
    <div class="form-group{{ $errors->has('client_name') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="client_name">Name:</label>
        <div class="col-sm-8">
          <input type="text" name="client_name" value="{{$client['client_name']}}" class="form-control" id="client_name" placeholder="Enter client_name" required="">
          @if ($errors->has('client_name'))
              <span class="help-block">
                  <strong>{{ $errors->first('client_name') }}</strong>
              </span>
          @endif
        </div>
      </div>
      <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="mobile">Form mobile:</label>
        <div class="col-sm-8">
          <input type="number" name="mobile" value="{{$client['mobile']}}" class="form-control" id="mobile" placeholder="Enter mobile">
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
          <input type="text" name="address" value="{{$client['address']}}" class="form-control" id="address" placeholder="Enter address">
          @if ($errors->has('address'))
              <span class="help-block">
                  <strong>{{ $errors->first('address') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('expire_on') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="expire_on">Expire:</label>
        <div class="col-sm-8">
          <input type="date" name="expire_on" value="{{$client['expire_on']}}" class="form-control" id="expire_on" placeholder="Enter expire_on">
          @if ($errors->has('expire_on'))
              <span class="help-block">
                  <strong>{{ $errors->first('expire_on') }}</strong>
              </span>
          @endif
        </div>
      </div>
     
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </div>
    </form>
      </div>
    </div>
  </div>
</div>

@stop