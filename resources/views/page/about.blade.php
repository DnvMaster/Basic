@extends('layouts.master_home')
@section('home_content')
    <main id="main">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>О нас</h2>
                    <ol>
                        <li><a href="{{ url('/') }}">Главная</a></li>
                        <li><a href="{{ route('about') }}">О нас</a></li>
                    </ol>
                </div>
            </div>
        </section>
        @include('about')
    </main>
@endsection
