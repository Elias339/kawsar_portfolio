@extends('front_end.app')
@section('content')
    <div class="main-wrapper">

        @include('front_end.includs.navbar');
        @include('front_end.includs.banner');
        @include('front_end.includs.service');
        @include('front_end.includs.project');
        @include('front_end.includs.about');


        <!-- Start Banner -->
        <div id="home" class="banner-style-two-area default-padding" style="background-image: url({{ asset('assets/front_end/img/shape/8.png') }});">

            <div class="personal-social">
                <ul>
                    <li class="facebook">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="behance">
                        <a href="#">
                            <i class="fab fa-behance"></i>
                        </a>
                    </li>
                    <li class="dribbble">
                        <a href="#">
                            <i class="fab fa-dribbble"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="author-thumb" style="background-image: url({{ asset('assets/front_end/img/illustration/5.png') }});">
            </div>

            <div class="container">
                <div class="banner-top">
                    <div class="row">
                        <div class="col-lg-7 pr-50">
                            <div class="information">
                                <div class="content">
                                    <h2>Hey <img src="{{ asset('assets/front_end/img/shape/harnd.png') }}" alt="image not found"> , I'm <br>Richard Brian</h2>
                                    <h3 class="title">
                                        <span class="header-caption" id="page-top">
                                            <!-- type headline start-->
                                            <span class="cd-headline clip is-full-width">
                                                <!-- ROTATING TEXT -->
                                                <span class="cd-words-wrapper">
                                                    <b class="is-visible">Senior Web Developer</b>
                                                    <b class="is-hidden">Professional & Expert Coder</b>
                                                    <b class="is-hidden">UI/UX Desiging Expert</b>
                                                </span>
                                            </span>
                                            <!-- type headline end -->
                                        </span>
                                    </h3>
                                    <a href="#contact" class="btn-standard mt-10 smooth-menu">My Resume</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner -->

        <!-- Start services -->
        <div id="services" class="expertise-area default-padding-top">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="heading-left mb-60">
                            <h2 class="title">Check my expertise</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="expertise-items">
                            <!-- Single item -->
                            <div class="expterise-item">
                                <div class="top">
                                    <div class="icon">
                                        <img src="{{ asset('assets/front_end/img/icon/figma.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="fun-fact">
                                        <div class="counter">
                                            <div class="timer" data-to="90" data-speed="2000">90</div>
                                            <div class="operator">%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <h4>UI / UX Design</h4>
                                </div>
                            </div>
                            <!-- End Single item -->
                            <!-- Single item -->
                            <div class="expterise-item">
                                <div class="top">
                                    <div class="icon">
                                        <img src="{{ asset('assets/front_end/img/icon/wordpress.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="fun-fact">
                                        <div class="counter">
                                            <div class="timer" data-to="87" data-speed="2000">87</div>
                                            <div class="operator">%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <h4>WordPress</h4>
                                </div>
                            </div>
                            <!-- End Single item -->
                            <!-- Single item -->
                            <div class="expterise-item">
                                <div class="top">
                                    <div class="icon">
                                        <img src="{{ asset('assets/front_end/img/icon/react.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="fun-fact">
                                        <div class="counter">
                                            <div class="timer" data-to="76" data-speed="2000">76</div>
                                            <div class="operator">%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <h4>React JS</h4>
                                </div>
                            </div>
                            <!-- End Single item -->
                            <!-- Single item -->
                            <div class="expterise-item">
                                <div class="top">
                                    <div class="icon">
                                        <img src="{{ asset('assets/front_end/img/icon/python.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="fun-fact">
                                        <div class="counter">
                                            <div class="timer" data-to="95" data-speed="2000">95</div>
                                            <div class="operator">%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <h4>Python</h4>
                                </div>
                            </div>
                            <!-- End Single item -->
                            <!-- Single item -->
                            <div class="expterise-item">
                                <div class="top">
                                    <div class="icon">
                                        <img src="{{ asset('assets/front_end/img/icon/ruby.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="fun-fact">
                                        <div class="counter">
                                            <div class="timer" data-to="78" data-speed="2000">78</div>
                                            <div class="operator">%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <h4>Ruby</h4>
                                </div>
                            </div>
                            <!-- End Single item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End  services -->

        <!-- Start project -->
        <div id="portfolio" class="project-style-one-area default-padding">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="heading-left">
                            <h2 class="title">Showcasing My Projects</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row mt--50">
                    <!-- Single Item -->
                    <div class="col-lg-6 item-center">
                        <div class="portfolio-style-one">
                            <div class="thumb-zoom">
                                <img src="{{ asset('assets/front_end/img/800x800.png') }}" alt="Image Not Found">
                            </div>
                            <div class="pf-item-info">
                                <div class="content-info">
                                    <span>Marketing</span>
                                    <h2><a href="#" data-bs-toggle="modal" data-bs-target="#projectSingleModal">Photo shooting and editing</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-lg-6 item-center">
                        <div class="portfolio-style-one">
                            <div class="thumb-zoom">
                                <img src="{{ asset('assets/front_end/img/800x800.png') }}" alt="Image Not Found">
                            </div>
                            <div class="pf-item-info">
                                <div class="content-info">
                                    <span>Creative</span>
                                    <h2><a href="#" data-bs-toggle="modal" data-bs-target="#projectSingleModal">Quality in industrial design</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-lg-6 item-center">
                        <div class="portfolio-style-one">
                            <div class="thumb-zoom">
                                <img src="{{ asset('assets/front_end/img/800x800.png') }}" alt="Image Not Found">
                            </div>
                            <div class="pf-item-info">
                                <div class="content-info">
                                    <span>Design</span>
                                    <h2><a href="#" data-bs-toggle="modal" data-bs-target="#projectSingleModal">Blue business mockup cards</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-lg-6 item-center">
                        <div class="portfolio-style-one">
                            <div class="thumb-zoom">
                                <img src="{{ asset('assets/front_end/img/800x800.png') }}" alt="Image Not Found">
                            </div>
                            <div class="pf-item-info">
                                <div class="content-info">
                                    <span>Business</span>
                                    <h2><a href="#" data-bs-toggle="modal" data-bs-target="#projectSingleModal">Simple black & white design	</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>

            <!-- Start Projects Single Modal -->
            <div class="modal fade project-details" id="projectSingleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-body">

                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="project-details-area">
                                <div class="container">
                                    <div class="project-details-items">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="project-thumb">
                                                    <img src="{{ asset('assets/front_end/img/1500x800.png') }}" alt="Thumb">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">

                                                <div class="project-details mt-60 mt-xs-30">
                                                    <div class="top-info">
                                                        <div class="row">

                                                            <div class="col-lg-5 pl-50 pl-md-15 pl-xs-15 order-lg-last">
                                                                <ul class="gallery-project-basic-info">
                                                                    <div class="info">
                                                                        <b>Tools</b>
                                                                    </div>
                                                                    <div class="mt-1">
                                                                        <img src="{{ asset('assets/front_end/img/800x600.png') }}" alt="Thumb" style="height: 50px; width: 50px;">
                                                                        Adobe Photoshop
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <img src="{{ asset('assets/front_end/img/800x600.png') }}" alt="Thumb" style="height: 50px; width: 50px;">
                                                                        Adobe Photoshop
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <img src="{{ asset('assets/front_end/img/800x600.png') }}" alt="Thumb" style="height: 50px; width: 50px;">
                                                                        Adobe Photoshop
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <img src="{{ asset('assets/front_end/img/800x600.png') }}" alt="Thumb" style="height: 50px; width: 50px;">
                                                                        Adobe Photoshop
                                                                    </div>
                                                                </ul>
                                                            </div>

                                                            <div class="col-lg-7">
                                                                <h2>The best digital solutions</h2>
                                                                <p>
                                                                    Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti
                                                                    cum vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus.
                                                                    Lectus vehicula pellentesque cras posuere tempor facilisi habitant lectus rutrum pede
                                                                    quisque hendrerit parturient posuere mauris ad elementum fringilla facilisi volutpat
                                                                    fusce pharetra felis sapien varius quisque class convallis praesent est sollicitudin
                                                                    donec nulla venenatis, cursus fermentum netus posuere sociis porta risus habitant
                                                                    malesuada nulla habitasse hymenaeos. Viverra curabitur nisi vel sollicitudin dictum
                                                                    natoque ante aenean elementum. Vulgar as hearts by garret. Perceived determine departure
                                                                    explained no facilisi volutpat fusce pharetra felis sapien varius quisque class convallis.
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="row mt-50 mt-xs-30">
                                                        <div class="col-lg-6 col-md-6">
                                                            <img src="{{ asset('assets/front_end/img/800x600.png') }}" alt="Thumb">
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 mt-xs-30">
                                                            <img src="{{ asset('assets/front_end/img/800x600.png') }}" alt="Thumb">
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
            <!-- End Projects Single Modal -->

        </div>
        <!-- End project -->

        <!-- Start About -->
        <div id="about" class="about-style-one-area default-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="about-style-two-thumb text-center">
                            <img src="{{ asset('assets/front_end/img/800x800.png') }}" alt="Image Not Found">
                            <div class="info">
                                <h3>James Baker</h3>
                                <a href ="mailto:abc@example.com">hello@ventix.me</a>
                                <p>
                                    55 Main Street, New York City
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1 mt-50">
                        <div class="about-style-one-info">
                            <h3 class="sub-title">About Me</h3>
                            <h2 class="title">I can develop <br> that help people</h2>
                            <p>
                                I'm creative designer based in USA, and I'm very passionate and dedicated to my work. Since all Weblium templates are developed on the basis of a deep study of the niche and harmoniously combine the most current trends in web design, sometimes it’s enough to simply choose a template, add your own unique content and get a beautiful website with the perfect navigation for your type of busin.
                            </p>
                            <!-- Single Item -->
                            <div class="about-item">
                                <h3><i class="fas fa-rocket"></i> Experience</h3>
                                <ul class="skill-items mt-10">
                                    <li>
                                        <div class="icon">
                                            <i class="fab fa-laravel"></i>
                                        </div>
                                        <div class="content">
                                            <span>75%</span>
                                            <h5>Object oriented programming</h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fab fa-react"></i>
                                        </div>
                                        <div class="content">
                                            <span>90%</span>
                                            <h5>Front-End with React</h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fab fa-html5"></i>
                                        </div>
                                        <div class="content">
                                            <span>89%</span>
                                            <h5>Advance frontend development</h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Single Item -->

                            <!-- Single Item -->
                            <div class="about-item">
                                <h3><i class="fas fa-graduation-cap"></i> Education</h3>
                                <ul class="education-table">
                                    <li>
                                        <h4>AS - Science &amp; Information</h4>
                                        <h5>SuperKing College</h5>
                                        <span>2001 - 2005</span>
                                        <p>
                                            The training provided by universities in order to prepare people to work in various sectors of the economy or areas of culture.
                                        </p>
                                    </li>
                                    <li>
                                        <h4>Sr. Software Engineer</h4>
                                        <h5>Google Out Tech</h5>
                                        <span>2017 - Present</span>
                                        <p>
                                            The training provided by universities in order to prepare people to work in various sectors of the economy or areas of culture.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Single Item -->

                            <!-- Single Item -->
                            <div class="about-item">
                                <h3><i class="fas fa-graduation-cap"></i> Course</h3>
                                <ul class="education-table">
                                    <li>
                                        <h4>AS - Science &amp; Information</h4>
                                        <h5>SuperKing College</h5>
                                        <span>2001 - 2005</span>
                                        <p>
                                            The training provided by universities in order to prepare people to work in various sectors of the economy or areas of culture.
                                        </p>
                                    </li>
                                    <li>
                                        <h4>Sr. Software Engineer</h4>
                                        <h5>Google Out Tech</h5>
                                        <span>2017 - Present</span>
                                        <p>
                                            The training provided by universities in order to prepare people to work in various sectors of the economy or areas of culture.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Single Item -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About -->

        <!-- Start Contact -->
        <div id="contact" class="contact-area contact-page overflow-hidden default-padding" style="background-image: url({{ asset('assets/front_end/img/shape/map-light.png') }});">
            <div class="container">
                <div class="row">

                    <div class="col-tact-stye-one col-lg-5 pr-50 pr-md-15 pr-xs-15">
                        <div class="contact-style-one-info">
                            <div class="top-info">
                                <h2 class="gradient-text">Let's Talk</h2>
                                <div class="call">
                                    <img src="{{ asset('assets/front_end/img/icon/call.png') }}" alt="Image not Found">
                                    <a class="phone-link" href="tel:+4733378901">+4733378901</a>
                                </div>
                            </div>
                            <ul class="contact-address">
                                <li>
                                    <div class="info">
                                        <h4>Location</h4>
                                        <p>
                                            55 Main Street, The Grand Avenue <br> 2nd Block, New York City
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <h4>Official Email</h4>
                                        <a href="mailto:info@digital.com.com">info@digital.com</a>
                                    </div>
                                </li>
                            </ul>
                            <p class="copyright">
                                &copy; 2023 Ventix. All Rights Reserved
                            </p>
                        </div>
                    </div>

                    <div class="col-tact-stye-one col-lg-7 pl-60 pl-md-15 pl-xs-15 mt-md-50 mt-xs-50">
                        <div class="contact-form-style-one">
                            <form action="{{ asset('assets/front_end/mail/contact.php') }}" method="POST" class="contact-form contact-form mt-30">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group comments">
                                            <textarea class="form-control" id="comments" name="comments" placeholder="Tell Us About Project *"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" name="submit" id="submit">
                                            <i class="fa fa-paper-plane"></i> Get in Touch
                                        </button>
                                    </div>
                                </div>
                                <!-- Alert Message -->
                                <div class="col-lg-12 alert-notification">
                                    <div id="message" class="alert-msg"></div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Signle Item -->
    </div>
@endsection
