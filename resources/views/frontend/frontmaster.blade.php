@include('frontend.partials.header')
@include('frontend.partials.social')

@include('frontend.partials.navbar')
<!-- END nav -->

@include('frontend.partials.viewpostsbanner')

{{--search bar start--}}
@include('frontend.partials.searchbar')
{{--search bar end--}}

@yield('page')



{{--footer start--}}
@include('frontend.partials.footer')
