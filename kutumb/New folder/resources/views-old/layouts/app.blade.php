<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,400;0,600;0,800;0,900;1,300;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">  <!-- Bootstrap4 CSS -->
    <link rel="stylesheet" href="{{ asset('css/override.css') }}">  <!-- override CSS -->
    @yield('treeflex_css')
</head>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('ext_css')
    <style>
    .page-header {
        margin-top: 0px;
    }
    </style> -->
<body>
    <!-- <div id="app"> -->
        @include('layouts.partials.nav')

        <!-- <div class="container"> -->
        @yield('content')
        <!-- </div> -->
    <!-- </div> -->

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script>
    @yield('ext_js')
    @yield('script')
    <script>
        var header = $('h2.page-header').contents();
        str = '';
        mainText = header.filter(function () {
                // return type of text
                return this.nodeType === 3;
            })[0];
        str += mainText.data.trim();

        if (mainText.nextSibling) {
            // next siblings should be a small tag text
            str += " - "+mainText.nextSibling.innerText;
        }
        $('title').prepend(str+" - ");
    </script> -->

<!-- Footer -->
    <footer class="footer-home pt-4 mt-5">
        <a href="#top" class="gotop-btn text-center"><i class="fas fa-angle-up"></i> </a>

        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Company</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Home</a>
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
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
