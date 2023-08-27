@extends('layouts.master_home')
@section('home_content')
    @include('layouts.body.slider')
    @include('about')
    @include('service')
    @include('portfolio')
@endsection
