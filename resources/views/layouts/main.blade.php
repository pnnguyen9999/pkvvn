<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="science, camping, event, research, education">
	  <meta name="description" content="Bóng Đèn là tổ chức khoa học dành cho học sinh cấp 2 với mục tiêu mang lại kiến thức khoa học theo cách thú vị và nhiều màu sắc hơn là những kiến thức khô khan trong sách giáo khoa. Còn đợi gì nữa mà không tham gia với tụi mình.">
    <title>@yield('title')</title>

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ URL::asset('sources/icon/apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('sources/icon/apple-touch-icon-114x114.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('sources/icon/apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('sources/icon/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{ URL::asset('sources/icon/apple-touch-icon-60x60.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ URL::asset('sources/icon/apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{ URL::asset('sources/icon/apple-touch-icon-76x76.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ URL::asset('sources/icon/apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ URL::asset('sources/icon/favicon-196x196.png') }}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ URL::asset('sources/icon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ URL::asset('sources/icon/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ URL::asset('sources/icon/favicon-16x16.png') }}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ URL::asset('sources/icon/favicon-128.png') }}" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ URL::asset('sources/icon/mstile-144x144.png') }}" />
    <meta name="msapplication-square70x70logo" content="{{ URL::asset('sources/icon/mstile-70x70.png') }}" />
    <meta name="msapplication-square150x150logo" content="{{ URL::asset('sources/icon/mstile-150x150.png') }}" />
    <meta name="msapplication-wide310x150logo" content="{{ URL::asset('sources/icon/mstile-310x150.png') }}" />
    <meta name="msapplication-square310x310logo" content="{{ URL::asset('sources/icon/mstile-310x310.png') }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/vendor/hamburgers.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/vendor/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/layouts/main.css') }}">
    @yield('css')

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143285274-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-143285274-1');
</script>

  </head>
  <body>
    <!-- NAVIGATION BAR-->
    <div class="page-wrapper">
      <!-- For mobile -->
      <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
          <div class="bd-name">
            <a href="/" style="text-decoration: none">BÓNG ĐÈN</a>
          </div>
          <div class="header-mobile-inner">
            <button type="button" class="hamburger hamburger--spring js-hamburger">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>

        <nav class="navbar-mobile">
          <ul class="navbar-mobile__list list-unstyled">
            <li>
              <a href="/">TRANG CHỦ</a>
            </li>
            <li>
              <a href="/about_us">CHÚNG MÌNH</a>
            </li>
            <li>
              <a href="/#" class="cm">VONFRAM LAB</a>
            </li>
            @if(Auth::check())
            <li>
              <a href="/user">DASHBOARD</a>
            </li>
            @else
            <li>
              <a href="/bongden_login">TÀI KHOẢN</a>
            </li>
            @endif
          </ul>
        </nav>
      </header>

      <!-- For desktop -->
      <aside class="d-none d-lg-block navbar-desktop">
        <nav class="navbar navbar-expand-sm">
          <ul class="navbar-nav" style="margin-left:20px;">
            <li class="nav-item">
              <a href="/" class="nav-link nav-btt">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a href="/about_us" class="nav-link nav-btt">Chúng mình</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link nav-btt cm">Vonfram Lab</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link nav-btt dev"><span class="badge badge-danger">Dev Mode</span></a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto" style="margin-right:20px">
            <li class="nav-item">
              <button type="button" class="nav-right-item" id="search-btn">
                <i class="fas fa-search"></i>
              </button>
            </li>
            <li class="nav-item">
              @if(Auth::check())
              <img src="{{ Auth::user()->avatar_path }}" id="user-avatar" data-usn="{{ Auth::user()->name }}">
              @else
              <button type="button" class="nav-right-item" onclick="window.location.href = '/bongden_login'">
                <i class="fas fa-sign-in-alt"></i>
              </button>
              @endif
            </li>
          </ul>
        </nav>
      </aside>

      <form id="search-field" method="POST" action="{{ route('search') }}" role="search">
        {{ csrf_field() }}
        <input type="text" id="search-field__content" name="query" placeholder="Tìm kiếm bài viết..." spellcheck="false"/>
        <button type="button" id="search-field-close-btn">
          <i class="fas fa-times"></i>
        </button>
        <button type="submit" name="submit" style="visibility: hidden"></button>
      </form>

      <div class="main-content">
        @yield('main-content')
      </div>

      <footer class="footer">
        <div class="container-fluid">
  			<div class="row">
  				<div class="col-md-10 col-12">
  					<div class="text-left footer-content">
  						<div class="row">
  							<div class="col-md-6 col-12">
                  <div class="info-container d-flex justify-content-around align-items-center flex-column">
                    <div>
    									<div class="f-title">THÔNG TIN</div>
    									<br>
    									<div class="sub-title">
                        <a href="/about_us" style="text-decoration: none; color: #8492a6;">
                          Về chúng mình
                        </a>
                      </div>
                      <br>
                      <div class="f-title">BÁO CÁO</div>
    									<br>
    									<div class="sub-title">
                        <a href="https://forms.gle/2DSQ7CsYSZd8VJ2e6" target="_blank" style="text-decoration: none; color: #8492a6;">
                          Báo cáo lỗi
                        </a>
                      </div>
    								</div>
                  </div>
  							</div>

  							<div class="col-md-6 col-12">
                  <div class="info-container d-flex justify-content-center align-items-center">
                    <div>
    									<div class="f-title">LIÊN HỆ</div>

    									<br>

    									<div class="sub-title">Phan Nguyễn Hạnh Nhi</div>
    									<div class="sub-title"><i class="far fa-envelope"></i> hanhnhi.phan@gmail.com</div>
    									<div class="sub-title"><i class="fas fa-phone"></i> 0944 099 126</div>

    									<br>

    									<div class="sub-title">Nguyễn Phong Hinh</div>
    									<div class="sub-title"><i class="far fa-envelope"></i> truonganparfum99@gmail.com</div>
    									<div class="sub-title"><i class="fas fa-phone"></i> 0123 230 7270</div>

    									<br>

    									<div class="sub-title"><i class="far fa-envelope"></i> bongden.camp@gmail.com</div>
    								</div>
                  </div>
  							</div>
  						</div>
  					</div>
  				</div>

  				<div class="col-md-2 col-12" id="contact-field" style="display: flex;justify-content: center;align-items: center">
  					<a class="contact-item" id="contact-fb" href="https://www.facebook.com/bongdencamp/" target="_blank"><i class="fab fa-facebook-f"></i></a>
  				</div>
  			</div>
  		</div>
      </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ URL::asset('js/vendor/sweetalert2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/layouts/main.js') }}"></script>
    @yield('js')
  </body>
</html>
