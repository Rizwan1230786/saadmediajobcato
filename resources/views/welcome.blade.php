@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Search start -->
@include('includes.search')
<!-- Search End -->  

<!-- Featured Jobs start -->
{{-- @include('includes.featured_jobs') --}}
<!-- Featured Jobs ends -->

<!-- Other Jobs start -->
{{-- @include('includes.extra_jobs.other_jobs') --}}
<!-- Other Jobs ends -->
<!-- Custom Jobs start -->
{{-- @include('includes.extra_jobs.custom_jobs') --}}
<!-- Custom Jobs ends -->

<!-- Login box start -->
{{-- @include('includes.login_text') --}}
<!-- Login box ends --> 
<!-- How it Works start -->
{{-- @include('includes.how_it_works') --}}
<!-- How it Works Ends -->
<!-- Latest Jobs start -->
{{-- @include('includes.latest_jobs') --}}
<!-- Latest Jobs ends --> 
<!-- Testimonials start -->
{{-- @include('includes.testimonials') --}}
<!-- Testimonials End -->
@include('includes.country.countries');
<!-- Video start -->
@include('includes.video')
<!-- Video end --> 

<!-- Subscribe start -->
@include('includes.subscribe')
<!-- Subscribe End -->
@include('includes.footer')
@endsection
@push('scripts') 
<script>
    $(document).ready(function ($) {
        $("form").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);
    });
</script>
@include('includes.country_state_city_js')
@endpush
