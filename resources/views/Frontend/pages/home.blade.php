@extends('Frontend.layouts.master')

@section('title') {{ __('Homepage') }} @endsection

@section('body')
    <!-- Banner Area Start-->
    <section class="banner-area" style="background-image: url( {{ asset('Frontend/assets/img/banner/0.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 align-self-center">
                    <div class="banner-inner text-md-start text-center">
                        <h1>তৈরি করুন  <span>নিজেকে</span> <br> এগিয়ে যান সবার<span> শির্ষে.</span></h1>
                        <div class="banner-content">
                            <p>স্বাধীন শিক্ষা সবর্দায় কাজ করে যাচ্ছে আপনার স্বপ্নের স্কিলকে ডেভেলোপ করার জন্য।</p>                         
                        </div>
                        <div class="single-input-wrap">
                            <input type="text" placeholder="Search your best courses">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- intro Area Start-->
    <div class="container">
        <div class="intro-area">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-intro-wrap">
                        <div class="thumb">
                            <img src="{{ asset('Frontend/assets/img/intro/1.png') }}" alt="img">
                        </div>
                        <div class="wrap-details">
                            <h6><a href="#">130,000 online courses</a></h6>
                            <p>Enjoy a variety of fresh topics</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-intro-wrap">
                        <div class="thumb">
                            <img src="{{ asset('Frontend/assets/img/intro/2.png') }}" alt="img">
                        </div>
                        <div class="wrap-details">
                            <h6><a href="#">Expert instruction</a></h6>
                            <p>Enjoy a variety of fresh topics</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-intro-wrap">
                        <div class="thumb">
                            <img src="{{ asset('Frontend/assets/img/intro/3.png') }}" alt="img">
                        </div>
                        <div class="wrap-details">
                            <h6><a href="#">Lifetime access</a></h6>
                            <p>Learn on your schedule</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-intro-wrap">
                        <div class="thumb">
                            <img src="{{ asset('Frontend/assets/img/intro/1.png') }}" alt="img">
                        </div>
                        <div class="wrap-details">
                            <h6><a href="#">130,000 online courses</a></h6>
                            <p>Enjoy a variety of fresh topics</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </div>
    <!-- intro Area End -->

    <!-- trending courses Area Start-->
    <section class="trending-courses-area pd-top-135 pd-bottom-140">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Most Trending Courses</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <ul class="edl-nav nav nav-pills">
                        <li class="nav-item">
                            <button class="nav-link active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1">All Course</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2">Python</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-3-tab" data-bs-toggle="pill" data-bs-target="#pills-3">UI Design</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-4-tab" data-bs-toggle="pill" data-bs-target="#pills-4">Php</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-5-tab" data-bs-toggle="pill" data-bs-target="#pills-5">HTML</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-6-tab" data-bs-toggle="pill" data-bs-target="#pills-6">CSS</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="pills-1">
                            <div class="course-slider owl-carousel">
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/1.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-red">Expert</a>
                                            <img src="{{ asset('Frontend/assets/img/course/2.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Best way learn fundamentals of design.</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-green">All Level</a>
                                            <img src="{{ asset('Frontend/assets/img/course/3.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">About latest tips news and course for Illustration 2021</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/4.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Email & Affiliate Marketing Mastermind</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-2">
                            <div class="course-slider owl-carousel">
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/1.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-red">Expert</a>
                                            <img src="{{ asset('Frontend/assets/img/course/2.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Best way learn fundamentals of design.</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-green">All Level</a>
                                            <img src="{{ asset('Frontend/assets/img/course/3.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">About latest tips news and course for Illustration 2021</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/4.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Email & Affiliate Marketing Mastermind</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-3">
                            <div class="course-slider owl-carousel">
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/1.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-red">Expert</a>
                                            <img src="{{ asset('Frontend/assets/img/course/2.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Best way learn fundamentals of design.</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-green">All Level</a>
                                            <img src="{{ asset('Frontend/assets/img/course/3.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">About latest tips news and course for Illustration 2021</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/4.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Email & Affiliate Marketing Mastermind</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-4">
                            <div class="course-slider owl-carousel">
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/1.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-red">Expert</a>
                                            <img src="{{ asset('Frontend/assets/img/course/2.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Best way learn fundamentals of design.</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-green">All Level</a>
                                            <img src="{{ asset('Frontend/assets/img/course/3.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">About latest tips news and course for Illustration 2021</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/4.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Email & Affiliate Marketing Mastermind</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-5">
                            <div class="course-slider owl-carousel">
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/1.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-red">Expert</a>
                                            <img src="{{ asset('Frontend/assets/img/course/2.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Best way learn fundamentals of design.</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-green">All Level</a>
                                            <img src="{{ asset('Frontend/assets/img/course/3.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">About latest tips news and course for Illustration 2021</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/4.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Email & Affiliate Marketing Mastermind</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-6">
                            <div class="course-slider owl-carousel">
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/1.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-red">Expert</a>
                                            <img src="{{ asset('Frontend/assets/img/course/2.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Best way learn fundamentals of design.</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-green">All Level</a>
                                            <img src="{{ asset('Frontend/assets/img/course/3.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">About latest tips news and course for Illustration 2021</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/4.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Email & Affiliate Marketing Mastermind</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
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
    <!-- trending courses Area End -->

    <!-- service Area Start-->
    <section class="service-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-title">
                        <h2>Find the right course</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in eget phasellus dui tincidunt nascetur nisl nunc consequat. Arcu ultricies pulvinar enim vulputate.</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="category-service">
                        <div class="item">
                            <div class="single-service-wrap">
                                <h6>Digital Marketing</h6>
                                <p>236 Course Available</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-service-wrap">
                                <h6>Web Development</h6>
                                <p>236 Course Available</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-service-wrap">
                                <h6>Photography</h6>
                                <p>236 Course Available</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-service-wrap">
                                <h6>Drawing</h6>
                                <p>236 Course Available</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-service-wrap">
                                <h6>UX Design</h6>
                                <p>236 Course Available</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-service-wrap">
                                <h6>JavaScript</h6>
                                <p>236 Course Available</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-service-wrap">
                                <h6>Graphics Design</h6>
                                <p>236 Course Available</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-service-wrap">
                                <h6>Web Marketing</h6>
                                <p>236 Course Available</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-service-wrap">
                                <h6>Digital Marketing</h6>
                                <p>236 Course Available</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-service-wrap">
                                <h6>UX Design</h6>
                                <p>236 Course Available</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-service-wrap">
                                <h6>JavaScript</h6>
                                <p>236 Course Available</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-service-wrap">
                                <h6>Graphics Design</h6>
                                <p>236 Course Available</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-service-wrap">
                                <h6>Digital Marketing</h6>
                                <p>236 Course Available</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-service-wrap">
                                <h6>JavaScript</h6>
                                <p>236 Course Available</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service Area End -->

    <!-- enllor courses Area Start-->
    <section class="enllor-courses-area pd-top-120 pd-bottom-140">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Most Students Enllor</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <ul class="edl-nav nav nav-pills">
                        <li class="nav-item">
                            <button class="nav-link active" id="pills-7-tab" data-bs-toggle="pill" data-bs-target="#pills-7">All Course</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-8-tab" data-bs-toggle="pill" data-bs-target="#pills-8">Python</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-9-tab" data-bs-toggle="pill" data-bs-target="#pills-9">UI Design</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-10-tab" data-bs-toggle="pill" data-bs-target="#pills-10">Php</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-11-tab" data-bs-toggle="pill" data-bs-target="#pills-11">HTML</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-12-tab" data-bs-toggle="pill" data-bs-target="#pills-12">CSS</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="pills-7">
                            <div class="course-slider owl-carousel">
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/1.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/5.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Java (Beginner) Programming Tutorials
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-red">Expert</a>
                                            <img src="{{ asset('Frontend/assets/img/course/2.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Best way learn fundamentals of design.</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/6.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Time Management Mastery: Do More, Stress Less
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-green">All Level</a>
                                            <img src="{{ asset('Frontend/assets/img/course/3.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">About latest tips news and course for Illustration 2021</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/2.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Search Engine Optimization Tips and Tricks
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/4.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Email & Affiliate Marketing Mastermind</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/7.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Python Programming Tutorials (Computer Science)
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-8">
                            <div class="course-slider owl-carousel">
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/2.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/6.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Java (Beginner) Programming Tutorials
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-red">Expert</a>
                                            <img src="{{ asset('Frontend/assets/img/course/3.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Best way learn fundamentals of design.</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/7.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Time Management Mastery: Do More, Stress Less
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-green">All Level</a>
                                            <img src="{{ asset('Frontend/assets/img/course/4.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">About latest tips news and course for Illustration 2021</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/3.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Search Engine Optimization Tips and Tricks
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/5.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Email & Affiliate Marketing Mastermind</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/1.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Python Programming Tutorials (Computer Science)
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-9">
                            <div class="course-slider owl-carousel">
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/1.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/5.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Java (Beginner) Programming Tutorials
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-red">Expert</a>
                                            <img src="{{ asset('Frontend/assets/img/course/2.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Best way learn fundamentals of design.</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/6.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Time Management Mastery: Do More, Stress Less
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-green">All Level</a>
                                            <img src="{{ asset('Frontend/assets/img/course/3.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">About latest tips news and course for Illustration 2021</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/2.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Search Engine Optimization Tips and Tricks
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/4.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Email & Affiliate Marketing Mastermind</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/7.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Python Programming Tutorials (Computer Science)
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-10">
                            <div class="course-slider owl-carousel">
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/2.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/6.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Java (Beginner) Programming Tutorials
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-red">Expert</a>
                                            <img src="{{ asset('Frontend/assets/img/course/3.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Best way learn fundamentals of design.</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/7.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Time Management Mastery: Do More, Stress Less
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-green">All Level</a>
                                            <img src="{{ asset('Frontend/assets/img/course/4.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">About latest tips news and course for Illustration 2021</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/3.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Search Engine Optimization Tips and Tricks
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/5.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Email & Affiliate Marketing Mastermind</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/1.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Python Programming Tutorials (Computer Science)
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-11">
                            <div class="course-slider owl-carousel">
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/1.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/5.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Java (Beginner) Programming Tutorials
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-red">Expert</a>
                                            <img src="{{ asset('Frontend/assets/img/course/2.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Best way learn fundamentals of design.</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/6.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Time Management Mastery: Do More, Stress Less
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-green">All Level</a>
                                            <img src="{{ asset('Frontend/assets/img/course/3.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">About latest tips news and course for Illustration 2021</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/2.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Search Engine Optimization Tips and Tricks
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/4.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Email & Affiliate Marketing Mastermind</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/7.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Python Programming Tutorials (Computer Science)
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-12">
                            <div class="course-slider owl-carousel">
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/2.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">PHP for Beginners - Become a PHP Master - CMS Project</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/6.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Java (Beginner) Programming Tutorials
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-red">Expert</a>
                                            <img src="{{ asset('Frontend/assets/img/course/3.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Best way learn fundamentals of design.</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/7.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Time Management Mastery: Do More, Stress Less
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-green">All Level</a>
                                            <img src="{{ asset('Frontend/assets/img/course/4.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">About latest tips news and course for Illustration 2021</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/3.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Search Engine Optimization Tips and Tricks
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/5.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Email & Affiliate Marketing Mastermind</a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-wrap">
                                        <div class="thumb">
                                            <a href="#" class="cat cat-blue">Beginner</a>
                                            <img src="{{ asset('Frontend/assets/img/course/1.png') }}" alt="img">
                                        </div>
                                        <div class="wrap-details">
                                            <h6><a href="#">Python Programming Tutorials (Computer Science)
                                            </a></h6>
                                            <div class="user-area">
                                                <div class="user-details">
                                                    <img src="{{ asset('Frontend/assets/img/author/1.png') }}" alt="img">
                                                    <a href="#">Jessica Jessy</a>
                                                </div>
                                                <div class="user-rating">
                                                    <span><i class="fa fa-star"></i>
                                                        4.9</span>(76)
                                                </div>
                                            </div>
                                            <div class="price-wrap">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <a href="#">Development</a>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="price">$30</div>
                                                    </div>
                                                </div>
                                            </div>
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
    <!-- enllor courses Area End -->

    <!-- testimonial courses Area Start-->
    <section class="testimonial-courses-area pd-bottom-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>People <i style="color: var(--main-color);" class="fa fa-heart"></i> Edufie</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="testimonial-slider owl-carousel">
                        <div class="item">
                            <div class="single-testimonial-wrap">
                                <div class="thumb">
                                    <img src="{{ asset('Frontend/assets/img/quote.png') }}" alt="img">
                                </div>
                                <div class="wrap-details">
                                    <h5><a href="#">Super fast WordPress themes</a></h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit placerat sit feugiat ornare tortor arcu, euismod pellentesque porta. Lacus, semper congue consequat, potenti suspendisse luctus cras vel.</p>
                                    <span>- Jessica Jessy</span>
                                    <a class="play-btn" href="#"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-testimonial-wrap">
                                <div class="thumb">
                                    <img src="{{ asset('Frontend/assets/img/quote.png') }}" alt="img">
                                </div>
                                <div class="wrap-details">
                                    <h5><a href="#">Super fast WordPress themes</a></h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit placerat sit feugiat ornare tortor arcu, euismod pellentesque porta. Lacus, semper congue consequat, potenti suspendisse luctus cras vel.</p>
                                    <span>- Jessica Jessy</span>
                                    <a class="play-btn" href="#"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-testimonial-wrap">
                                <div class="thumb">
                                    <img src="{{ asset('Frontend/assets/img/quote.png') }}" alt="img">
                                </div>
                                <div class="wrap-details">
                                    <h5><a href="#">Super fast WordPress themes</a></h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit placerat sit feugiat ornare tortor arcu, euismod pellentesque porta. Lacus, semper congue consequat, potenti suspendisse luctus cras vel.</p>
                                    <span>- Jessica Jessy</span>
                                    <a class="play-btn" href="#"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-testimonial-wrap">
                                <div class="thumb">
                                    <img src="{{ asset('Frontend/assets/img/quote.png') }}" alt="img">
                                </div>
                                <div class="wrap-details">
                                    <h5><a href="#">Super fast WordPress themes</a></h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit placerat sit feugiat ornare tortor arcu, euismod pellentesque porta. Lacus, semper congue consequat, potenti suspendisse luctus cras vel.</p>
                                    <span>- Jessica Jessy</span>
                                    <a class="play-btn" href="#"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial courses Area End -->

    <!-- client Area Start-->
    <section class="client-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="client-slider owl-carousel">
                        <div class="item">
                            <img src="{{ asset('Frontend/assets/img/client/1.png') }}" alt="img">
                        </div>
                        <div class="item">
                            <img src="{{ asset('Frontend/assets/img/client/2.png') }}" alt="img">
                        </div>
                        <div class="item">
                            <img src="{{ asset('Frontend/assets/img/client/3.png') }}" alt="img">
                        </div>
                        <div class="item">
                            <img src="{{ asset('Frontend/assets/img/client/4.png') }}" alt="img">
                        </div>
                        <div class="item">
                            <img src="{{ asset('Frontend/assets/img/client/5.png') }}" alt="img">
                        </div>
                        <div class="item">
                            <img src="{{ asset('Frontend/assets/img/client/6.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client Area End -->

    <!-- about Area Start-->
    <section class="about-area pd-top-150 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="single-about-wrap">
                        <div class="thumb">
                            <img src="{{ asset('Frontend/assets/img/intro/video-player.png') }}" alt="img">
                        </div>
                        <div class="wrap-details">
                            <h3><a href="#">Become a trainer</a></h3>
                            <p>Our courses are built with keeping all levels of users in mind. Learn from industry experts and open up a whole new series of possibilities.</p>
                            <a class="btn btn-base-light-border href="#">Resignation</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-about-wrap">
                        <div class="thumb">
                            <img src="{{ asset('Frontend/assets/img/intro/brain.png') }}" alt="img">
                        </div>
                        <div class="wrap-details">
                            <h3><a href="#">Become a Student</a></h3>
                            <p>Our courses are built with keeping all levels of users in mind. Learn from industry experts and open up a whole new series of possibilities.</p>
                            <a class="btn btn-base-light-border href="#">Resignation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about Area End -->

@endsection