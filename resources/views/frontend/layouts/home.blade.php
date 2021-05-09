@extends('frontend.frontmaster')
@section('page')

{{--slogan start--}}
@include('frontend.partials.slogan')
{{--slogan end--}}

<section class="ftco-section ftco-properties">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Recent Posts</span>
                <h2 class="mb-4">Recent Properties</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="properties-slider owl-carousel ftco-animate">
                    <div class="item">
                        <div class="properties">
                            <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url({{asset('frontend')}}/master/images/properties-3.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <span class="status sale">Sale</span>
                                <div class="d-flex">
                                    <div class="one">
                                        <h3><a href="#">North Parchmore Street</a></h3>
                                        <p>Apartment</p>
                                    </div>
                                    <div class="two">
                                        <span class="price">$20,000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{--recent property end--}}


{{--recommended properies start--}}

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Special Offers</span>
                <h2 class="mb-4">Most Recommended Properties</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm col-md-6 col-lg ftco-animate">
                <div class="properties">
                    <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{asset('frontend')}}/master/images/properties-4.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <span class="status sale">Sale</span>
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="#">North Parchmore Street</a></h3>
                                <p>Apartment</p>
                            </div>
                            <div class="two">
                                <span class="price">$20,000</span>
                            </div>
                        </div>
                        <p>Far far away, behind the word mountains, far from the countries</p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="flaticon-selection"></i> 250sqft</span>
                            <span class="ml-auto"><i class="flaticon-bathtub"></i> 3</span>
                            <span><i class="flaticon-bed"></i> 4</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{--end recommended property--}}

{{--start fun facts--}}
@include('frontend.partials.funfact')
{{--end fun facts--}}

{{--stasrt admins--}}
<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ftco-animate">
                <div class="row ftco-animate">
                    <div class="col-md-12">
                        <div class="carousel-testimony owl-carousel ftco-owl">
                            <div class="item">
                                <div class="testimony-wrap py-4 pb-5">
                                    <div class="user-img mb-4" style="background-image: url({{asset('frontend')}}/master/images/person_1.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Admin</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{--end admins--}}
@endsection
