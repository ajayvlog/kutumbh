<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/png" href="https://www.thehindutoday.com/site/images/favicon.png" />

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,400;0,600;0,800;0,900;1,300;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">  <!-- Bootstrap4 CSS -->
    <link rel="stylesheet" href="{{ asset('css/override.css') }}">  <!-- override CSS -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }} ">
    @yield('treeflex_css')

    <style>
    body{
        background-color:#fcfcfc;
       font-family: 'Montserrat';
    }
    
    
    .jpbox1{
      -webkit-box-shadow: -1px -4px 68px -61px rgba(0,0,0,0.71);
-moz-box-shadow: -1px -4px 68px -61px rgba(0,0,0,0.71);
box-shadow: -1px -4px 68px -61px rgba(0,0,0,0.71);

    }
    .jpbox2{
      -webkit-box-shadow: -1px -4px 69px -30px rgba(0,0,0,0.71);
-moz-box-shadow: -1px -4px 69px -30px rgba(0,0,0,0.71);
box-shadow: -1px -4px 69px -30px rgba(0,0,0,0.71);
    }
    
    
        .addLink {
            font-size: 38px;
            color: #333;
        }

            .addLink:hover {
                color: #ccc;
            }


        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #fff;
            background-color: #FF7F15 !important;
        }


        .add-custom-icon[aria-expanded="false"]:before {
            font-family: "Font Awesome 5 Free";
            content: "\f078";
            display: inline-block;
            padding-right: 3px;
            font-weight: 900;
        }


        .add-custom-icon[aria-expanded="true"]:before {
            font-family: "Font Awesome 5 Free";
            content: "\f077";
            display: inline-block;
            padding-right: 3px;
            font-weight: 900;
        }

        .half-line { height:2px;  background-color: #FF7F15; width: 100%; }

        .half-line.position {

        margin-top: 46px; 
        }


        @media (max-width: 576px) {
            
            .half-line.position {

        margin-top: 0px; 
        transform: rotateZ(90deg); margin-bottom: 20px;

        }


        .half-line { height:2px;  background-color: #FF7F15; width: 30px; margin: auto; }

/* code jp*/
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
</head>
@yield('ext_css')
    
<body> 




    @include('layouts.partials.nav')

    
     
    @yield('content')
     
   
    
    {{-- Success Alert --}}
    
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Error Alert --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    <!-- Footer -->
    <footer class="footer-home pt-4 mt-5">
        <a href="#top" class="gotop-btn text-center"><i class="fas fa-angle-up"></i> </a>

        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Company</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Home123</a>
                        </li>
                        <li>
                            <a href="#!">About</a>
                        </li>
                        <li>
                            <a href="#!">Blog</a>
                        </li>
                        <li>
                            <a href="#!">Contact Us</a>
                        </li>
                        <li>
                            <a href="#!">Careers</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-5 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Contact Us</h5>

                    <ul class="list-unstyled">
                        <li>
                            <i class="fas fa-map-marker-alt"></i> 2nd floor, Shiv Arcade, Delhi, India.
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i> + 91 7478120965
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i> info@thehindutoday.com
                        </li>
                    </ul>
                </div>

                <div class="col-md-3 mb-md-0 mb-3">
                   <h5 class="text-uppercase">Connect with Us</h5>
                   <ul class="list-unstyled">
                        <li>
                            <a href="#!"><i class="fab fa-facebook-f"></i> Facebook</a>
                        </li>
                        <li>
                            <a href="#!"><i class="fab fa-twitter"></i> Twitter</a>
                        </li>
                        <li>
                            <a href="#!"><i class="fab fa-youtube"></i> Youtube</a>
                        </li>
                        <li>
                            <a href="#!"><i class="fab fa-instagram"></i> Instagram</a>
                        </li>
                    </ul>
               </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-md-0 mb-3 copyright-home pb-2">
                    ©2020 Techsypher. All rights reserved.
                </div>
                <div class="col-md-6 mb-md-0 mb-3 copyright-home text-md-right">
                    <a href="#!"> Privacy Policy | </a>
                    <a href="#!">Terms and Conditions | </a>
                    <a href="#!">Sitemap</a>
                </div>

            </div>

        </div>

    </footer>
    <!-- Footer ends-->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
     <!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>-->
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
  
  <script src="{{ asset('js/plugins/select2.min.js') }}"></script>

  
    @yield('ext_js')
    @yield('script')
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>

    <script>
        //close the alert after 3 seconds.
        $(document).ready(function(){
	    setTimeout(function() {
	        $(".alert").alert('close');
	    }, 3000);
    	
    	
    	
    	
   

});

    </script>
    
    
</body>
</html>
