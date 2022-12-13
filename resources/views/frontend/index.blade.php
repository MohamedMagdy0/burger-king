
@extends('layouts.frontend.master_app')
@section('page_title')
Home
@endsection
@section('content')


    <!-- Block Content -->
        <section id="block">
            <div class="container">

                <!-- First section -->
                <div class="row">
                    <div class="col-sm-8">
                        <div class="feature">
                            <div class="shack_burger">
                                <div class="chicken">
                                    <img src="{{ asset('assets/client/images/chicken.png') }}" alt="Chicken" />
                                </div>

                                <h2>Shack Burger </h2>
                                <p>Black Angus beef patty topped with American cheese, tomato, lettuce, and “Shack Sauce,” served in a grilled potato bun</p>
                            </div>
                            <p class="caption">*Limited Time Only</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="signature">
                            <div class="shape">
                                <span class="flaticon flaticon-burger"></span>
                                <p>signature</p>
                            </div>
                            <div class="signature_content">
                                <p>It used to be a Secret but not any more! Our tribute to the King is a Cheddar Beef Patty,</p>
                            </div>
                        </div>
                    </div>
                </div><!-- first section end -->


                <!-- Third section -->
                <!-- Carousel -->
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel" data-slide-to="1"></li>
                        <li data-target="#carousel" data-slide-to="2"></li>
                    </ol>


                <!-- Forth section -->
                <div class="row forth_sec">
                    <div class="col-sm-4">
                        <div class="menu">
                            <div class="inner_content">
                               <a style="color: #fff;" href="{{ route('burgers.products') }}"> <span class="flaticon flaticon-burger"></span>
                               <h2>Menu</h2></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="drinks">
                            <div class="inner_content">
                               <a style="color: #fff;" href="{{ route('burgers.burgers_menu', ['category'=> 'beverages']) }}"> <span class="flaticon flaticon-drink"></span>
                               <h2>Drinks</h2></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="sides">
                            <div class="inner_content">
                                <a style="color: #fff;" href="{{ route('burgers.burgers_menu', ['category'=> 'breakfast']) }}"><span class="flaticon flaticon-food"></span>
                                <h2>Break<br>fast</h2></a>
                            </div>
                        </div>
                    </div>
                </div><!-- forth section end -->
            </div>
        </section><!-- Block Content end-->

@endsection





















