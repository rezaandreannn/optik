<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ $title }}| {{ config('app.name') }} </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="{{ asset('frond/vendor/glightbox/css/glightbox.min.css') }}">
    <!-- Range slider-->
    <link rel="stylesheet" href="{{ asset('frond/vendor/nouislider/nouislider.min.css') }}">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="{{ asset('frond/vendor/choices.js/public/assets/styles/choices.min.css') }}">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="{{ asset('frond/vendor/swiper/swiper-bundle.min.css') }}">
    <!-- Google fonts-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('frond/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('frond/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('frond/img/favicon.png') }}">
</head>

<body>
    <div class="page-holder">
        <!-- navbar-->
        <header class="header bg-white">
            <div class="container px-lg-3">
                <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand"
                        href="index.html"><span
                            class="fw-bold text-uppercase text-dark">{{ config('app.name') }}</span></a>
                    <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <!-- Link--><a class="nav-link" href="/">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <!-- Link--><a class="nav-link" href="{{ route('shop') }}">Belanja</a>
                            </li>
                            <li class="nav-item">
                                <!-- Link--><a class="nav-link" href="detail.html">Produk detail</a>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown"
                                    href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Pages</a>
                                <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a
                                        class="dropdown-item border-0 transition-link" href="index.html">Homepage</a><a
                                        class="dropdown-item border-0 transition-link" href="shop.html">Category</a><a
                                        class="dropdown-item border-0 transition-link" href="detail.html">Product
                                        detail</a><a class="dropdown-item border-0 transition-link"
                                        href="cart.html">Shopping cart</a><a
                                        class="dropdown-item border-0 transition-link" href="checkout.html">Checkout</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="cart.html"> <i
                                        class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart<small
                                        class="text-gray fw-normal">(2)</small></a></li>
                            {{-- <li class="nav-item"><a class="nav-link" href="#!"> <i
                                        class="far fa-heart me-1"></i><small class="text-gray fw-normal">
                                        (0)</small></a></li> --}}
                            @auth
                                <li class="nav-item"><a class="nav-link" href="#"> <i
                                            class="fas fa-user me-1 text-gray fw-normal"></i>{{ Auth::user()->name }}</a>
                                </li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        Keluar</button>
                                @else
                                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"> <i
                                                class="fas fa-user me-1 text-gray fw-normal"></i>Login</a></li>
                                @endauth
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        {{ $slot }}

        <footer class="bg-dark text-white">
            <div class="container py-4">
                <div class="row py-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <h6 class="text-uppercase mb-3">Customer services</h6>
                        <ul class="list-unstyled mb-0">
                            <li><a class="footer-link" href="#!">Help &amp; Contact Us</a></li>
                            <li><a class="footer-link" href="#!">Returns &amp; Refunds</a></li>
                            <li><a class="footer-link" href="#!">Online Stores</a></li>
                            <li><a class="footer-link" href="#!">Terms &amp; Conditions</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <h6 class="text-uppercase mb-3">Company</h6>
                        <ul class="list-unstyled mb-0">
                            <li><a class="footer-link" href="#!">What We Do</a></li>
                            <li><a class="footer-link" href="#!">Available Services</a></li>
                            <li><a class="footer-link" href="#!">Latest Posts</a></li>
                            <li><a class="footer-link" href="#!">FAQs</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-uppercase mb-3">Social media</h6>
                        <ul class="list-unstyled mb-0">
                            <li><a class="footer-link" href="#!">Twitter</a></li>
                            <li><a class="footer-link" href="#!">Instagram</a></li>
                            <li><a class="footer-link" href="#!">Tumblr</a></li>
                            <li><a class="footer-link" href="#!">Pinterest</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-top pt-4" style="border-color: #1d1d1d !important">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start">
                            <p class="small text-muted mb-0">&copy; {{ Date('Y') }} All rights reserved.</p>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor"
                                    href="https://bootstrapious.com/p/boutique-bootstrap-e-commerce-template">{{ config('app.name') }}</a>
                            </p>
                            <!-- If you want to remove the backlink, please purchase the Attribution-Free License. See details in readme.txt or license.txt. Thanks!-->
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- JavaScript files-->
        <script src="{{ asset('frond/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('frond/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('frond/vendor/nouislider/nouislider.min.js') }}"></script>
        <script src="{{ asset('frond/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('frond/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
        <script src="{{ asset('frond/js/front.js') }}"></script>
        <script>
            // ------------------------------------------------------- //
            //   Inject SVG Sprite - 
            //   see more here 
            //   https://css-tricks.com/ajaxing-svg-sprite/
            // ------------------------------------------------------ //
            function injectSvgSprite(path) {

                var ajax = new XMLHttpRequest();
                ajax.open("GET", path, true);
                ajax.send();
                ajax.onload = function(e) {
                    var div = document.createElement("div");
                    div.className = 'd-none';
                    div.innerHTML = ajax.responseText;
                    document.body.insertBefore(div, document.body.childNodes[0]);
                }
            }
            // this is set to BootstrapTemple website as you cannot 
            // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
            // while using file:// protocol
            // pls don't forget to change to your domain :)
            injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
        </script>
        <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous">
    </div>
</body>

</html>
