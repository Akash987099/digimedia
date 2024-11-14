@extends('web.layout.master')

       
@section('web')

@if(!empty($images) && is_array($images))

        <!-- Carousel Start -->
        <div class="container-fluid px-0">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">

             

                <ol class="carousel-indicators">
                    @foreach($images as $key => $image)
                <li data-bs-target="#carouselId" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
                </ol>


                <div class="carousel-inner" role="listbox">
                    @foreach($images as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('uploads/' . $image) }}" class="img-fluid" alt="Slide {{ $key + 1 }}">
                            <div class="carousel-caption">
                                <div class="container carousel-content">
                                    <h6 class="text-secondary h4 animated fadeInUp">Best IT Solutions</h6>
                                    <h1 class="text-white display-1 mb-4 animated fadeInRight">{{ $titles1[$key] ?? ' ' }}</h1>
                                    <p class="mb-4 text-white fs-5 animated fadeInDown">{{ $titles2[$key] ?? ' ' }}</p>
                                    <a href="#" class="me-2"><button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">Read More</button></a>
                                    <a href="#" class="ms-2"><button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">Contact Us</button></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        @endif
        <!-- Carousel End -->


        <!-- Fact Start -->

        @if ($page->slug == 'home')
            
       
        <div class="container-fluid bg-secondary py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 wow fadeIn" data-wow-delay=".1s">
                        <div class="d-flex counter">
                            <h1 class="me-3 text-primary counter-value">99</h1>
                            <h5 class="text-white mt-1">Success in getting happy customer</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 wow fadeIn" data-wow-delay=".3s">
                        <div class="d-flex counter">
                            <h1 class="me-3 text-primary counter-value">25</h1>
                            <h5 class="text-white mt-1">Thousands of successful business</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 wow fadeIn" data-wow-delay=".5s">
                        <div class="d-flex counter">
                            <h1 class="me-3 text-primary counter-value">120</h1>
                            <h5 class="text-white mt-1">Total clients who love HighTech</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 wow fadeIn" data-wow-delay=".7s">
                        <div class="d-flex counter">
                            <h1 class="me-3 text-primary counter-value">5</h1>
                            <h5 class="text-white mt-1">Stars reviews given by satisfied clients</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif

        <!-- Fact End -->


        <!-- About Start -->

        @if(!empty($page->about_image1))

        <div class="container-fluid py-5 my-5">
            <div class="container pt-5">
                <div class="row g-5">
                    <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                        <div class="h-100 position-relative">
                            <img src="{{asset(''.$page->about_image1)}}" class="img-fluid w-75 rounded" alt="" style="margin-bottom: 25%;">
                            <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                                <img src="{{asset(''.$page->about_image2)}}" class="img-fluid w-100 rounded" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                        <h5 class="text-primary">About Us</h5>
                        <h1 class="mb-4">{{$page->about_title}}</h1>
                        <p>{{$page->about_content}}</p>
                        <a href="" class="btn btn-secondary rounded-pill px-5 py-3 text-white">More Details</a>
                    </div>
                </div>
            </div>
        </div>

        @endif


        <!-- About End -->


        <!-- Services Start -->

        {{-- {{dump($service), "--0---"}} --}}
        
        @if (!empty($service) && count($service) > 0)  

        <div class="container-fluid services py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text-primary">Our Services</h5>
                    <h1>Services Built Specifically For Your Business</h1>
                </div>

                    
                <div class="row g-5 services-inner">

                    @foreach ($service as $key => $val)

                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="services-item bg-light">
                            <div class="p-4 text-center services-content">
                                <div class="services-content-icon">
                                    {{-- <i class="fa fa-code fa-7x mb-4 text-primary"></i> --}}
                                    <img src="{{asset(''.$val->image)}}" alt="" height="140">
                                    <h4 class="mb-3">{{$val->name}}</h4>
                                    <p class="mb-4">{{$val->content}}</p>
                                    <a href="" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach

                </div>

            </div>
        </div>
        
        @endif
        <!-- Services End -->


        <!-- Project Start -->

        @if (!empty($project) && count($project) > 0) 
            
       
        <div class="container-fluid project py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text-primary">Our Project</h5>
                    <h1>Our Recently Completed Projects</h1>
                </div>
                <div class="row g-5">

                    @foreach ($project as $key => $val)
                        
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="project-item">
                            <div class="project-img">
                                <img src="{{asset('' . $val->image)}}" class="img-fluid w-100 rounded" alt="">
                                <div class="project-content">
                                    <a href="#" class="text-center">
                                        <h4 class="text-secondary">{{$val->project_name}}</h4>
                                        {{-- <p class="m-0 text-white">Web Analysis</p> --}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    
                </div>
            </div>
        </div>

        @endif
        <!-- Project End -->


        <!-- Blog Start -->
        <div class="container-fluid blog py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text-primary">Our Blog</h5>
                    <h1>Latest Blog & News</h1>
                </div>
                <div class="row g-5 justify-content-center">
                    <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="blog-item position-relative bg-light rounded">
                            <img src="{{asset('img/blog-1.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                            <span class="position-absolute px-4 py-3 bg-primary text-white rounded" style="top: -28px; right: 20px;">Web Design</span>
                            <div class="blog-btn d-flex justify-content-between position-relative px-3" style="margin-top: -75px;">
                                <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                                    <a href="" class="btn text-white">Read More</a>
                                </div>
                                <div class="blog-btn-icon btn btn-secondary px-4 py-3 rounded-pill ">
                                    <div class="blog-icon-1">
                                        <p class="text-white px-2">Share<i class="fa fa-arrow-right ms-3"></i></p>
                                    </div>
                                    <div class="blog-icon-2">
                                        <a href="" class="btn me-1"><i class="fab fa-facebook-f text-white"></i></a>
                                        <a href="" class="btn me-1"><i class="fab fa-twitter text-white"></i></a>
                                        <a href="" class="btn me-1"><i class="fab fa-instagram text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content text-center position-relative px-3" style="margin-top: -25px;">
                                <img src="{{asset('img/admin.jpg')}}" class="img-fluid rounded-circle border border-4 border-white mb-3" alt="">
                                <h5 class="">By Daniel Martin</h5>
                                <span class="text-secondary">24 March 2023</span>
                                <p class="py-2">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum. Aliquam dolor eget urna ultricies tincidunt libero sit amet</p>
                            </div>
                            <div class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
                                <a href="" class="text-white"><small><i class="fas fa-share me-2 text-secondary"></i>5324 Share</small></a>
                                <a href="" class="text-white"><small><i class="fa fa-comments me-2 text-secondary"></i>5 Comments</small></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".5s">
                        <div class="blog-item position-relative bg-light rounded">
                            <img src="{{asset('img/blog-2.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                            <span class="position-absolute px-4 py-3 bg-primary text-white rounded" style="top: -28px; right: 20px;">Development</span>
                            <div class="blog-btn d-flex justify-content-between position-relative px-3" style="margin-top: -75px;">
                                <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                                    <a href="" class="btn text-white ">Read More</a>
                                </div>
                                <div class="blog-btn-icon btn btn-secondary px-4 py-3 rounded-pill ">
                                    <div class="blog-icon-1">
                                        <p class="text-white px-2">Share<i class="fa fa-arrow-right ms-3"></i></p>
                                    </div>
                                    <div class="blog-icon-2">
                                        <a href="" class="btn me-1"><i class="fab fa-facebook-f text-white"></i></a>
                                        <a href="" class="btn me-1"><i class="fab fa-twitter text-white"></i></a>
                                        <a href="" class="btn me-1"><i class="fab fa-instagram text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content text-center position-relative px-3" style="margin-top: -25px;">
                                <img src="{{asset('img/admin.jpg')}}" class="img-fluid rounded-circle border border-4 border-white mb-3" alt="">
                                <h5 class="">By Daniel Martin</h5>
                                <span class="text-secondary">23 April 2023</span>
                                <p class="py-2">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum. Aliquam dolor eget urna ultricies tincidunt libero sit amet</p>
                            </div>
                            <div class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
                                <a href="" class="text-white"><small><i class="fas fa-share me-2 text-secondary"></i>5324 Share</small></a>
                                <a href="" class="text-white"><small><i class="fa fa-comments me-2 text-secondary"></i>5 Comments</small></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".7s">
                        <div class="blog-item position-relative bg-light rounded">
                            <img src="{{asset('img/blog-3.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                            <span class="position-absolute px-4 py-3 bg-primary text-white rounded" style="top: -28px; right: 20px;">Mobile App</span>
                            <div class="blog-btn d-flex justify-content-between position-relative px-3" style="margin-top: -75px;">
                                <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                                    <a href="" class="btn text-white ">Read More</a>
                                </div>
                                <div class="blog-btn-icon btn btn-secondary px-4 py-3 rounded-pill ">
                                    <div class="blog-icon-1">
                                        <p class="text-white px-2">Share<i class="fa fa-arrow-right ms-3"></i></p>
                                    </div>
                                    <div class="blog-icon-2">
                                        <a href="" class="btn me-1"><i class="fab fa-facebook-f text-white"></i></a>
                                        <a href="" class="btn me-1"><i class="fab fa-twitter text-white"></i></a>
                                        <a href="" class="btn me-1"><i class="fab fa-instagram text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content text-center position-relative px-3" style="margin-top: -25px;">
                                <img src="{{asset('img/admin.jpg')}}" class="img-fluid rounded-circle border border-4 border-white mb-3" alt="">
                                <h5 class="">By Daniel Martin</h5>
                                <span class="text-secondary">30 jan 2023</span>
                                <p class="py-2">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum. Aliquam dolor eget urna ultricies tincidunt libero sit amet</p>
                            </div>
                            <div class="blog-coments d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
                                <a href="" class="text-white"><small><i class="fas fa-share me-2 text-secondary"></i>5324 Share</small></a>
                                <a href="" class="text-white"><small><i class="fa fa-comments me-2 text-secondary"></i>5 Comments</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog End -->


        <!-- Team Start -->

        @if (!empty($team) && count($team) > 0) 

        <div class="container-fluid py-5 mb-5 team">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text-primary">Our Team</h5>
                    <h1>Meet our expert Team</h1>
                </div>
                <div class="owl-carousel team-carousel wow fadeIn" data-wow-delay=".5s">
                    
                    @foreach ($team as $key => $val)
                    
                    <div class="rounded team-item">
                        <div class="team-content">
                            <div class="team-img-icon">
                                <div class="team-img">
                                    <img src="{{asset(''.$val->image)}}" class="img-fluid w-100 " height="50" alt="">
                                </div>
                                <div class="team-name text-center py-3">
                                    <h4 class="">{{$val->name}}</h4>
                                    <p class="m-0">{{$val->designation}}</p>
                                </div>
                                <div class="team-icon d-flex justify-content-center pb-4">
                                    <p>{{$val->experiance}}</p>   
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                
                    
                </div>
            </div>
        </div>

        @endif

        <!-- Team End -->

        <!-- Testimonial Start -->
        <div class="container-fluid testimonial py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text-primary">Our Testimonial</h5>
                    <h1>Our Client Saying!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay=".5s">
                  
                  
                    @foreach ($feedbacks as $key => $val)
                   
                    
                    <div class="testimonial-item border p-4">
                        <div class=" d-flex align-items-center">
                            <div class="">
                                <img src="{{asset(''.$val->image)}}" alt="">
                            </div>
                            <div class="ms-4">
                                <h4 class="text-secondary">{{$val->name}}</h4>
                                {{-- <p class="m-0 pb-3">Profession</p> --}}
                                <div class="d-flex pe-5">
                                    @for ($i = 0; $i < $val->star; $i++)
                                        <i class="fas fa-star me-1 text-primary"></i>
                                    @endfor
                                    @for ($i = $val->star; $i < 5; $i++)
                                        <i class="far fa-star me-1 text-primary"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="border-top mt-4 pt-3">
                            <p class="mb-0">{{$val->description}}</p>
                        </div>
                    </div>

                    @endforeach
                    
                </div>
            </div>
        </div>

        <!-- Testimonial End -->


        <!-- Contact Start -->
        <div class="container-fluid py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text-primary">Get In Touch</h5>
                    <h1 class="mb-3">Contact for any query</h1>
                    {{-- <p class="mb-2">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> --}}
                </div>
                <div class="contact-detail position-relative p-5">
                    <div class="row g-5 mb-5 justify-content-center">
                        <div class="col-xl-4 col-lg-6 wow fadeIn d-flex" data-wow-delay=".3s">
                            <div class="d-flex bg-light p-3 rounded">
                                <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="text-primary">Address</h4>
                                    <a href="https://goo.gl/maps/Zd4BCynmTb98ivUJ6" target="_blank" class="h5">{{$admin->address}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 wow fadeIn d-flex" data-wow-delay=".5s">
                            <div class="d-flex bg-light p-3 rounded">
                                <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fa fa-phone text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="text-primary">Call Us</h4>
                                    <a class="h5" href="tel:+0123456789" target="_blank">+91 {{$admin->mobile}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 wow fadeIn d-flex" data-wow-delay=".7s">
                            <div class="d-flex bg-light p-3 rounded">
                                <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fa fa-envelope text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="text-primary">Email Us</h4>
                                    <a class="h5" href="mailto:info@example.com" target="_blank">{{$admin->email}} <br> {{$admin->email1}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s">
                            <div class="p-5 h-100 rounded contact-map">
                                {{-- <iframe class="rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.4710403339755!2d-73.82241512404069!3d40.685622471397615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c26749046ee14f%3A0xea672968476d962c!2s123rd%20St%2C%20Queens%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1686493221834!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14190.80111774663!2d78.0501215!3d27.2285584!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39747bbce6372b83%3A0x108f29891918a1d!2sDigi%20Prologue%20%7C%20Best%20Digital%20Marketing%20Agency%20in%20Agra%20%7C%20Web%20design%20%7C%20Social%20media%20Marketing%20%7C%20Graphic%20Designing!5e0!3m2!1sen!2sin!4v1729401712701!5m2!1sen!2sin" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                            <form action="" id="contactform" method="POST">
                                @csrf

                            <div class="p-5 rounded contact-form">
                                <div class="mb-4">
                                    <input type="text" name="name" class="form-control border-0 py-3" placeholder="Your Name" required>
                                </div>
                                <div class="mb-4">
                                    <input type="email" name="email" class="form-control border-0 py-3" placeholder="Your Email" required>
                                </div>
                                <div class="mb-4">
                                    <input type="text" name="peoject" class="form-control border-0 py-3" placeholder="Project">
                                </div>
                                <div class="mb-4">
                                    <textarea class="w-100 form-control border-0 py-3" name="description" rows="6" cols="10" placeholder="Message" required></textarea>
                                </div>
                                <div class="text-start">
                                    <button class="btn bg-primary text-white py-3 px-5" type="save">Send Message</button>
                                </div>
                            </div>

                        </form>

                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- Contact End -->


        {{-- feedback --}}

        <div class="container-fluid py-5 mb-5">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="text-primary">Get In Touch</h5>
                    <h1 class="mb-3">Feedback</h1>
                    {{-- <p class="mb-2">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> --}}
                </div>
                <div class="contact-detail position-relative p-5">
                   
                    <div class="row g-5">
                        
                        <div class="col-lg-12 wow fadeIn" data-wow-delay=".5s">
                            <form action="" id="feedbackform" method="POST">
                                @csrf

                            <div class="p-5 rounded contact-form">
                                <div class="mb-4">
                                    <input type="text" name="name" class="form-control border-0 py-3" placeholder="Your Name" required>
                                </div>
                                <div class="mb-4">
                                    <input type="email" name="email" class="form-control border-0 py-3" placeholder="Your Email" required>
                                </div>
                                <div class="mb-4">
                                    <input type="file" name="image" class="form-control border-0 py-3" placeholder="Your Email">
                                </div>
                                <div class="mb-4">
                                    <select name="star" id="" class="form-control" required>
                                        <option value="">Select Star</option>
                                        <option value="1">1 Star</option>
                                        <option value="2">2 star</option>
                                        <option value="3">3 Star</option>
                                        <option value="4">4 Star</option>
                                        <option value="5">5 Star</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <textarea class="w-100 form-control border-0 py-3" name="description" rows="6" cols="10" placeholder="Message" required></textarea>
                                </div>
                                <div class="text-start">
                                    <button class="btn bg-primary text-white py-3 px-5" type="save">Send Message</button>
                                </div>
                            </div>

                        </form>

                        </div>
                    </div>
                </div>
            </div> 
        </div>

        {{-- feedback end --}}

        <script>

     $(document).ready(function(){

        $('#contactform').on('submit' , function(e){

            e.preventDefault();
 
            var formData = new FormData(this);

            $.ajax({
                url: "{{route('quarysave')}}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    //console.log(response);

                    if (response.status == "success") {

                        Swal.fire({
                            title: 'Success!',
                            text: 'Thank You!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });

                    }

                    if (response.status == "error") {

                        $.each(response.message, function(field, message) {
                            $('#' + field).addClass('is-invalid');
                            $('#' + field + '-error').text(message).addClass('text-danger');
                        });

                    }

                },
                error: function(xhr, status, error) {

                    console.error(xhr.responseText);

                    Swal.fire({
                        title: 'Error!',
                        text: 'There was a problem.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });

        });

        $('#feedbackform').on('submit' , function(e){

e.preventDefault();

var formData = new FormData(this);

$.ajax({
    url: "{{route('FeedbackSave')}}",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function(response) {
        //console.log(response);

        if (response.status == "success") {

            Swal.fire({
                title: 'Success!',
                text: 'Thank You!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload();
                }
            });

        }

        if (response.status == "error") {

            $.each(response.message, function(field, message) {
                $('#' + field).addClass('is-invalid');
                $('#' + field + '-error').text(message).addClass('text-danger');
            });

        }

    },
    error: function(xhr, status, error) {

        console.error(xhr.responseText);

        Swal.fire({
            title: 'Error!',
            text: 'There was a problem.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
});

});

     });

        </script>

@endsection