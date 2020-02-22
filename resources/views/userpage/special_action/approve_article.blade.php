@extends('userpage.userpage_layout')

@section('title')
{{ Auth::user()->name }}
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/userpage/special_action/approve_article.css') }}">
@endsection

@section('main-content')
<div style="width: 100%; overflow: visible">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tên bài viết</th>
        <th scope="col"></th>
        <th scope="col">Thể loại</th>
        <th scope="col">Người viết</th>
        <th scope="col" style="width: 15%"></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($articles as $key=>$state)
      <tr>
        <th scope="row">{{ $key }}</th>
        <th>
          <a href="#animatedModal" class="open-article-preview" data-article-id=" {{ $state->article->id }} ">
            {{ $state->article->title }}
          </a>
        </th>
        <th>
          <img src="{{ $state->article->cover_url }}" class="article-preview-cover">
        </th>
        <th>{{ $state->article->subject->name }}</th>
        <th>{{ $state->article->user->name }}</th>
        <th>
          <button type="button" class="btn btn-danger delete-article-btn" data-article-id="{{ $state->article->id }}">Xóa</button>
          <button type="button" class="btn btn-success approve-article-btn" data-article-id="{{ $state->article->id }}">Duyệt</button>
        </th>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


@if(sizeof($articles) > 0)
<div id="animatedModal">
  <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID  class="close-animatedModal" -->
  <button class="close-animatedModal">
    <i class="fas fa-times"></i>
  </button>

  <div class="modal-content">
    <div class="lds-grid" id="loading"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    <div>
      <div class="article-cover-container" style="display: none">
        <div class="article-cover">
          <img id="article-cover__image" src="">
        </div>
        <div class="article-lowerside d-none d-lg-block">

        </div>
      </div>
    </div>

    <div class="container-fluid article-main-content" style="display: none">
      <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8">
          <div id="article-title">

          </div>
          <div class="article-type d-flex justify-content-center mt-4">
            <a href="#" id="article-type-link"></a>
          </div>
          <div id="article-content" class="mt-5">

          </div>
        </div>
        <div class="col-2">

        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection

@section('js')
<script type="text/javascript" src="{{ URL::asset('js/userpage/special_action/approve_article.js') }}"></script>
@endsection
