@extends('layouts.master55')
@section('title')
  Home-news programme
@endsection
@section('css')
  {{--  --}}
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="me left-content">
      <div>
        <h2 class="textWapper main-content-title tx-24 mg-b-1 mg-b-lg-1">
          INTERNATIONAL NEWS AGENCY
        </h2>
        <p class="mg-b-0">Trending News </p>
      </div>
    </div>
  </div>


  <div class="text-wrap">
    <div class="example">
      <figure class="pos-relative">
        <img alt="Responsive image" class="img-fit-cover" src="{{ URL::asset('assets/img/News-Banners.jpg') }}">
      </figure>
    </div>
  </div>



  <!-- /breadcrumb -->
@endsection
@section('content')
  <!-- row -->
  {{-- Cards For All Category Of News --}}
  <div class="row row-sm">
    @foreach ($category as $cate)
      <div class="col-xl-4 col-lg-4 col-md-12">
        <div class="card text-center">

          @if ($cate->image)
            <img src="{{ asset('images/' . $cate->image->url) }}" alt="Category Image">
          @else
            <p>No image available for this category.</p>
          @endif

          <div class="card-body">
            <h4 class="card-title mb-3">{{ $cate->cate_name }}</h4>
            <a class="btn btn-outline-info btn-rounded btn-block" href="{{ route($cate->cate_name) }}">Read More</a>
          </div>
        </div>
      </div>
    @endforeach
    <!-- row closed -->
    <!-- /row -->
  </div>
  </div>
  <!-- Container closed -->
@endsection
@section('js')
@endsection
