@extends('layouts.master')
@section('title')
  show-news programme
@stop
@section('css')
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
      <div class="d-flex">
        <h4 class="content-title mb-0 my-auto">Show</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
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
    <div class="col-xl-12 col-md-4">
      <div class="card custom-card">
        <img class="card-img-top" style="width:400;height:400" src="{{ asset('images/' . $news->image->url) }}"
          alt="">
        <div class="card-body">
          <h4 class="card-title">{{ $news->title }}</h4>
          <h6>{{ $news->category['cate_name'] }}</h6>
          <p class="card-text">
            {{ $news->content }}
          </p>
          <span>
            @foreach ($news->tags as $tag)
              <span class="tag tag-blue">{{ $tag['tag_name'] }}</span>
            @endforeach
          </span>
          <br>
          <br>
          <style>
            .comment-label {
              font-weight: bold;
              margin-bottom: 10px;
            }

            .comment {
              display: block;
              margin-bottom: 10px;
              background-color: #f5f5f5;
              padding: 5px;
            }
          </style>

          <label class="comment-label">The comment</label>
          <span>
            @foreach ($news->comments as $comm)
              <span class="comment">{{ $comm->body }}</span>
            @endforeach
          </span>


          <style>
            .ooo {
              margin-right: 10px;
            }

            .eee {
              display: flex;
              justify-content: flex-end;
            }
          </style>

          <div class="card-footer bd-t tx-left">

            <span>
              <svg class="ooo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
              </svg>
              The news was published by: <span class="" style="font-size: 20px;">
                @php
                  $userName = $news->user->name;

                @endphp
                {{ $userName }}
              </span>
            </span>
            <br>
            <br>
            {{-- facebook --}}
            <a href="www.facebook.com">
              <svg class="ooo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-facebook" viewBox="0 0 16 16">
                <path
                  d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
              </svg>
            </a>

            {{-- Twitter --}}
            <a href="https://twitter.com/">
              <svg class="ooo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-twitter" viewBox="0 0 16 16">
                <path
                  d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
              </svg>
            </a>
          </div>
          <br>
          <span class="eee">
            {{ $news->date_to_publish }}
          </span>
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
@endsection
