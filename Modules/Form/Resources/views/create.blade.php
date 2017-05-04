@extends('backend.layouts.app')
@section('title')
Form
@endsection
@section('site_map')
Form
@endsection
@section('content')
@include('form::layouts.nav')
 
<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form</h3>
      </div>
      <div class="box-body">
    @include('form::layouts.form_nav')
    <h3>Create Form Here</h3>
    <form class="form-horizontal" action="{{url('form/create')}}" method="post">
    {{csrf_field()}}
      
      <div class="form-group{{ $errors->has('client_id') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="client_id">For Client</label>
        <div class="col-sm-8">
          <select class="form-control" name="client_id">
            @foreach($clients as $client)
              <option value="{{$client['id']}}">{{$client['client_name']}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="title">Form Title:</label>
        <div class="col-sm-8">
          <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder="Enter title" required="">
          @if ($errors->has('title'))
              <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
          @endif
        </div>
      </div>
      <div class="form-group{{ $errors->has('slag') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="slag">Form Slag:</label>
        <div class="col-sm-8">
          <input type="text" name="slag" value="{{old('slag')}}" class="form-control" id="slag" placeholder="Enter slag" required="">
          @if ($errors->has('slag'))
              <span class="help-block">
                  <strong>{{ $errors->first('slag') }}</strong>
              </span>
          @endif
        </div>
      </div>
      <div class="form-group{{ $errors->has('submit_url') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="submit_url">Submit Url:</label>
        <div class="col-sm-8">
          <input type="text" name="submit_url" value="{{old('submit_url')}}" class="form-control" id="submit_url" placeholder="Enter submit_url" required="">
          <lable>for demo add this url given below http://beta.ems.socialaves.com/form/form-submit</lable>
          @if ($errors->has('submit_url'))
              <span class="help-block">
                  <strong>{{ $errors->first('submit_url') }}</strong>
              </span>
          @endif

        </div>
      </div>
      <div class="form-group{{ $errors->has('version') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="version">Form Version:</label>
        <div class="col-sm-8">
          <input type="number" name="version" value="{{old('version')}}" class="form-control" id="version" placeholder="Enter version">
          @if ($errors->has('version'))
              <span class="help-block">
                  <strong>{{ $errors->first('version') }}</strong>
              </span>
          @endif

        </div>
      </div>
      <div class="form-group{{ $errors->has('query_params') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="query_params">Form query_params:</label>
        <div class="col-sm-8">
          <input type="text" name="query_params" value="{{old('query_params')}}" class="form-control" id="query_params" placeholder="Enter query_params">
          @if ($errors->has('query_params'))
              <span class="help-block">
                  <strong>{{ $errors->first('query_params') }}</strong>
              </span>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="email">Email:</label>
        <div class="col-sm-8">
          <div class="radio-inline">
            <label><input type="radio" name="email" checked="checked" value="1">Yes</label>
          </div>
          <div class="radio-inline">
            <label><input type="radio" name="email" >No</label>
          </div>
        </div>
      </div>
      <div class="form-group{{ $errors->has('email_template_name') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="email_template_name">Email template name:</label>
        <div class="col-sm-8">
          <input type="text" name="email_template_name" value="{{old('email_template_name')}}" class="form-control" id="email_template_name" placeholder="Enter email_template_name" required="">
          @if ($errors->has('email_template_name'))
              <span class="help-block">
                  <strong>{{ $errors->first('email_template_name') }}</strong>
              </span>
          @endif
        </div>
      </div>
      <div class="form-group" id="responder">
        <label class="control-label col-sm-4" for="auto_responder">Form Auto responder:</label>
        <div class="col-sm-8">
          <div class="radio-inline">
            <label><input type="radio" name="auto_responder" value="1">Yes</label>
          </div>
          <div class="radio-inline">
            <label><input type="radio" name="auto_responder" checked="checked" value="0">No</label>
          </div>
        </div>
      </div>

      <div class="form-group" id="notification">
        <label class="control-label col-sm-4" for="notification">Notification:</label>
        <div class="col-sm-8">
          <div class="radio-inline">
            <label><input type="radio" name="notification" value="1">Yes</label>
          </div>
          <div class="radio-inline">
            <label><input type="radio" name="notification" checked="checked">No</label>
          </div>
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">Next</button>
        </div>
      </div>
    </form>
  
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("input:radio[name=email]").click(function() {
     
    var value = $(this).val();
    if(value==1){
      $('#responder').show();
      $('#notification').show();
    }else{
      $('#responder').hide();
      $('#notification').hide();
    }
    //alert(value);
});
</script>
@stop