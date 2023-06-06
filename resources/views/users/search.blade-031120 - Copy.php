

<!doctype html>
<html lang="en">

<head>
    <title> मुख्य पेज  | द हिन्दू टुडे</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content=" ">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="https://www.thehindutoday.com/site/images/favicon.png" />
    <link rel="stylesheet" href="{{ asset('css/override.css') }}">  <!-- override CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://www.thehindutoday.com/site/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.thehindutoday.com/site/css/style.css?v=1604207885">
    <link rel="stylesheet" href="https://www.thehindutoday.com/site/css/animate.css">
    <link rel="stylesheet" href="https://www.thehindutoday.com/site/css/custom.css?v=1604207885">
    <link rel="stylesheet" href="https://www.thehindutoday.com/vendor/font-awesome/css/font-awesome.min.css?v=1604207885">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://www.thehindutoday.com/plugins/scroller/style/jquery.jscrollpane.css?v=1604207885">
    <style type="text/css">
        .row:before, .row:after {
            display: none !important;
        }
    </style>
    <script>
        (function () {
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = 'https://app.termly.io/embed.min.js';
            s.id = '9b0c0669-38f9-47d4-a1b0-e5b923e885e6';
            s.setAttribute("data-name", "termly-embed-banner");
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        })();
    </script>
</head>

<body>
    <div class="wrapper">

        <style type="text/css">
            #left {
                position: sticky;
                top: 0%;
                height: 100vh;
            }
            .reglog-btns a {
                float: right;
            }
            .reglog-btns button{    
                color: #fff;
                height: 2.9em;
                width: 48%;
                border: none;
            }
        </style>
        <div class="container-fluid">
            <div class="toparea row">
                <div class="col-sm-3 leftsidebar  okfint">
                    <div class="sidebar_widget wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="logodiv wow fadeInLeft">
                            <a href="https://www.thehindutoday.com/hi/uk-gn">
                                <img src="https://www.thehindutoday.com/uploads/logo/hindu-today-hi.png" class="img-fluid"
                                     alt="logo">

                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <div class="sidebar_cntnt wow fadeInLeft">
                            <div class="sidebar-top">
                                <h6 class="heading-medium">{{ trans('app.search_your_family') }}</h6>
                                @if (request('q'))
                                    <span>
                                        <small>{!! trans('app.user_found', ['total' => $users->total(), 'keyword' => request('q')]) !!}</small>
                                    </span>
                                @endif
                                
                                {{ Form::open(['method' => 'get','class' => '']) }}
                                {{-- <div class="input-group"> --}}
                                    {{-- <div class="input-group-prepend"> --}}
                                        {{ Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => trans('app.search_your_family_placeholder'), 'aria-label'=> trans('app.search_your_family_placeholder')]) }}
                                    {{-- </div> --}}
                                    <div class="reglog-btns">
                                        {{ link_to_route('users.search', 'Reset', [], ['class' => 'logbtn']) }}
                                        {{ Form::button('Search', ['type' =>'submit','class' => 'logbtn'] )  }} 
                                    </div>                                                                              
                                </div>
                                {{ Form::close() }}
                                @if (request('q'))
                                    <br>
                                    {{-- <div class="col-12 col-lg-5 col-sm-7 pt-lg-4 pl-lg-5 pt-3 pl-3 pb-3"> --}}
                                        {{ $users->appends(Request::except('page'))->render() }}
                                        @foreach ($users->chunk(4) as $chunkedUser)
                                        <div class="row">
                                            @foreach ($chunkedUser as $user)
                                            {{-- <div class="col-md-12"> --}}
                                                <div class="panel panel-default">
                                                    <div class="panel-heading text-center">
                                                        {{ userPhoto($user, ['style' => 'width:100%;max-width:60px']) }}
                                                        
                                                        @if ($user->age)
                                                            {!! $user->age_string !!}
                                                        @endif
                                                    </div>
                                                    <div class="panel-body">
                                                        <h3 class="panel-title">{{ $user->profileLink() }} ({{ $user->gender }})</h3>
                                                        <div>{{ trans('user.nickname') }} : <b>{{ $user->nickname }}</b></div>
                                                        <hr style="margin: 5px 0;">
                                                        <div>{{ trans('user.father') }} : <b>{{ $user->father_id ? $user->father->name : '' }} </b></div>
                                                        <div>{{ trans('user.mother') }} : <b>{{ $user->mother_id ? $user->mother->name : '' }} </b></div>
                                                    </div>
                                                    <div class="panel-footer">
                                                        {{ link_to_route('users.show', trans('app.show_profile'), [$user->id], ['class' => 'btn btn-default', 'style'=>'border: 2px solid; margin-left: 2em;']) }}
                                                        {{-- {{ link_to_route('users.chart', trans('app.show_family_chart'), [$user->id], ['class' => 'btn btn-default btn-xs']) }} --}}
                                                    </div>
                                                </div>
                                            {{-- </div> --}}
                                            @endforeach
                                        </div>
                                        @endforeach
                                        {{ $users->appends(Request::except('page'))->render() }}
                                    {{-- </div> --}}
                                @endif
                                <hr>
                                @if (Auth::guard('web')->check())
                                    <div class="reglog-btns">
                                        <a class="logbtn" href="{{ route('profile') }}">{{ __('app.my_profile') }}</a>
                                        <a class="regbtn" href="#" onclick="event.preventDefault();document.querySelector('#logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @else
                                    <h6>Sign Up</h6>
                                    <form role="form" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}
                                        <div class="form-row">
                                            <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                                                <label for="inputNickname">{{ trans('user.nickname') }}</label>
                                                <input id="nickname" type="text" class="form-control" name="nickname"placeholder="Nickname" value="{{ old('nickname') }}" required autofocus>
                                                @if ($errors->has('nickname'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('nickname') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="inputName">{{ trans('user.name') }}</label>
                                                <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email">{{ trans('user.email') }}</label>
                                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('gender_id') ? ' has-error' : '' }}">
                                                <label for="gender_id">{{ trans('user.gender') }}</label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender_id" id="inlineRadio1" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender_id" id="inlineRadio2" value="2">
                                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                                </div>
                                            </div>                            
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password">{{ trans('auth.password') }}</label>
                                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="password-confirm">{{ trans('auth.password_confirmation') }}</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                            </div>                            
                                        </div>
                                        <div class="reglog-btns">
                                            <button type="submit" class="regbtn">Register</button>
                                            <a class="logbtn" href="{{ route('login') }}">Login</a>
                                        </div>                                    
                                    </form>
                                @endif
                            </div>
                            {{-- <div class="sidebarmenus">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul>

                                        <li>
                                            <a href="https://www.thehindutoday.com/hi/uk-gn">
                                                मुख्य पेज<i class="fa fa-arrow-right"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="https://www.thehindutoday.com/hi/uk-gn/magazine">
                                                पत्रिका<i class="fa fa-arrow-right"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="https://www.thehindutoday.com/hi/uk-gn/people">
                                                व्यक्तित्व<i class="fa fa-arrow-right"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="https://www.thehindutoday.com/hi/uk-gn/feature">
                                                फीचर<i class="fa fa-arrow-right"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="https://www.thehindutoday.com/hi/uk-gn/news">
                                                समाचार<i class="fa fa-arrow-right"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="https://www.thehindutoday.com/hi/uk-gn/video">
                                                वीडियो<i class="fa fa-arrow-right"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="https://www.thehindutoday.com/hi/uk-gn/photo">
                                                फोटो गैलरी<i class="fa fa-arrow-right"></i>
                                            </a>
                                        </li>



                                        <li>
                                            <a href="https://www.thehindutoday.com/hi/uk-gn/blog">
                                                ब्लॉग<i class="fa fa-arrow-right"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="https://www.thehindutoday.com/hi/uk-gn/connect">
                                                हमसे जुड़ें<i class="fa fa-arrow-right"></i>
                                            </a>
                                        </li>



                                        <li>
                                            <a href="https://www.thehindutoday.com/hi/uk-gn/advertise">
                                                विज्ञापन दें <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="https://www.thehindutoday.com/hi/uk-gn/team">
                                                हमारी टीम <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </li>



                                    </ul>
                                </div>
                                <div class="sbs">
                                    <a href="https://www.thehindutoday.com/hi/uk-gn/subscribe" class="sbs-btn">सदस्यता लें</a>
                                </div>

                                <div class="reglog-btns">
                                    <a href="https://www.thehindutoday.com/hi/uk-gn/plan?type=support"
                                       class="regbtn">Support</a>
                                    <a href="https://www.thehindutoday.com/hi/uk-gn/plan?type=patron"
                                       class="logbtn">Patron</a>

                                </div>
                            </div> --}}


                        </div>
                    </div>
                </div>
                <div class="col-sm-9 rightsection">

                    <div class="row">
                        <div id="left" class="col-sm-12 col-md-3 col-xs-12 col-lg-3 td-fixed ">

                            <div id="demo" class="carousel slide slidersec td-sticky" data-ride="carousel">

                                <!-- Indicators -->
                                <ul class="carousel-indicators">



                                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo" data-slide-to="1"></li>



                                </ul>

                                <!-- The slideshow -->
                                <div class="carousel-inner">


                                    <div class="carousel-item active">

                                        <a href="">
                                            <img src="https://www.thehindutoday.com/uploads/slider/large/jdzuengwew-the-hindu-today.jpg"
                                                 class="img-fluid slider_img" alt="Slide Image">
                                        </a>
                                    </div>
                                    <div class="carousel-item">

                                        <a href="https://www.thehindutoday.com/hi/uk-gn/feature/%E0%A4%AD%E0%A4%97%E0%A4%B5%E0%A4%BE%E0%A4%A8-%E0%A4%97%E0%A4%A3%E0%A5%87%E0%A4%B6-%E0%A4%95%E0%A5%80-%E0%A4%B8%E0%A5%82%E0%A4%82%E0%A4%A1-%E0%A4%95%E0%A5%87-%E0%A4%AC%E0%A4%BE%E0%A4%B0%E0%A5%87-%E0%A4%AE%E0%A5%87%E0%A4%82-%E0%A4%AF%E0%A4%B9-%E0%A4%9C%E0%A4%BE%E0%A4%A8%E0%A4%A8%E0%A4%BE-%E0%A4%B9%E0%A5%88-%E0%A4%9C%E0%A4%B0%E0%A5%82%E0%A4%B0%E0%A5%80">
                                            <img src="https://www.thehindutoday.com/uploads/slider/large/pehzh5j4rs-the-hindu-today.jpg"
                                                 class="img-fluid slider_img" alt="Slide Image">
                                        </a>
                                    </div>

                                </div>
                                <div class="navbtn">
                                    <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev">
                                        <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#demo" role="button" data-slide="next">
                                        <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>




                        </div>
                        <div id="left" class="col-sm-12 col-md-3 col-xs-12 col-lg-3  ">
                            <div class="font_20 margin_bottom_10 head_bar">
        <h2>व्यक्तित्व</h2>
    </div>
    
    <div class="video_list_wrapper">
        <div id="Photos" class="carousel slide slidersec" data-ride="carousel">
            <ul class="carousel-indicators">
                                        <li data-target="#Photos" data-slide-to="0" class="active"></li>
                                                    <li data-target="#Photos" data-slide-to="1" class=""></li>
                                    </ul>
    
            <div class="carousel-inner">
                                        <div class="carousel-item active">
                    <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/people/स्वामी-पुरुषोत्तम-प्रियदास-जी-महाराज"><img src="http://thehindutoday.positivemeerut.org/uploads/people/small6464a5dd-d7e1-4947-8534-62f4622e4e04.jpg" alt="" width="100%" class="margin_bottom_10"></a>
                </div>
                                                    <div class="carousel-item">
                    <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/people/साध्वी-ऋतम्भरा"><img src="http://thehindutoday.positivemeerut.org/uploads/people/smallcxrzpklhog-.jpg" alt="" width="100%" class="margin_bottom_10"></a>
                </div>
                                    </div>
            
             <div class="navbtn">
                             <a class="carousel-control-prev" href="#Photos" role="button" data-slide="prev">
                               <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#Photos" role="button" data-slide="next">
                            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
    
        </div>
    </div>
                            <div class="font_20 margin_top_10 margin_bottom_10 head_bar">
        <h2>फीचर</h2>
    </div>
    
    <div class="video_list_wrapper">
        <ul class="video_list">
                            <li class="profile_list_item">
                
                <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/feature/हम-क्यों-करते-हैं-प्रदक्षिणा"><img src="http://thehindutoday.positivemeerut.org/uploads/story/smallg8uts68vtc-.jpg" alt="" width="100%" class="home-img"></a>
                       
                           <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/feature/हम-क्यों-करते-हैं-प्रदक्षिणा"> <p class="font_roboto profile_name text-black">हम क्यों करते हैं प्रदक्षिणा</p>
                <p class="font_roboto heading text-grey"> अ गर हमें कोई गोला खींचना हो तो उसका केंद्र बिंदु...</p></a>
            </li>
                    <li class="profile_list_item">
                
                <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/feature/क्या-है-शरद-पूर्णिमा-का-विज्ञान"><img src="http://thehindutoday.positivemeerut.org/uploads/story/smalljasznwmmi8-.jpg" alt="" width="100%" class="home-img"></a>
                       
                           <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/feature/क्या-है-शरद-पूर्णिमा-का-विज्ञान"> <p class="font_roboto profile_name text-black">क्या है शरद पूर्णिमा का विज्ञान</p>
                <p class="font_roboto heading text-grey">
      द  शहरा के चार दिन बाद जब चांद पूरा होता है तो...</p></a>
            </li>
                    <li class="profile_list_item">
                
                <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/feature/क्यों-लगाते-हैं-हम-भगवान-को-भोग"><img src="http://thehindutoday.positivemeerut.org/uploads/story/smallascg7tfpfr-l.jpg" alt="" width="100%" class="home-img"></a>
                       
                           <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/feature/क्यों-लगाते-हैं-हम-भगवान-को-भोग"> <p class="font_roboto profile_name text-black">क्यों लगाते हैं हम भगवान को भोग</p>
                <p class="font_roboto heading text-grey">
      ह  म हर विशेष पूजा में और हर रोज़ की पूजा में...</p></a>
            </li>
                        </ul>
    </div>
    
    
                            <div class="font_20 margin_top_10 margin_bottom_10 head_bar">
            <h2>वीडियो</h2>
        </div>
    
    <div class="video_list_wrapper">
        <div id="Videos" class="carousel slide slidersec" data-ride="carousel">
            <ul class="carousel-indicators">
                                                    <li data-target="#Videos" data-slide-to="0" class="active"></li>
                                        </ul>
            <div class="carousel-inner">
                                                    <div class="carousel-item active">
                            <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/video/the-hindu-today-concept">
    
                                                                <video width="100%" height="500" poster="http://thehindutoday.positivemeerut.org/site/images/hindu-today-video.png">
                                        <source src="http://thehindutoday.positivemeerut.org/uploads/video/f3ef0sxokk-the-hindu-today-concept.mp4" type="video/mp4">
                                        <source src="http://thehindutoday.positivemeerut.org/uploads/video/f3ef0sxokk-the-hindu-today-concept.mp4" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
    
                                
                            </a>
                        </div>
                                        </div>
        </div>
    </div>
                            <div class="font_20 margin_top_10 margin_bottom_10 head_bar">
            <h2 class="margin_0">समाचार</h2>
        </div>
    
    <div class="video_list_wrapper">
        <ul class="video_list">
                                        <li class="profile_list_item">
                        
    
                            
                            <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/news/संयुक्त-अरब-अमीरात-के-पहले-हिन्दू-मंदिर-का-निर्माण-शुरू"><img src="http://thehindutoday.positivemeerut.org/uploads/news/smallg23ydctfab-ab-a-l.jpg" alt="" width="100%" class="home-img"></a>
                                            
                                       
                                            <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/news/संयुक्त-अरब-अमीरात-के-पहले-हिन्दू-मंदिर-का-निर्माण-शुरू"> <p class="font_roboto profile_name text-black">संयुक्त अरब अमीरात के पहले हिन्दू मंदिर का निर्माण शुरू</p>
                        
                         <p class="font_roboto heading text-grey">आबू धाबी में पहले हिन्दू मंदिर के शिलान्यास के दो...</p></a>
                    </li>
                                <li class="profile_list_item">
                        
    
                            
                            <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/news/‘एकता-के-लिए-होली’-का-संदेश-देंगे-अमेरिका-के-ये-50-हिन्दू-छात्र"><img src="http://thehindutoday.positivemeerut.org/uploads/news/small6xvyetzmks-e-le-l-a-50.jpg" alt="" width="100%" class="home-img"></a>
                                            
                                       
                                            <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/news/‘एकता-के-लिए-होली’-का-संदेश-देंगे-अमेरिका-के-ये-50-हिन्दू-छात्र"> <p class="font_roboto profile_name text-black">‘एकता के लिए होली’ का संदेश देंगे अमेरिका के ये 50 हिन्दू छात्र</p>
                        
                         <p class="font_roboto heading text-grey">अमेरिका के 50 से ज्यादा हिन्दू संगठनों और छात्रों...</p></a>
                    </li>
                                <li class="profile_list_item">
                        
    
                            
                            <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/news/आबू-धाबी-इस-हिन्दू-मंदिर-में-नहीं-होगा-स्टील-और-लोहे-का-इस्तेमाल"><img src="http://thehindutoday.positivemeerut.org/uploads/news/smallnqvfz2l1nr-aab-b-i-l-l-il.jpg" alt="" width="100%" class="home-img"></a>
                                            
                                       
                                            <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/news/आबू-धाबी-इस-हिन्दू-मंदिर-में-नहीं-होगा-स्टील-और-लोहे-का-इस्तेमाल"> <p class="font_roboto profile_name text-black">आबू धाबी: इस हिन्दू मंदिर में नहीं होगा स्टील और लोहे का इस्तेमाल</p>
                        
                         <p class="font_roboto heading text-grey">मंदिर बनाने से जुड़ी संस्था का कहना है कि इस मंदिर...</p></a>
                    </li>
                            </ul>
    </div>                        <div class="font_20 margin_top_10 margin_bottom_10 head_bar">
            <h2>फोटो गैलरी </h2>
        </div>
    
    <div class="video_list_wrapper">
            <div id="Photos1" class="carousel slide slidersec" data-ride="carousel">
                    <ul class="carousel-indicators">
                                                                            <li data-target="#Photos1" data-slide-to="0" class=""></li>
                                                                                                    <li data-target="#Photos1" data-slide-to="1" class=""></li>
                                                                                                    <li data-target="#Photos1" data-slide-to="2" class="active"></li>
                                                                                                    <li data-target="#Photos1" data-slide-to="3" class=""></li>
                                                                </ul>
                    <div class="carousel-inner">
                                                                                        <div class="carousel-item">
                                            <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/photo/कुंभ-स्नान"><img src="http://thehindutoday.positivemeerut.org/uploads/photo/smallxyx2r4njtg-.jpg" alt="" width="100%" class="margin_bottom_10"></a>
                                    </div>
                                                                                                                    <div class="carousel-item">
                                            <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/photo/कुम्भ-मेला"><img src="http://thehindutoday.positivemeerut.org/uploads/photo/smallttkhdylmy3-l.jpg" alt="" width="100%" class="margin_bottom_10"></a>
                                    </div>
                                                                                                                    <div class="carousel-item active">
                                            <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/photo/कुम्भ-मेला-2"><img src="http://thehindutoday.positivemeerut.org/uploads/photo/smallipyfxr2lyd-l-2.jpg" alt="" width="100%" class="margin_bottom_10"></a>
                                    </div>
                                                                                                                    <div class="carousel-item">
                                            <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/photo/शाही-स्नान-महाकुंभ-2010-हरिद्वार"><img src="http://thehindutoday.positivemeerut.org/uploads/photo/small7am8ok1oev-2010.jpg" alt="" width="100%" class="margin_bottom_10"></a>
                                    </div>
                                                                        </div>
    
                    <div class="navbtn">
                             <a class="carousel-control-prev" href="#Photos1" role="button" data-slide="prev">
                               <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#Photos1" role="button" data-slide="next">
                            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                            </a>
                    </div>
            </div>
    </div>
                            <div class="font_20 margin_top_10 margin_bottom_10 head_bar">
        <h2>ब्लॉग</h2>
    </div>
    <div class="video_list_wrapper">
        <ul class="video_list" style="width: 100%">
                            <li class="profile_list_item">
                
                
                        <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/blog/दिव्य-प्रेम-की-मिसाल-हैं-श्रीकृष्ण"><img src="http://thehindutoday.positivemeerut.org/uploads/blog/smallful9kwjchx-l.jpg" alt="" width="100%" class="home-img"></a> 
                     
                            <a href="http://thehindutoday.positivemeerut.org/hi/uk-gn/blog/दिव्य-प्रेम-की-मिसाल-हैं-श्रीकृष्ण"><p class="font_roboto profile_name text-black">दिव्य प्रेम की मिसाल हैं श्रीकृष्ण</p>
                <p class="font_roboto heading text-grey"> श्री
    
    कृष्ण का जीवन, जैसा कि हरिवंश और विष्णु प...</p></a>
            </li>
                        </ul>
    </div>
    
        
                            <div class="td-test">
                            
                            </div>
                        </div>
                        <div id="right" class="col-sm-12 col-md-6 col-xs-12 col-lg-6" >
                            <!--new design put here-->
                            <div class="graphic-div text-sm-center text-md-left">
                                <div class="row td-fixed">

                                    <div class="col-12">
                                        <div class="font_20 head_bar">
                                            <h3>
                                                HOW DOES IT ALL WORK?
                                            </h3>
                                        </div>

                                    </div>
                                </div>
                                <!--<div class="row">
                                    <div class="col-12 text-center mt-3 mb-4">
                                        <div class="section-title text-center mb-5">
                                            <h2>How does it all work? </h2>
                                        </div>
                                    </div>
                                </div>-->

                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <h3> Start making your family tree </h3>
                                        <p>
                                            Lorem Ipsum has been the industry's standard dummy text ever
                                            since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen booktext.

                                        </p>

                                    </div>

                                    <div class="col-2 text-center rope-icon-holder">
                                        <span class="rope-icon rounded-circle"> <i class="fas fa-search"></i></span>
                                        <div class="divider-graphic-tree"> </div>

                                    </div>

                                    <div class="col-md-5 mb-5">
                                        <img class="img-fluid" src="images/graphic-family-tree.png">
                                    </div>

                                </div>

                                <div class="row">


                                    <div class="col-md-5 mb-3 order-sm-12">
                                        <h3> Look for the leaf </h3>
                                        <p>
                                             Lorem Ipsum has been the industry's standard dummy text ever
                                            since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen booktext.

                                    </div>

                                    <div class="col-2 text-center rope-icon-holder order-sm-2">
                                        <span class="rope-icon rounded-circle"> <i class="fas fa-leaf"></i></span>
                                        <div class="divider-graphic-tree"> </div>

                                    </div>
                                    <div class="col-md-5 mb-5 order-sm-1">
                                        <img class="img-fluid" src="images/graphic-family-tree2.png">
                                    </div>

                                </div>


                                
                            </div>







                            <!--new design put here ends-->

                        </div>

                    </div>
                    <footer class="mainfooter" style="bottom:0;">
                        <div class="container-fluid">
                            <div class="footercontentdiv">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="footercontent">
                                            <h2>कंपनी</h2>
                                            <ul>
                                                <li>
                                                    <a href="https://www.thehindutoday.com/hi/uk-gn/about-us">हमारे बारे में</a>
                                                </li>
                                                <li>
                                                    <a href="https://www.thehindutoday.com/hi/uk-gn/advertise">विज्ञापन देना</a>
                                                </li>
                                                <li>
                                                    <a href="https://www.thehindutoday.com/hi/uk-gn/subscribe">सदस्यता लें</a>
                                                </li>
                                                <li>
                                                    <a href="https://www.thehindutoday.com/hi/uk-gn/media-kit">मीडिया किट</a>
                                                </li>
                                                <li>
                                                    <a href="https://www.thehindutoday.com/hi/uk-gn/franchise">फ्रेंचाईजी</a>
                                                </li>
                                                <li>
                                                    <a href="https://www.thehindutoday.com/hi/uk-gn/contact-us">हमसे संपर्क करें</a>
                                                </li>
                                                <li>
                                                    <a href="https://www.thehindutoday.com/hi/uk-gn/support-center">समर्थन केंद्र</a>
                                                </li>
                                                <li>
                                                    <a href="https://www.thehindutoday.com/hi/uk-gn/site-map">साइटमैप</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="footercontent">
                                            <h2>नीतियाँ</h2>
                                            <ul>
                                                <li>
                                                    <a href="https://www.thehindutoday.com/hi/uk-gn/terms-and-conditions">नियम एवं शर्तें</a>
                                                </li>
                                                <li>
                                                    <a href="https://www.thehindutoday.com/hi/uk-gn/privacy-policy">गोपनीयता नीति</a>
                                                </li>
                                                <li>
                                                    <a href="https://www.thehindutoday.com/hi/uk-gn/work-with-us">हमारे साथ कार्य करें</a>
                                                </li>
                                                <li>
                                                    <a href="https://www.thehindutoday.com/hi/uk-gn/disclaimer">अस्वीकरण</a>
                                                </li>
                                                <li>
                                                    <a href="https://www.thehindutoday.com/hi/uk-gn/editorial-guidelines">संपादकीय दिशानिर्देश</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="footercontent socialmedia">
                                            <h2 style="float: none;display: inline;">हमसे का पालन करें</h2>

                                            <ul class="footer_socialmedia">
                                                <li><a href="https://www.facebook.com/TheHinduToday/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="https://www.twitter.com/thehindutoday" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="https://www.youtube.com/channel/UCxK9lY2e0Js7nIyPeosQhTw" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                                <li><a href="https://www.instagram.com/TheHinduToday" target="_blank"><i class="fa fa-instagram"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </footer>
                    <div class="copyright">
                        <div class="container-fluid">
                            <div class="copyrightcontent">
                                <p>© 2019 द हिन्दू टुडे. सर्वाधिकार सुरक्षित </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="promotion" class="modal fade">


            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="lft-sct"><img src="https://www.thehindutoday.com/site/images/popup/lft.jpg"></div>
                        <div class="rgt-sct">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="hd-txt">Patron</h3>
                            <p class="p-txt">
                                Investing for the betterment of future generations. Supporting the Hindu Today with a patronage means you are shaping and safeguarding
                                the independence and giving us the time required to provide you with the premium content. Becoming a patron with the Hindu Today has several benefits.
                            </p>
                            <a href="https://www.thehindutoday.com/hi/uk-gn/plan?type=patron"><button type="button" class="know" data-dismiss="modal">Know More</button></a>
                            <hr class="line desktop"></hr>
                            <h3 class="hd-txt desktop">Support</h3>
                            <p class="p-txt desktop">
                                The Hindu Today is an open and independent Hindu online platform and a magazine. Your support helps the Hindu Today to deliver quality
                                content in a timely manner for everyone in the world. Every contribution, however big or small, is so valuable for our work to demystify
                                the wonderful way of life that is Sanatan Dharma.
                            </p>
                            <a href="https://www.thehindutoday.com/hi/uk-gn/plan?type=support" class="desktop"><button type="button" class="know" data-dismiss="modal">Know More</button></a>
                        </div>
                    </div>
                    <hr class="line phone"></hr>
                    <h3 class="hd-txt phone">Support</h3>
                    <p class="p-txt phone">
                        The Hindu Today is an open and independent Hindu online platform and a magazine. Your support helps the Hindu Today to deliver quality
                        content in a timely manner for everyone in the world. Every contribution, however big or small, is so valuable for our work to demystify
                        the wonderful way of life that is Sanatan Dharma.
                    </p>
                    <a href="https://www.thehindutoday.com/hi/uk-gn/plan?type=support" class="phone-btn"><button type="button" class="know" data-dismiss="modal">Know More</button></a>
                </div>
            </div>
        </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://www.thehindutoday.com/site/js/jquery.min.js"></script>
    <script src="https://www.thehindutoday.com/site/js/popper.min.js"></script>
    <script src="https://www.thehindutoday.com/site/js/bootstrap.min.js"></script>
    <script src="https://www.thehindutoday.com/site/js/wow.min.js"></script>
    <script>
        const languageUrl = "https://www.thehindutoday.com/getLanguage";
        const newsletterUrl = "https://www.thehindutoday.com/newsletter/add";
        const selectedLanguage = "hi";
    </script>
    <script src="https://www.thehindutoday.com/site/js/custom.js?v=1604207885"></script>
    <style type="text/css">
        #flux {
            width: 200px;
            height: 150px;
            overflow: auto;
        }
    </style>
    <script>

        $(document).ready(function () {
            getLanguage();
            displayDate();
            displayTime();
        });

        function displayDate() {
            var date = new Date();
            var VSdate = new Date();
            VSdate.setFullYear(date.getFullYear() + 56, date.getMonth() + 8, date.getDate() + 15);
            var day = new Array("रविवार", "सोमवार", "मंगलवार", "बुधवार", "गुरुवार", "शुक्रवार", "शनिवार");
            var month = new Array("जनवरी", "फ़रवरी", "मार्च", "अप्रैल", "मई", "जून", "जुलाई", "अगस्त", "सितंबर", "अक्टूबर", "site.month.november", "दिसंबर");
            var VSmonth = new Array("वैशाख", "ज्येष्ठ", "आषाढ़", "श्रावण", "भाद्रपक्ष", "आश्विन", "कार्तिक", "अगहन", "पौष", "माघ", "फाल्गुन", "चैत्र");
            $("#dateSpan").text(day[date.getDay()] + ', ' + month[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear());
            $("#panchangSpan").text("[ " + VSmonth[VSdate.getMonth()] + ' ' + VSdate.getDate() + ', ' + VSdate.getFullYear() + " विक्रम संवत ]");
        }

        function displayTime() {
            var time = new Date();
            $("#timeSpan").text(time.getHours() + ':' + time.getMinutes() + ':' + time.getSeconds());
            if (time.getHours() == '0' && time.getMinutes() == '0' && time.getSeconds() == '1') displayDate();
            setTimeout("displayTime()", 1000);
        }


        $("#country_picker").change(function () {
            changeUrl();
        });

        $("#lang_picker").change(function () {
            changeUrl();
        });

        $("#category_picker").change(function () {
            changeUrl();
        });


    </script>


    <script src="https://www.thehindutoday.com/plugins/scroller/script/jquery.jscrollpane.js"></script>
    <script src="https://www.thehindutoday.com/plugins/scroller/script/jquery.mousewheel.js"></script>
    <script type="text/javascript">
        $(function () {
            var pane = $('.scroll-pane');
            pane.jScrollPane(
                {
                    showArrows: true,
                    animateScroll: true,
                    arrowScrollOnHover: false,
                    hijackInternalLinks: true,
                    mouseWheelSpeed: 500
                }
            );
            var api = pane.data('jsp');

            $('#scroll-to').on(
                'click',
                function () {

                    api.scrollTo(parseInt(220), parseInt(220));
                    return false;
                }
            );
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#promotion").modal('show');
        });
    </script>

    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d4150fa3d33218b"></script>
    
</body>

</html>