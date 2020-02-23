@extends('layouts.app')

@section('content')
<div style="background-color:#ffffff;border-radius:20px;margin:15px;margin-top:150px;">

<div class="container-fluid mt-5" style="padding:15px">
  <div class="row">
    <div class="col-md-2 col-1">

    </div>
    <div class="col-md-8 col-10">
      <b><h1 class="article-title" style="color:black">
        Xin chào {{ Auth::user()->name }} !
      </h1></b>
      <div class="article-type d-flex mt-4">
        <h3><a href="#" style="color:brown">
         Tài khoản này cần được cấp quyền quản trị viên !
        </a></h3>
      </div>
    <div style="padding:15px"></div>
      <div class="article-content mt-5">
       <b><p>Vui lòng liên hệ quản trị web để được cấp quyền truy cập</p></b>
      </div>
    </div>

    <div class="col-md-2 col-1">

    </div>
  </div>
</div>
</div>
</div>
@endsection
