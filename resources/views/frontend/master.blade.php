<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/x-icon" href="{{ url('frontend') }}/assets/image/favicon.ico">
  @yield('header_css')
  <!-- Bootstrap CSS -->
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/meanmenu.min.css" media="all">
  <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/default.css'}}">
  <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/all.css">
  <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/fontawesome.min.css">
  <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/magnific-popup.css">
  <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/slick.css">
  <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/style.css">
  <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/mystyle.css">
  <link rel="stylesheet" href="{{ url('frontend') }}/assets/css/recponcive.css">

  <title>@yield('title')</title>
  <style>
    .main-menu-area .start-btn-area a.project-btn {
      padding: 10px 20px !important;
    }
  </style>
</head>
<?php

use App\Models\SiteInfo;

$siteinfo = SiteInfo::latest()->take(1)->get();
?>

<body>

  <!-- Main Menu Start -->
  <div class="main-menu-area">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-lg-2">
          <div class="logo-area">
            @foreach($siteinfo as $item)
            <a href="{{url('/')}}"><img src="{{asset('thumbnail/'.$item->site_logo)}}" alt="logo"></a>
            @endforeach
          </div>
        </div>
        <div class="col-lg-8">
          <div class="menu ">
            <ul>
              <li><a class="active" href="{{url('/')}}">Home</a></li>
              <li><a>Our Services</a>
                <ul>
                  @foreach($cat as $item)
                  <li><a href="{{url('service', $item->title)}}" value="{{$item->id}}">{{$item->title}}</a></li>
                  @endforeach
                </ul>
              </li>
              <li><a href="{{url('work')}}">Recent Work</a></li>
              <!--li><a href="{{url('testimonial')}}">Client Reviews</a></!--li-->
              <li><a href="{{url('blog')}}">Blog</a></li>
              <li><a href="{{url('pricing')}}">Pricing</a></li>
              <li><a href="{{url('contact')}}">Contact</a></li>
              <style>
                .main-menu-area .menu ul li a {
                  padding: 0 9px 0 !important;
                }

                .menu-li {
                  color: #ffffff !important;
                  font-size: 16px;
                  font-weight: 600;
                  padding: 0 12px 0 !important;
                  text-transform: capitalize;
                  background-color: transparent;
                  text-decoration: none;
                  -webkit-transition: all .5s;
                  transition: all .5s;
                }

                .main-menu-area .menu ul li {
                  float: left;
                }
              </style>

              <style>
                .join {
                  border-bottom: 2px solid #ffb545;
                  height: 32px;
                  left: 10px;
                }

                .startselling {
                  border: 2px solid #ffb545 !important;
                  padding: 8px 8px !important;
                }

                .profile-icon {
                  margin-left: 25px;
                  margin-top: -2px;
                  padding: 5px 6px;
                  color: #ffffff;
                  border-radius: 92px;
                  border: 2px solid #ffffff;
                }

                .profile-icon:hover {
                  color: #ffb545;
                  border: 2px solid #ffb545;
                }

                .profile-li li {
                  font-size: 21px;
                  padding: 8px 7px;
                  width: 250px;
                  color: #000000 !important;
                  font-size: 15px;
                  margin-left: 0;
                  font-weight: 700;
                  text-transform: capitalize;
                  background-color: transparent;
                  padding: 10px 20px !important;
                  display: inline-block;
                  transition: all .5s;
                }
              </style>
              <li class="join"><a href="{{url('register-to-sell')}}">Start Selling</a></li>

              <li class="sm">
                <i class="fa fa-user profile-icon" aria-hidden="true"></i>
                <ul class="profile-li">
                  @if (Route::has('login'))
                  @auth
                  @if(Auth::user()->type === 'ADMIN')
                  <li class="menu-li"><a href="{{url('/admin-dashboard')}}">Admin Dashboard</a></li>
                  @else
                  <li class="menu-li"><a href="{{url('/')}}">Dashboard</a></li>
                  @endif
                  @endif
                  @endif
                  <li><a href="{{url('login')}}">Login</a></li><br>
                  <li><a href="{{url('register')}}">Register</a></li><br>
                  @if (Route::has('login'))
                  @auth
                  <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                  <form action="{{route('logout')}}" method="POST" id="logout-form">
                    @csrf
                  </form>
                  @endif
                  @endif
                </ul>
              </li>

            </ul>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="start-btn-area">
            <a class="project-btn" href="{{url('start-project')}}">Start a Project</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Menu End -->

  @yield('content')

  <!-- Footer Area Start -->
  <footer class="footer-area ">
    <div class="container">
      <div class="footer-header">
        @foreach($siteinfo as $item)
        <a href="{{url('/')}}"><img src="{{asset('thumbnail/'.$item->site_logo)}}" alt="logo"></a>
        @endforeach
        <ul>
          <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
          <li><a href=""><i class="fab fa-twitter"></i></a></li>
          <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
          <li><a href=""><i class="fab fa-instagram"></i></a></li>
          <li><a href=""><i class="fab fa-youtube"></i></a></li>
        </ul>
      </div>
      <div class="footer-menu">
        <ul>
          <li><a href="">About</a></li>
          <li><a href="">FAQs</a></li>
          <li><a href="">Contact</a></li>
          <li><a href="">Terms of Service</a></li>
          <li><a href="">Privacy</a></li>
        </ul>
      </div>
      <div class="copyright">
        <p>Copyright © 2021.All Rights Reserved By <span>DSE</span></p>
      </div>
    </div>
  </footer>
  <!-- Footer Area End -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="{{ url('frontend') }}/assets/js/jquery.meanmenu.min.js"></script>
  <script type="text/javascript" src="{{ url('frontend') }}/assets/js/slick.js"></script>
  <script src="{{ url('frontend') }}/assets/js/wow.min.js"></script>
  <script src="{{ url('frontend') }}/assets/js/jquery.magnific-popup.js"></script>
  <script src="{{ url('frontend') }}/assets/js/main.js"></script>

  @yield('footer_js')

</body>

</html>