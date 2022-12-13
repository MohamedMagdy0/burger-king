
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name') }} | @yield('page_title')</title>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{{ asset('assets/client/css/flaticon.css') }}" />

        <!-- Animate -->
        <link rel="stylesheet" href="{{ asset('assets/client/css/animate.css') }}">
        <!-- Bootsnav -->
        <link rel="stylesheet" href="{{ asset('assets/client/css/bootsnav.css') }}">
        <!-- Color style -->
        <link rel="stylesheet" href="{{ asset('assets/client/css/color.css') }}">

        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="{{ asset('assets/client/css/custom.css') }}" />

        <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}" />
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body data-spy="scroll" data-target="#navbar-menu" data-offset="100">

        <!-- Preloader -->
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>
                    <div class="object" id="object_five"></div>
                    <div class="object" id="object_six"></div>
                    <div class="object" id="object_seven"></div>
                    <div class="object" id="object_eight"></div>
                    <div class="object" id="object_big"></div>
                </div>
            </div>
        </div>
        <!--End Preloader -->
        <!-- Navbar -->
        <nav class="navbar navbar-default bootsnav no-background navbar-fixed black">
            <div class="container">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('burgers.products') }}"><img src="{{ asset('assets/client/images/logo.png') }}" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->
            </div>

            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <div class="widget">
                    <h4 class="title">Our Menu</h4>
                    <ul class="link">
                        <li style="margin-bottom: 5px;"><a href="{{ route('burgers.products') }}">ALL</a></li>
                        <li style="margin-bottom: 5px;"><a href="{{ route('burgers.burgers_menu', ['category'=> 'burgers']) }}">Burgers</a></li>
                        <li style="margin-bottom: 5px;"><a href="{{ route('burgers.burgers_menu', ['category'=> 'chicken']) }}">Chicken Sandwishes</a></li>
                        <li style="margin-bottom: 5px;"><a href="{{ route('burgers.burgers_menu', ['category'=> 'breakfast']) }}">Breakfast</a></li>
                        <li style="margin-bottom: 25px;"><a href="{{ route('burgers.burgers_menu', ['category'=> 'beverages']) }}">Beverages</a></li>

                        @if (auth()->check())
                        <li style="margin-bottom: 5px;"><a href="{{ route('burgers.cart')}}">Your Cart</a></li>
                        <li style="margin-bottom: 5px;"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                        <li style="margin-bottom: 25px;"><a href="{{ route('profile.show')}}">Profile</a></li>
                        @endif

                        <li style="margin-bottom: 5px;"><a href="{{ route('register')}}">Register</a></li>
                        <li style="margin-bottom: 5px;"><a href="{{ route('login')}}">Login</a></li>
                        <li style="margin-bottom: 5px;"><a href="{{ route('logout')}}">Logout</a></li>

                    </ul>
                </div>
            </div><!-- End Side Menu -->
        </nav>

        <!-- Header -->
        <header id="hello">
            <!-- Container -->
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="banner">
                            <h3>-introducing-</h3>
                            <h1>FATTY BURGER</h1>

                            <div class="inner_banner">
                                <div class="banner_content">
                                    <p>A double layer of sear-sizzled 100% pure beef mingled with special sauce on a sesame seed bun and topped with melty American cheese, crisp lettuce, minced onions and tangy pickles.</p>
                                    <p>*Based on pre-cooked patty weight.</p>
                                </div>
                                <div class="stamp">
                                    <img src="{{ asset('assets/client/images/stamp.png') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Container end -->
            <p class="caption">*Limited Time Only</p>
        </header><!-- Header end -->



        @yield('content')



        <!-- Lock -->
        <section id="lock">
            <h2>SERVING MORE THAN JUST BURGERS SINCE 1998</h2>
            <p>Check out our opening hours and location address below.</p>
        </section>



        <!-- Footer -->
        <footer>
            <!-- Container -->
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-sm-4 col-xs-12 col-lg-offset-1 pull-right">
                        <div class="subscribe">
                            <h4>Working hourse</h4>
                            <p> Monday-Friday 06:00-23:00</p>
                            <p> Sat-Sun 08:00-22:00 </p>



                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-4 col-xs-12 col-lg-offset-1 pull-right">
                        <div class="contact_us">
                            <h4>Contact Us</h4>
                            <a href="">info@junkyburget.com</a>

                            <address>
                                Jalan Awan Hijau, Taman OUG<br />
                                58200 Kuala Lumpur <br />
                                Malaysia <br />
                            </address>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-4 col-xs-12 pull-right">
                        <div class="basic_info">
                            <a href=""><img class="footer_logo" src="{{ asset('assets/client/images/footer_logo.png') }}" alt="Burger" /></a>

                            <ul class="list-inline social">
                                <li><a href="" class="fa fa-facebook"></a></li>
                                <li><a href="" class="fa fa-twitter"></a></li>
                                <li><a href="" class="fa fa-instagram"></a></li>
                            </ul>

                            <div class="footer-copyright">
                                <p class="wow fadeInRight" data-wow-duration="1s">
                                    Made by
                                    <i class="fa fa-heart"style="color: #f43438;"></i>
                                    M.Magdy<br />
                                    {{ date('Y') }} All Rights Reserved
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- Container end -->
        </footer><!-- Footer end -->


        <!-- scroll up-->
        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div><!-- End off scroll up-->

        <!-- JavaScript -->
        <script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- Bootsnav js -->
        <script src="{{ asset('assets/client/js/bootsnav.js') }}"></script>



        <!--main js-->
        <script type="text/javascript" src="{{ asset('assets/client/js/main.js') }}"></script>
    </body>
</html>
