@extends('layouts.master')
@section('title')
  Home-news programme
@endsection
@section('css')
@endsection
@section('page-header')
  <!-- breadcrumb -->
  {{-- <div class="breadcrumb-header justify-content-between"> --}}
  <div class="breadcrumb-header">

    <!-- row -->
    <div class="row row-sm">


      @can('posts&Users')
        {{-- posts --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
          <div class="card overflow-hidden sales-card bg-primary-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
              <div class="">
                <h6 class="mb-3 tx-12 text-white">Posts</h6>
              </div>
              <div class="pb-0 mt-0">
                <div class="d-flex">
                  <div class="">
                    <h6 class="tx-20 font-weight-bold mb-1 text-white">
                      The total number of registered news

                    </h6>
                    <p class="mb-0 tx-12 text-white op-7">
                      Posts Count
                      {{ \App\Models\post::count() }}
                    </p>
                  </div>
                  <span class="float-right my-auto mr-auto">
                    <i class="fas fa-arrow-circle-up text-white"></i>
                  </span>
                </div>
              </div>
            </div>
            <span id="compositeline" class="pt-1">
              <canvas width="253"height="30"
                style="display: inline-block; width: 253.5px; height: 30px; vertical-align: top;"></canvas>
            </span>
          </div>
        </div>

        {{-- Users --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
          <div class="card overflow-hidden sales-card bg-danger-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
              <div class="">
                <h6 class="mb-3 tx-12 text-white"> Users</h6>
              </div>
              <div class="pb-0 mt-0">
                <div class="d-flex">
                  <div class="">
                    <h6 class="tx-20 font-weight-bold mb-1 text-white">
                      The total number of registered Users

                    </h6>
                    <p class="mb-0 tx-12 text-white op-7">
                      Users Count
                      {{ \App\Models\User::count() }}
                    </p>
                  </div>
                  <span class="float-right my-auto mr-auto">
                    <i class="fas fa-arrow-circle-up text-white"></i>


                  </span>
                </div>
              </div>
            </div>
            <span id="compositeline2" class="pt-1">
              <canvas width="253" height="30"
                style="display: inline-block; width: 253.5px; height: 30px; vertical-align: top;"></canvas>
            </span>
          </div>
        </div>
      @endcan

      <h3 class="main-content-title">
        <div class="news-container">
          <div class="news-content">

            <span class="news-item">
              INTERNATIONAL NEWS AGENCY
            </span>

          </div>
          </h2>
          <p class="mg-b-0">Trending News </p>



        </div>
        <!-- row closed -->


    </div>



    <!-- /breadcrumb -->
  @endsection
  @section('content')
    <!-- row -->
    <div class="row row-sm">

      {{-- Get All About News --}}
      @foreach ($news as $ne)
        @if ($ne->status === 'publish')
          <div class="col-xl-4 col-md-4">
            <div class="card custom-card">
              <img class="card-img-top" style="width:400;height:200px"
                src="{{ null !== $ne->image->url ? asset('images/' . $ne->image->url) : asset('/images/1.jpg') }}"
                alt="">
              <div class="card-body">
                <h2 class="card-title">{{ $ne->title }}</h2>
                <h6>{{ $ne->category['cate_name'] }}</h6>
                <p class="card-text">
                  @php
                    $words = str_word_count($ne->content, 1);
                    $first20Words = implode(' ', array_slice($words, 0, 20));
                  @endphp
                  {{ $first20Words }}.......
                  <a class="btn  btn-rounded btn-block text-primary" href="{{ route('showNews', $ne->id) }}">Read
                    More</a>
                </p>
                <form method="POST" action="{{ route('add_comment') }}">
                  {{ csrf_field() }}

                  <div class="form-group">
                    <label for="body">Write Something</label>
                    <input type="hidden" name="id" value="{{ $ne->id }}">
                    <textarea name="body" id="body" required placeholder="add comment" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                  </div>
                </form>


                {{-- Save --}}
                <div class="d-flex justify-content-end">
                  <a class="modal-effect btn btn-sm btn-success" data-toggle="modal" href="#Saves{{ $ne->id }}"
                    title="Save">
                    <i class="las la-save"></i> Save
                  </a>
                </div>

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

                  {{-- facebook --}}
                  <a href="https://www.facebook.com/">
                    <svg class="ooo" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                      fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                      <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                  </a>

                  {{-- Twitter --}}
                  <a href="https://twitter.com/">
                    <svg class="ooo" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                      fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                      <path
                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg>
                  </a>

                </div>
                <span class="eee">
                  {{ $ne->date_to_publish }}
                </span>




                <!-- Save -->
                <div class="modal" id="Saves{{ $ne->id }}">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                      <div class="modal-header">
                        <h6 class="modal-title">Save News</h6><button aria-label="Close" class="close"
                          data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <form action="{{ route('Saved_Records') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                          <p> Are you sure about the save process?</p><br>
                          <input type="hidden" name="id" value="{{ $ne->id }}">

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                    </form>
                  </div>
                </div>
                <!-- Save -->

              </div>
            </div>
          </div>
        @endif
      @endforeach

    </div>
    <!-- row closed -->


    <!-- /row -->
  </div>
  </div>
  <!-- Container closed -->
@endsection
@section('js')
@endsection
