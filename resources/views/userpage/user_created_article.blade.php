@extends('userpage.userpage_layout')

@section('title')
{{ Auth::user()->name }}
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/userpage/created_article.css') }}">
@endsection

@section('main-content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Bài viết</a></li>
    <li class="breadcrumb-item active" aria-current="page">Bài viết của tôi</li>
  </ol>
</nav>

<table class="table w-100 table-responsive" style="display:block;overflow:auto;max-height:450px">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên bài viết</th>
      <th scope="col"></th>
      <th scope="col">Thể loại</th>
      <th scope="col">Trạng thái</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $key=>$article)
    <tr>
      <th scope="row">{{ $key }}</th>
      <th>
        <a href="#animatedModal" class="open-article-preview" data-article-id=" {{ $article->id }} ">
          {{ $article->title }}
        </a>
      </th>
      <th>
        <img src="{{ $article->cover_url }}" class="article-preview-cover">
      </th>
      <th>{{ $article->subject->name }}</th>
      @if($article->getState->state == "upload")
      <th style="color: #fdcb6e">Đợi phê duyệt</th>
      @elseif($article->getState->state == "save")
      <th>Bản nháp</th>
      @elseif($article->getState->state == "delete")
      <th style="color: #e74c3c">
        <button type="button" class="btn btn-danger admin-deleted-btn" data-article-id="{{ $article->id }}">Đã xóa (Admin)</button>
      </th>
      @else
      <th style="color: #2ecc71">Đã đăng</th>
      @endif

      @if($article->getState->state != "uploaded")
      <th>
        <button type="button" class="btn btn-outline-danger delete-article-btn" data-article-id="{{ $article->id }}">Xóa</button>
      </th>
      @endif

      <th>
        <button type="button" class="btn btn-outline-success update-article-btn" onclick="window.location.href = '/user/article/view_ar/{{ $article->id }}'">Sửa</button>
      </th>
    </tr>
    @endforeach
  </tbody>
</table>


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
          <img id="article-cover__image" src="http://batterupbeauty.com/wp-content/uploads/illustration-wallpaper-hd-art-4k-wallpapers-for-desktop-and-mobile-art-wallpaper.jpg">
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
<script type="text/javascript" src="{{ URL::asset('js/userpage/created_article.js') }}"></script>
@endsection
