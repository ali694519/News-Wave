@extends('layouts.master')
@section('title')
  Search-news programme
@stop
@section('css')
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
      <div class="d-flex">
        <h4 class="content-title mb-0 my-auto">Search</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
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
  <!-- row -->
  <div class="row">
    @if (count($posts) > 0)
      @foreach ($posts as $res)
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card card-primary">
            <img class="card-img-top" style="width:400;height:400" src="{{ $res->image->url }}" alt="">

            <div class="card-header pb-0">
              <h5 class="card-title mb-0 pb-0">{{ $res->title }}</h5>
            </div>
            <div class="card-body text-primary">
              {{ $res->content }}
            </div>
            <div class="card-footer">
              {{ $res->date_to_publish }}
            </div>
          </div>
        </div>
      @endforeach
    @endif

  </div>
  <!-- row closed -->
  </div>
  <!-- Container closed -->
  </div>
  <!-- main-content closed -->
@endsection
@section('js')
@endsection
