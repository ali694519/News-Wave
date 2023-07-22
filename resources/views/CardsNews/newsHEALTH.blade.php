@extends('layouts.master55')
@section('css')
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
      <div class="d-flex">
        <h4 class="content-title mb-0 my-auto">Health</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">

        </span>
      </div>
    </div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
  <!-- row -->
  <div class="row">
    @foreach ($category->posts as $cat)
      @if ($cat->status === 'publish')

      <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <div class="card">
         <img class="card-img-top" style="width:400;height:200px" src="{{ asset('images/' . $cat->image->url) }}">
          <div class="card-body">
            <p class="card-text">
              @php

                $words = str_word_count($cat['content'], 1);

                $first20Words = implode(' ', array_slice($words, 0, 20));

              @endphp

              {{ $first20Words }}
            </p>
          </div>
        
          <a class="btn btn-outline-info btn-rounded btn-block" href="{{ route('showNews', $cat->id) }}">Read More</a>
          <br>

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
            <svg class="ooo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              class="bi bi-share-fill" viewBox="0 0 16 16">
              <path
                d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z" />
            </svg> Share
            <svg class="ooo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              class="bi bi-facebook" viewBox="0 0 16 16">
              <path
                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
            </svg>
            <svg class="ooo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              class="bi bi-twitter" viewBox="0 0 16 16">
              <path
                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
            </svg>
          </div>
          <span class="eee">
            {{ $cat->created_at }}
          </span>
        </div>
      </div>
      @endif
    @endforeach
  </div>
  <!-- row closed -->
  </div>
  <!-- Container closed -->
  </div>
  <!-- main-content closed -->
@endsection
@section('js')
@endsection
