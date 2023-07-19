@extends('layouts.master')
@section('css')
  <!--Internal  Font Awesome -->
  <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!--Internal  treeview -->
  <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
  Add Roles-News
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
  <div class="my-auto">
    <div class="d-flex">
      <h4 class="content-title mb-0 my-auto">PERMISSION</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Add
        User Type</span>
    </div>
  </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>Error</strong>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif




{!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
<!-- row -->
<div class="row">
  <div class="col-md-12">
    <div class="card mg-b-20">
      <div class="card-body">
        <div class="main-content-label mg-b-5">
          <div class="col-xs-7 col-sm-7 col-md-7">
            <div class="form-group">
              <p> permission Name:</p>
              {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
          </div>
        </div>
        <div class="row">
          <!-- col -->
          <div class="col-lg-4">
            <ul id="treeview1">
              <li><a href="#">permission</a>
                <ul>
              </li>
              @foreach ($permission as $value)
                <label
                  style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                  {{ $value->name }}</label>
              @endforeach
              </li>

            </ul>
            </li>
            </ul>
          </div>
          <!-- /col -->
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-main-primary">Save</button>
          </div>

        </div>
      </div>
    </div>
  </div>

</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->

{!! Form::close() !!}
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
