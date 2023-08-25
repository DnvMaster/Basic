@php
    $abouts = DB::table('abouts')->first();
@endphp
@extends('layouts.master_home')

@section('home_content')
    <main id="main">
        <!-- About Us Section -->
        @include('home_about')
        <!-- End About Us Section -->
        <!-- Services Section -->
        @include('service')
        <!-- End Services Section -->
        <!-- Portfolio Section -->
        @include('portfolio')
        <!-- End Portfolio Section -->

        <!-- Our Clients Section -->
        <section id="clients" class="clients">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Брэнды</h2>
                </div>
                <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
                    @foreach($brands as $brand)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="client-logo">
                                <img src="{{ $brand->brand_image }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Our Clients Section -->
    </main>
@endsection

