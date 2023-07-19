@extends('layouts.master')
@section('title')
  Edit Profile-news programme
  {{ $title ?? '' }}{{ __('Edit Profile') }}
@stop

@section('css')
  <!-- Sidemenu-respoansive-tabs css -->
  <link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
    rel="stylesheet">
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
      <div class="d-flex">
        <h4 class="content-title mb-0 my-auto">Edit Profile</h4><span class="text-muted mt-1 tx-20 mr-2 mb-0"> /
          {{ Auth::user()->name }}
        </span>
      </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
      <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
      </div>
      <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
      </div>
      <div class="pr-1 mb-3 mb-xl-0">
        <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
      </div>

    </div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')

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
              <a class="btn btn-primary btn-sm" href="#">Back</a>
            </div>
          </div>
          <br>
          <form action="{{ route('updateUser') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <input type="hidden" class="form-control" name="id" value="{{ Auth::user()->id }}" required>

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

            <div class="form-group">
              <label for="exampleInputfile">News Image</label>
              <input type="file" name="image" value="" class="form-control" id="exampleInputfile">
              <br>

              @if (Auth::check() && isset(Auth::user()->image) && !is_null(Auth::user()->image->url))
                <img alt="user-img" class="avatar avatar-xl brround"
                  src="{{ asset('images/' . Auth::user()->image->url) }}">
              @else
                <img alt="" src="{{ asset('/images/download.jfif') }}">
              @endif
            </div>
            <br>
            <br>
            <div class="mg-t-30">
              <button class="btn btn-main-primary pd-x-20" type="submit">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br>
@endsection
@section('js')
@endsection
