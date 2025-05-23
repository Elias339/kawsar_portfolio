@extends('front_end.app')
@section('content')
    <div class="main-wrapper">
        @include('front_end.includs.navbar');
        @include('front_end.includs.banner');
        @include('front_end.includs.service');
        @include('front_end.includs.project');
        @include('front_end.includs.about');
        @include('front_end.includs.contact');
    </div>
@endsection
