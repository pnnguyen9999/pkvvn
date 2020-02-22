@extends('userpage.userpage_layout')

@section('title')
{{ Auth::user()->name }}
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ URL::asset('css/userpage/profile.css') }}">
@endsection

@section('main-content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
    <li class="breadcrumb-item active" aria-current="page">Hồ sơ</li>
  </ol>
</nav>

<div class="card mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
      {{ Auth::user()->name }}
    </h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
        <div class="avatar d-flex justify-content-center align-items-center flex-column">
          <div class="user-avatar-d" id="user-avatar" style="background-image: url('{{ Auth::user()->avatar_path }}')">
          </div>
          <button type="button" id="update-avatar-btn" class="btn btn-outline-primary mt-2">Đổi ảnh đại diện</button>
        </div>
      </div>
      <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
        <div class="common-info d-flex justify-content-center align-items-start flex-column">
          <h2 class="font-weight-bold" style="color: black;">{{ Auth::user()->name }}</h2>
          <h4>{{ Auth::user()->email }}</h4>
        </div>

        <form action="{{ route('update_profile') }}" method="post">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="user-name">Họ Tên</label>
            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" id="user-name" placeholder="Enter name">
          </div>

          <div class="form-group">
            <label for="user-email">Email</label>
            <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" id="user-email" placeholder="Enter email" readonly>
          </div>

          <div class="form-group">
            <label for="user-birthyear">Năm sinh</label>
            <select class="form-control" name="yearOfbirth" id="user-birthyear" data-year="{{ Auth::user()->yearOfbirth }}" data-dropup-auto="false">
            </select>
          </div>

          <div class="form-group">
            <label for="user-gender">Giới tính</label>
            <select class="form-control" name="sex" id="user-gender">
              @if(Auth::user()->sex == "male")
              <option value="male" selected>Nam</option>
              <option value="famale">Nữ</option>
              @else
              <option value="male">Nam</option>
              <option value="famale" selected>Nữ</option>
              @endif
            </select>
          </div>

          <div class="form-group">
            <label for="user-phone">Số điện thoại</label>
            <input type="text" name="phone_number" value="{{ Auth::user()->phone_number }}" id="user-phone"  placeholder="Enter phone number" class="form-control">
          </div>

          <div class="w-100 d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-success">Cập nhật</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ URL::asset('js/vendor/cleave.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/vendor/cleave-phone.vn.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/userpage/profile.js') }}"></script>
@endsection
