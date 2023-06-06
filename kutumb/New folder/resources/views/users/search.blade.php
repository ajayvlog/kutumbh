

<!doctype html>
<html lang="en">

<head>
    <title> Kutumbh </title>
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
    
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    
    <style type="text/css">
        .row:before, .row:after {
            display: none !important;
        }
      .tooltip {
  transform: translate(-50%, -200%);
  display: none;
  position: absolute;
  color: #F0B015;
  background-color: #000;
  border: none;
  border-radius: 4px;
  padding: 15px 10px;
  z-index: 10;
  display: block;
  width: 100%;
  max-width: 200px;
  top: 0;
  left: 50%;
  text-align: center;
}
.tooltip:after {
  content: "";
  display: block;
  position: absolute;
  border-color: #000000 rgba(0, 0, 0, 0);
  border-style: solid;
  border-width: 15px 15px 0;
  bottom: -13px;
  left: 50%;
  transform: translate(-50%, 0);
  width: 0;
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
            .head_bar{
                text-transform:none;
            }
        </style>
        <div class="container-fluid">
            <div class="toparea row">
                <div class="col-sm-3 leftsidebar  okfint">
                    <div class="sidebar_widget wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="logodiv wow fadeInLeft tooltipLink"  title='Kutumbh Logo' data-tooltip="You disgust me. Meh!" >
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('images/kutumbh-logo.png') }}" class="img-fluid "
                                     alt="logo" >

                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <div class="sidebar_cntnt wow fadeInLeft">
                            <div class="sidebar-top border border-muted shadow-lg p-3 mb-5 bg-white rounded">
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
                                    {{-- <div class="col-12 col-lg-5 col-sm-7 pt-lg-4 pl-lg-5 pt-3 pl-3 pb-3 shadow-lg  rounded"> --}}
                                        {{ $users->appends(Request::except('page'))->render() }}
                                        @foreach ($users->chunk(4) as $chunkedUser)
                                        <div class="row">
                                            @foreach ($chunkedUser as $user)
                                            {{-- <div class="col-md-12"> --}}
                                                <div class="panel panel-default shadow-lg p-3 mb-5  rounded">
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
                                    <div class="reglog-btns shadow-lg p-3 mb-5 bg-white rounded">
                                        <a class="logbtn" href="{{ route('profile') }}">{{ __('app.my_profile') }}</a>
                                        <a class="regbtn" href="#" onclick="event.preventDefault();document.querySelector('#logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @else
                                <div class='shadow-lg p-3 mb-5  rounded'>
                                    <h6 class="tooltipLink" data-tooltip="You disgust me. Meh!" >Sign Up</h6>
                                    <form role="form" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}
                                        <div class="form-row ">
                                            {{-- <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                                                <label for="inputNickname">{{ trans('user.nickname') }}</label>
                                                <input id="nickname" type="text" class="form-control" name="nickname"placeholder="Nickname" value="{{ old('nickname') }}" required autofocus>
                                                @if ($errors->has('nickname'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('nickname') }}</strong>
                                                    </span>
                                                @endif
                                            </div> --}}
                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="inputName">{{ trans('user.name') }}</label>
                                                <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required >
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
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 rightsection">
                    <div class="row td-fixed">
                        <div id="left" class="col-sm-12 col-md-6 col-xs-12 col-lg-6">
                            <div id="demo" class="carousel slide slidersec td-sticky" data-ride="carousel">
                                <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                                    {{-- <li data-target="#demo" data-slide-to="1"></li> --}}
                                </ul>
                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        {{-- <a href=""> --}}
                                            <img src="{{ asset('images/Kutumbh.png') }}"
                                                 class="img-fluid slider_img" alt="Slide Image">
                                        {{-- </a> --}}
                                    </div>
                                    {{-- <div class="carousel-item">

                                        <a href="https://www.thehindutoday.com/hi/uk-gn/feature/%E0%A4%AD%E0%A4%97%E0%A4%B5%E0%A4%BE%E0%A4%A8-%E0%A4%97%E0%A4%A3%E0%A5%87%E0%A4%B6-%E0%A4%95%E0%A5%80-%E0%A4%B8%E0%A5%82%E0%A4%82%E0%A4%A1-%E0%A4%95%E0%A5%87-%E0%A4%AC%E0%A4%BE%E0%A4%B0%E0%A5%87-%E0%A4%AE%E0%A5%87%E0%A4%82-%E0%A4%AF%E0%A4%B9-%E0%A4%9C%E0%A4%BE%E0%A4%A8%E0%A4%A8%E0%A4%BE-%E0%A4%B9%E0%A5%88-%E0%A4%9C%E0%A4%B0%E0%A5%82%E0%A4%B0%E0%A5%80">
                                            <img src="https://www.thehindutoday.com/uploads/slider/large/pehzh5j4rs-the-hindu-today.jpg"
                                                 class="img-fluid slider_img" alt="Slide Image">
                                        </a>
                                    </div> --}}
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
                        <div id="right" class="col-sm-12 col-md-6 col-xs-12 col-lg-6" >
                            <!--new design put here-->
                            <div class="graphic-div text-sm-center text-md-left">
                                <div class="row td-fixed">
                                    <div class="col-12">
                                        <div class="font_20 head_bar">
                                            <h4>Welcome to Kutumbh.co.uk</h4>
                                            <h6><small>Preserve and cherish your family history.</small></h6>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-12 text-center mt-3 mb-4">
                                        <div class="section-title text-center mb-5">
                                            <h2>Welcome to Kutumbh.co.uk </h2>
                                            <h6>Preserve and cherish your family history.</h6>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <h4> Its quick and easy to start… </h4>
                                        <p><small>It is really easy and quick to register your information with us. Get started on building your own family tree.</small></p>
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
                                        <h4> Safe and Secure </h4>
                                        <p><small> your family tree and sensitive information secure with us.</small></p>
                                    </div>
                                    <div class="col-2 text-center rope-icon-holder order-sm-2">
                                        <span class="rope-icon rounded-circle"> <i class="fas fa-leaf"></i></span>
                                        <div class="divider-graphic-tree"> </div>
                                    </div>
                                    <div class="col-md-5 mb-5 order-sm-1">
                                        <img class="img-fluid" src="images/graphic-family-tree2.png">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <h4>Traditions, Culture and History</h4>
                                        <p><small> Means more to be of Indian origin than just our ethnicity. Our traditions are our heritage. Wherever we live, we have weaved our culture into a new global identity. Preserve your history for the younger generation. </small></p>
                                    </div>
                                    <div class="col-2 text-center rope-icon-holder">
                                        <span class="rope-icon rounded-circle"> <i class="fas fa-file-alt"></i></span>
                                        <div class="divider-graphic-tree"> </div>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <img class="img-fluid" src="images/graphic-family-tree3.png">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5 mb-3 order-sm-12">
                                        <h4> Why choose Kutumbh? </h4>
                                        <p><small> The home of Hindu history for global audience. </small></p>
                                        <ul>
                                            <li style="color: black">We help people of Indian diaspora to preserve and let them share their ancestry with their loved ones.</li>
                                            <li style="color: black">It is for us to pass our traditions and family history to the younger generation. We help you to pass down your valuable family history from you to your loved ones.</li>
                                            <li style="color: black">To stay connected with your homeland and your community.</li>
                                            <li style="color: black">Save your important information like gotra, ancestral village, janampatri etc. in a place with easy access. </li>
                                            <li style="color: black">Reminders for important information like marriage dates, death anniversaries in your family.</li>
                                            <li style="color: black">Feel supported – we at kutumbh are always ready to help you with any of your queries. Just drop us a message and we will be there to help you.</li>
                                        </ul>
                                    </div>
                                    <div class="col-2 text-center rope-icon-holder order-sm-2">
                                        <span class="rope-icon rounded-circle"> <i class="fas fa-leaf"></i></span>
                                        <div class="divider-graphic-tree"> </div>
                                    </div>
                                    <div class="col-md-5 mb-5 order-sm-1">
                                        <img class="img-fluid" src="images/graphic-family-tree2.png">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        
                                    </div>
                                    <div class="col-2 text-center rope-icon-holder">
                                        <span class="rope-icon rounded-circle"> <i class="fas fa-file-alt"></i></span>
                                        <div class="divider-graphic-tree"> </div>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <img class="img-fluid" src="images/graphic-family-tree3.png">
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
                                            <ul>
                                                <li>
                                                    <a href="{!! url('/desclaimer'); !!}">Desclaimer</a>
                                                </li>
                                                <li>
                                                    <a href="{!! url('/privacypolicy'); !!}">Privacy Policy</a>
                                                </li>
                                                <li>
                                                    <a href="{!! url('/termsConditions'); !!}">Terms & Conditions</a>
                                                </li>
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
                                <p>© 2020 <a href="http://kutumbh.co.uk" >Kutumbh </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://www.thehindutoday.com/site/js/jquery.min.js"></script>
    
    
     <script type="text/javascript">
  	$('.tooltipLink').hover(function () {
     var title = $(this).attr('data-tooltip');
     $(this).data('tipText', title);
     if(title == ''){}
     else{
        $('<p class="tooltip"></p>').fadeIn(200).text(title).appendTo('body');
     }
 }, function () {
     $(this).attr('data-tooltip', $(this).data('tipText'));
     $('.tooltip').fadeOut(200);
 }).mousemove(function (e) {
     var mousex = e.pageX;
     var mousey = e.pageY;
     $('.tooltip').css({
         top: mousey,
         left: mousex
     })
 });
  </script>
  
  
    <script src="https://www.thehindutoday.com/site/js/popper.min.js"></script>
    <script src="https://www.thehindutoday.com/site/js/bootstrap.min.js"></script>
    <script src="https://www.thehindutoday.com/site/js/wow.min.js"></script>
    
    <script src="https://www.thehindutoday.com/site/js/custom.js?v=1604207885"></script>
    <style type="text/css">
        #flux {
            width: 200px;
            height: 150px;
            overflow: auto;
        }
    </style>
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
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d4150fa3d33218b"></script>  
   
  
</body>
</html>