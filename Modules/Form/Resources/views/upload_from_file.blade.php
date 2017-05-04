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
        <form class="form-horizontal" action="{{url('form/store-from-file/'.$form['id'])}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
      <div class="form-group{{ $errors->has('myfile') ? ' has-error' : '' }}">
        <label class="control-label col-sm-4" for="myfile">Upload file:</label>
        <div class="col-sm-8">
        <input type="hidden" name="form_id" value="{{$form['id']}}">
          <input type="hidden" name="version" value="{{$form['version']}}">
          <input type="file" accept=".csv" name="myfile" value="{{old('myfile')}}" class="form-control" id="myfile" placeholder="Enter myfile" required="">
          @if ($errors->has('myfile'))
              <span class="help-block">
                  <strong>{{ $errors->first('myfile') }}</strong>
              </span>
          @endif
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