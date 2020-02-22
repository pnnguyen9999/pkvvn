@extends('userpage.userpage_layout')

@section('title')
{{ Auth::user()->name }}
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/userpage/user_notification.css') }}">
@endsection

@section('main-content')
<!-- Page Heading -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
    <li class="breadcrumb-item active" aria-current="page">Thông báo</li>
  </ol>
</nav>

<div class="notify-filter w-100 d-flex justify-content-center">
  <label for="unread" class="rad-lb">
    <input type="radio" name="nfilter" id="unread" class="rad-hidden">
    <span class="sp-lb"></span>Unread
  </label>
  <label for="read" class="rad-lb">
    <input type="radio" name="nfilter" id="read" class="rad-hidden">
    <span class="sp-lb"></span>Read
  </label>
</div>

<div class="notify-card w-100 shadow mb-2">
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ URL::asset('js/userpage/user_notification.js') }}"></script>
@endsection
