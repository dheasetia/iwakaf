<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> iSalam Wakaf </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/favicons/apple-touch-icon.png')}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/favicons/favicon-32x32.png')}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicons/favicon-16x16.png')}}" />
    <link rel="manifest" href="{{asset('assets/images/favicons/site.webmanifest')}}" />
    <meta name="description" content="iSalam Wakaf " />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/animate/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/animate/custom-animate.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/fontawesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/jarallax/jarallax.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/nouislider/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/nouislider/nouislider.pips.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/odometer/odometer.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/swiper/swiper.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/oxpins-icons/style.')}}css">
    <link rel="stylesheet" href="{{asset('assets/vendors/tiny-slider/tiny-slider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/reey-font/stylesheet.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/bxslider/jquery.bxslider.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-select/css/bootstrap-select.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/vegas/vegas.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/timepicker/timePicker.css')}}" />

    <!-- template styles -->
    <link rel="stylesheet" href="{{asset('assets/css/oxpins.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/oxpins-responsive.css')}}" />
    @yield('styles')
</head>

<body class="custom-cursor">

<div class="custom-cursor__cursor"></div>
<div class="custom-cursor__cursor-two"></div>





<div class="preloader">
    <div class="preloader__image"></div>
</div>
<!-- /.preloader -->


<div class="page-wrapper">
    <header class="main-header">
        <nav class="main-menu">
            <div class="main-menu__wrapper">
                <div class="main-menu__wrapper-inner">
                    <div class="main-menu__left">
                        <div class="main-menu__logo">
                            <a href="{{url('/')}}"><img src="{{asset('assets/images/resources/logo-1.png')}}" alt=""></a>
                        </div>
                        <div class="main-menu__shape-1 float-bob-x" style="bottom: -12px; right:-166px;">
                            <img src="{{asset('assets/images/shapes/main-menu-shape-1.png')}}" alt="">
                        </div>
                    </div>
                    <div class="main-menu__right">
                        <div class="main-menu__right-top">
                            <div class="main-menu__right-top-left">
                                <div class="main-menu__volunteers">
                                    <div class="main-menu__volunteers-icon">
                                        <img src="{{asset('assets/images/icon/main-menu-heart-icon.png')}}" alt="">
                                    </div>
                                    <div class="main-menu__volunteers-text-box">
                                        <p class="main-menu__volunteers-text"><a href="{{url('pages/become_volunteer')}}">Jadi <span>Relawan</span></a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="main-menu__right-top-right">
                                <div class="main-menu__right-top-address">
                                    <ul class="list-unstyled main-menu__right-top-address-list">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-phone-call"></span>
                                            </div>
                                            <div class="content">
                                                <p>Phone</p>
                                                <h5><a href="tel:6281328921421">+ 62 813-2892-1421</a></h5>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-message"></span>
                                            </div>
                                            <div class="content">
                                                <p>Email</p>
                                                <h5><a href="mailto:admin@isalam.org">admin@isalam.org</a>
                                                </h5>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-location"></span>
                                            </div>
                                            <div class="content">
                                                <p>
                                                    Jl. Gunung Lompobattang No. 56
                                                </p>
                                                <h5>Makassar</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="main-menu__right-bottom">
                            <div class="main-menu__main-menu-box">
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                <ul class="main-menu__list">
                                    <li class="dropdown current">
                                        <a href="{{url('/')}}">Home </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="{{url('/about_us')}}">iSalam Wakaf</a>
                                        <ul>
                                            <li><a href="{{url('/about_us')}}">Tentang iSalam Wakaf</a></li>
                                            <li><a href="{{url('/vision')}}">Visi</a></li>
                                            <li><a href="{{url('/mission')}}">Misi</a></li>
                                            <li><a href="{{url('/volunteer')}}">Relawan</a></li>
                                            <li><a href="{{url('/gallery')}}">Gallery</a></li>
                                            <li><a href="{{url('/faq')}}">FAQs</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="{{url('/projects')}}">Wakaf</a>
                                        <ul>
                                            <li><a href="{{url('/projects')}}">Program Wakaf</a></li>
                                            <li><a href="{{url('/donate_now')}}">Donasi Sekarang</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{url('/events')}}">Kegiatan</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/news')}}">Berita</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/contact')}}">Kontak</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="main-menu__main-menu-content-box">
                                <div class="main-menu__search-cat-btn-box">
                                    <div class="main-menu__search-box">
                                        <a href="#"
                                           class="main-menu__search search-toggler icon-magnifying-glass"></a>
                                    </div>
                                    <div class="main-menu__cat-box">
                                        <a href="#" class="main-menu__cart icon-avatar"></a>
                                    </div>
                                    <div class="main-menu__btn-box">
                                        <a href="{{url('/donate_now')}}" class="main-menu__btn"> <span
                                                class="fa fa-donate"></span> Wakaf
                                            sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->

    @yield('content')

    <!--Site Footer Start-->
    <footer class="site-footer">
        <div class="site-footer-bg" style="background-image: url({{asset('assets/images/backgrounds/site-footer-bg.jpg')}});">
        </div>
        <div class="site-footer__top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="footer-widget__column footer-widget__about">
                            <div class="footer-widget__about-logo">
                                <a href="index.html"><img src="{{asset('assets/images/resources/footer-logo.png')}}" alt=""></a>
                            </div>
                            <div class="footer-widget__about-text-box">
                                <p class="footer-widget__about-text">Nulla ultricies justo sit amet ante efficitur,
                                    eget pharetra augue efficitur. Vestibulum viverra, dolor sit amet ultricies.</p>
                            </div>
                            <div class="footer-widget__btn">
                                <a href="donate-now.html"> <span class="fa fa-heart"></span>Donate now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="footer-widget__column footer-widget__links clearfix">
                            <h3 class="footer-widget__title">Links</h3>
                            <ul class="footer-widget__links-list list-unstyled clearfix">
                                <li><a href="about.html">About us</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="news.html">Latest News</a></li>
                                <li><a href="event-details.html">Recent Events</a></li>
                                <li><a href="donation.html">Donations</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                        <div class="footer-widget__column footer-widget__non-profit clearfix">
                            <h3 class="footer-widget__title">Non profit</h3>
                            <ul class="footer-widget__non-profit-list list-unstyled clearfix">
                                <li>
                                    <a href="donation-details.html">Differently Abled Kids</a>
                                </li>
                                <li>
                                    <a href="donation-details.html">Help Child Cancer</a>
                                </li>
                                <li>
                                    <a href="donation-details.html">Clean Pure Water</a>
                                </li>
                                <li>
                                    <a href="donation-details.html">Give them Education</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div class="footer-widget__column footer-widget__contact">
                            <h3 class="footer-widget__title">Contact</h3>
                            <p class="footer-widget__contact-text">380 Street Kilda Broklyn Road <br> Melbourne
                                Australia
                            </p>
                            <ul class="list-unstyled footer-widget__contact-list">
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="text">
                                        <p><a href="mailto:needhelp@company.com ">needhelp@company.com</a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="text">
                                        <p><a href="tel:980009630">+ 98 (000) - 9630</a></p>
                                    </div>
                                </li>
                            </ul>
                            <div class="site-footer__social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-footer__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="site-footer__bottom-inner">
                            <p class="site-footer__bottom-text">© All Copyright 2022 by <a href="#">Oxpins.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--Site Footer End-->


</div>

<!-- /.page-wrapper -->
<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="index.html" aria-label="logo image"><img src="{{asset('assets/images/resources/logo-2.png')}}" width="143"
                                                              alt="" /></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:needhelp@packageName__.com">needhelp@oxpins.com</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:666-888-0000">666 888 0000</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-facebook-square"></a>
                <a href="#" class="fab fa-pinterest-p"></a>
                <a href="#" class="fab fa-instagram"></a>
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->



    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->

<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
        <form action="#">
            <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
            <input type="text" id="search" placeholder="Search Here..." />
            <button type="submit" aria-label="search submit" class="thm-btn">
                <i class="icon-magnifying-glass"></i>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->

<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-up-arrow"></i></a>


<script src="{{asset('assets/vendors/jquery/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendors/jarallax/jarallax.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-appear/jquery.appear.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-validate/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/vendors/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('assets/vendors/odometer/odometer.min.js')}}"></script>
<script src="{{asset('assets/vendors/swiper/swiper.min.js')}}"></script>
<script src="{{asset('assets/vendors/tiny-slider/tiny-slider.min.js')}}"></script>
<script src="{{asset('assets/vendors/wnumb/wNumb.min.js')}}"></script>
<script src="{{asset('assets/vendors/wow/wow.js')}}"></script>
<script src="{{asset('assets/vendors/isotope/isotope.js')}}"></script>
<script src="{{asset('assets/vendors/countdown/countdown.min.js')}}"></script>
<script src="{{asset('assets/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/vendors/bxslider/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/vendors/vegas/vegas.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{asset('assets/vendors/timepicker/timePicker.js')}}"></script>
<script src="{{asset('assets/vendors/circleType/jquery.circleType.js')}}"></script>
<script src="{{asset('assets/vendors/circleType/jquery.lettering.min.js')}}"></script>

<!-- template js -->
<script src="{{asset('assets/js/oxpins.js')}}"></script>
@yield('scripts')
</body>

</html>
