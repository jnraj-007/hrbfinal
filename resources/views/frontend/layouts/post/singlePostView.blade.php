@extends('frontend.frontmaster')
@section('page')

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12 ftco-animate">
                            <div class="single-slider owl-carousel">
                                <div class="item">
{{--                                    <div class="properties-img" style="background-image: url('image/posts/{{$posts->image}}');"></div>--}}
                                    <img class="properties-img" src="{{url('image/posts/',$posts->image)}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 Properties-single mt-4 mb-5 ftco-animate">
                            <h2>{{$posts->title}}</h2>
                            <p class="rate mb-4">
                                <span class="loc"><a href="#"><i class="icon-map"></i>  Road No:{{$posts->roadNo}}, Sector NO: {{$posts->sectorNo}}, Region: {{$posts->region}}.</a></span>
                            </p>
                            <p>{{$posts->description}}
                                <br>
                            <div><h1 style="font-size:1.25rem">Details:</h1></div>
                            <div class="d-md-flex mt-5 mb-5">
                                <ul>
                                    <li><span>Bed Rooms: </span> {{$posts->bedroom}}</li>
                                    <li><span>Bath Rooms: </span> {{$posts->bathroom}}</li>
                                </ul>
                                <ul class="ml-md-5">
                                    <li><span>Floor Area: </span> {{$posts->area}} {{$posts->unit}}</li>

                                </ul>
                            </div>
                        </div>


                        <div class="col-md-12 properties-single ftco-animate mb-5 mt-5">
                            <h4 class="mb-4">Related Properties</h4>
                            <div class="row">
                                <div class="col-md-6 ftco-animate">
                                    <div class="properties">
                                        <a href="property-single.html" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/properties-2.jpg);">
                                            <div class="icon d-flex justify-content-center align-items-center">
                                                <span class="icon-search2"></span>
                                            </div>
                                        </a>
                                        <div class="text p-3">
                                            <span class="status sale">Sale</span>
                                            <div class="d-flex">
                                                <div class="one">
                                                    <h3><a href="property-single.html">North Parchmore Street</a></h3>
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

                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                       <h1> Are you Interested in this property?</h1>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @auth('user')
                            @if($posts->authorId==auth('user')->user()->id)
                                <p>you can not interest in your own post</p>
                            @else

                        @if($checkPost)
                        <p>Already interested</p>
                            @else
                            <a href="{{route('post.interested',$posts->id)}}" ><button class="btn btn-success">Interest</button></a>
                    @endif
                            @endif
                        @else
                        <a href="{{route('post.interested',$posts->id)}}" ><button class="btn btn-success">Interest</button></a>

                        @endauth
                    </div>
                    <br><br><br><br><br><br><br>
                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Categories</h3>
                            @foreach($categories as $category)
                            <li><a href="#">{{$category->title}} <span>{{ \App\Models\Post::where('categoryId',$category->id)->count()}}</span></a></li>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> <!-- .section -->
@endsection
