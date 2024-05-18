@extends('frontend.body.main_layout')

@section('title', 'Easy News')

@section('content')
    <div class="main-section" style="overflow: hidden;">

        @include('frontend.home_all.section_one')

        @include('frontend.home_all.section_two')

        @include('frontend.home_all.section_three')
        
        @include('frontend.home_all.section_four')

        @include('frontend.home_all.section_five')

        @include('frontend.home_all.section_six')

        @include('frontend.home_all.section_seven')

        @include('frontend.home_all.section_eight')
        
        @include('frontend.home_all.section_nine')

    </div>
@endsection
