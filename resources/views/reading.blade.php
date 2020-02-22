@extends('layouts.pkvreading')

@section('title')
{{ $article->title }}
@endsection

@section('css')
<!-- Open Graph data -->
<meta property="og:title" content="{{$article->title}}" />
<meta property="og:type" content="education, science topics, research" />
<meta property="og:url" content="{{ URL::to('/').'/reading/'.$article->id }}" />
<meta property="og:image" content="{{ $article->cover_url }}" />

<link rel="stylesheet" href="{{ URL::asset('css/reading.css') }}">
@endsection

@section('main-content')

<div style="background-color:#ffffff;border-radius:20px">
<input type="text" value="{{ $article->id }}" style="display: none" id="article_id">
<div class="article-cover">
  <div class="article-cover__image">
    <img src="{{ $article->cover_url }}">
  </div>
  <div class="article-cover__mask">
  </div>

</div>

<div class="container-fluid mt-5" style="padding:15px">
  <div class="row">
    <div class="col-md-2 col-1">

    </div>
    <div class="col-md-8 col-10">
      <b><h1 class="article-title">
        {{ $article->title }}
      </h1></b>
      <h6 style="color:#757575;text-decoration:underline">{{ $article->created_at }} đăng bởi PokerKing VN</h6>
      <div class="article-type d-flex justify-content-center mt-4">
        <b><a href="#">
         {{ $article->subject->name }}
        </a></b>
      </div>
    <div style="padding:25px"></div>
      <div class="article-content mt-5">
        {!! $article->content !!}
      </div>
    </div>
    <div class="col-md-2 col-1">

    </div>
  </div>
</div>
<div class="w-100 d-flex justify-content-center mt-3 mb-3">
  @php
  $html = new \Html2Text\Html2Text($article->content);
  @endphp
</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ URL::asset('js/vendor/jquery.scrolline.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/reading.js') }}"></script>
@endsection