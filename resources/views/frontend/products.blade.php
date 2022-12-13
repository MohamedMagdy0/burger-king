@extends('layouts.frontend.master_app')
@section('page_title')
    Products
@endsection
@section('content')
    <section class="food_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our Menu
                </h2>
            </div>

            <ul class="filters_menu">
                <a style="color: #000; margin-bottom: 10px;" href="{{ route('burgers.products') }}"><li data-filter="*">All</li></a>
                <a style="color: #000; margin-bottom: 10px;" href="{{ route('burgers.burgers_menu', ['category'=> 'burgers']) }}"> <li data-filter=".burger">Burgers </li></a>
                <a style="color: #000; margin-bottom: 10px;" href="{{ route('burgers.burgers_menu', ['category'=> 'breakfast']) }}"><li data-filter=".breakfast">Breakfast</li></a>
                <a style="color: #000; margin-bottom: 10px;" href="{{ route('burgers.burgers_menu', ['category'=> 'beverages']) }}"><li data-filter=".beverages">Beverages </li></a>
                <a style="color: #000; margin-bottom: 10px;" href="{{ route('burgers.burgers_menu', ['category'=> 'chicken']) }}"><li data-filter=".chicken">Chicken & Sandwiches</li></a>
            </ul>

            <div class="filters-content">
                <div class="row grid">

                    @foreach ($products as $product)
                        <div class="col-sm-6 col-lg-4 ">
                            <div class="box">
                                <div>
                                    <a href="{{ route('burgers.single_product', ['id' => $product->id]) }}">
                                        <div class="img-box">
                                            <img src="{{ asset($product->image) }}" alt="">
                                        </div>
                                    </a><!-- single_product link -->
                                    <div class="detail-box">
                                        <a href="{{ route('burgers.single_product', ['id' => $product->id]) }}">
                                            <h5 style="margin-bottom: 15px; color: white">
                                                {{ $product->name }}
                                            </h5>
                                        </a> <!-- single_product link -->
                                        <p style="margin-bottom: 10px">
                                            {{ $product->category }} | {{ $product->type }}
                                        </p>
                                        <p style="margin-bottom: 10px">
                                            {{ $product->description }}
                                        </p>
                                        <div class="options">
                                            <h6>

                                                @if ($product->sale_price > 0)
                                                    $<span
                                                        style="text-decoration: line-through; margin-bottom: 10px">{{ $product->price }}</span>
                                                    ${{ $product->sale_price }}
                                                @else
                                                    $<span>{{ $product->price }}</span>
                                                @endif
                                            </h6>
                                            <!-- start form -->
                                            <form action="{{ route('burgers.add_to_cart') }}"
                                                method="post">
                                                @csrf

                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="name" value="{{ $product->name }}">
                                                <input type="hidden" name="image" value="{{ $product->image }}">
                                                <input type="hidden" name="description" value="{{ $product->description }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="price" value="{{ $product->price }}">
                                                <input type="hidden" name="sale_price" value="{{ $product->sale_price }}">
                                                <input type="hidden" name="type" value="{{ $product->type }}">
                                                <input type="hidden" name="category" value="{{ $product->category }}">


                                                <button style="border: none; background: none" type="submit">

                                                    <a>
                                                        <svg version="1.1" id="Capa_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                            y="0px" viewBox="0 0 456.029 456.029"
                                                            style="enable-background:new 0 0 456.029 456.029;"
                                                            xml:space="preserve">
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                                                </g>
                                                            </g>
                                                            <g>
                                                            </g>
                                                            <g>
                                                            </g>
                                                            <g>
                                                            </g>
                                                            <g>
                                                            </g>
                                                            <g>
                                                            </g>
                                                            <g>
                                                            </g>
                                                            <g>
                                                            </g>
                                                            <g>
                                                            </g>
                                                            <g>
                                                            </g>
                                                            <g>
                                                            </g>
                                                            <g>
                                                            </g>
                                                            <g>
                                                            </g>
                                                            <g>
                                                            </g>
                                                            <g>
                                                            </g>
                                                            <g>
                                                            </g>
                                                        </svg>
                                                    </a>

                                                </button><!-- submit -->

                                            </form><!-- add_to_cart -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--col-sm-6   -->
                    @endforeach

                </div><!-- row -->
            </div><!-- filters-content -->


                           <!-- view more -->
            {{-- <div class="btn-box">
                <a href="">
                    View More
                </a>
            </div> --}}

        </div>
    </section>

    <!-- end food section -->
@endsection
