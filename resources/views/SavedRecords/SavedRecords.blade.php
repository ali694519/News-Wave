@extends('layouts.master55')
@section('css')
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
      <div class="d-flex">
        <h4 class="content-title mb-0 my-auto">Saved Records</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">

        </span>
      </div>
    </div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
  <!-- row -->
  <div class="row">
    @foreach ($posts as $sa)
      <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <div class="card">
          <img class="card-img-top" style="width:400;height:200px" src="{{ asset('images/' . $sa->image->url) }}">
          <div class="card-body">
            <p class="card-text">
              @php
                $words = str_word_count($sa->content, 1);
                $first20Words = implode(' ', array_slice($words, 0, 20));
              @endphp
              {{ $first20Words }}
            </p>
          </div>
          <span>
            @foreach ($sa->tags as $item)
              <span class="tag tag-blue">{{ $item['tag_name'] }}</span>
            @endforeach
          </span>
          <div class="card-footer bd-t tx-left">
            Share <i class="icon ion-logo-facebook mg-l-5 mg-r-5"></i>
            <i class="icon ion-logo-twitter"></i>
          </div>
          <span>
            {{ date('d-m-Y ', strtotime($sa->date_to_publish)) }}
          </span>
          {{-- Delete --}}
          <a class=" btn btn-sm btn-danger" data-toggle="modal" href="#modaldemo{{ $sa->id }}" title="delete">
            <i class="las la-trash">
            </i>
          </a>
        </div>


        <!-- delete -->
        <div class="modal" id="modaldemo{{ $sa->id }}">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
              <div class="modal-header">
                <h6 class="modal-title">Delete News</h6><button aria-label="Close" class="close" data-dismiss="modal"
                  type="button"><span aria-hidden="true">&times;</span></button>
              </div>
              <form action="{{ route('deleteSave') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                  <p> Are you sure about the deletion process?</p><br>
                  <input type="hidden" name="id" value="{{ $sa->id }}">
                  <input class="form-control" value="{{ $sa->title }}" name="cate_name"type="text" readonly>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger">Save</button>
                </div>
            </div>
            </form>
          </div>
        </div>
        <!-- delete -->

      </div>
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
