
@extends('backend.layouts.app')
@section('title')
Value Submitted for this Form
@endsection
@section('site_map')
Value Submitted for this Form
@endsection
@section('content')
@include('form::layouts.nav')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{$form['title']}}</h3>
      </div>
      <div class="box-body">
        <table class="table table-hover">
        <thead>
          <tr>
            @foreach($formFields as $formField)
            <th>{{$formField['name']}}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
        @foreach($formSubmissions as $formSubmission)
          <tr>
          @foreach($formFields as $formField)
            <?php $vlaue = '';
            $value = $formRepo->getValueByFieldIdAndSubmissionId($formField['id'],$formSubmission['id']); ?>
            <td> {{ $value }} </td>
          @endforeach
          
          </tr>
        @endforeach
        </tbody>
        
      </table>
      </div>
    </div>
  </div>
</div>


@stop