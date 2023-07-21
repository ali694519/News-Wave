@extends('layouts.master')
@section('css')
  <!-- Internal Nice-select css  -->
  <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@endsection
@section('title')
  Edit User-News
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
      <div class="d-flex">
        <h4 class="content-title mb-0 my-auto">USERS</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit
          User</span>
      </div>
    </div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
  <!-- row -->
  <div class="row">
    <div class="col-lg-12 col-md-12">

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

      <div class="card">
        <div class="card-body">
          <div class="col-lg-12 margin-tb">
            <div class="pull-right">
              <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">Back</a>
            </div>
          </div>
          <br>


          <form action="{{ route('updateUsers') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <input type="hidden" class="form-control" name="id" value="{{ $user->id }}" required>

            <div class="">
              <div class="row mg-b-20">
                <div class="parsley-input col-md-6" id="fnWrapper">
                  <label>User Name<span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                </div>

                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                  <label> Email <span class="tx-danger">*</span></label>
                  <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                </div>
              </div>
            </div>

            <div class="row mg-b-20">
              <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                <label>Password <span class="tx-danger">*</span></label>
                <input id="password" type="password" class="form-control" name="password" required
                  autocomplete="current-password">
              </div>

              <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                <label> Confrim Password <span class="tx-danger">*</span></label>

                <input id="password" type="password" class="form-control" name="confirm-password" required
                  autocomplete="current-password">
              </div>
            </div>


            <div class="row row-sm mg-b-20">
              <div class="col-lg-6">
                <label class="form-label">User Status </label>
                <select name="status" id="select-beast" class="form-control  nice-select  custom-select">
                  <option value="{{ $user->status }}">{{ $user->status }}</option>
                  <option value="Enabled">Enabled</option>
                  <option value="Not enabled">Not enabled</option>
                </select>
              </div>
            </div>


            <br>
            <div class="form-group">
              <label for="exampleInputfile">News Image</label>
              <input type="file" name="image" value="" class="form-control" id="exampleInputfile">
            </div>
            <img
              src="{{ isset($user->image->url) ? asset('images/' . $user->image->url) : asset('/images/download.jfif') }}"
              style="width:70px;height:70px" alt="image">


            <br>
            <br>

            <div class="row mg-b-20">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>User Type </strong>
                  {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                </div>
              </div>
            </div>
            <div class="mg-t-30">
              <button class="btn btn-main-primary pd-x-20" type="submit">Update</button>
            </div>
          </form>
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
@endsection
@section('js')
  <!-- Internal Nice-select js-->
  <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>

  <!--Internal  Parsley.min js -->
  <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
  <!-- Internal Form-validation js -->
  <script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>
@endsection
