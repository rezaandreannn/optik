<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | {{ $title }}</title>
    {{-- faicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/guest/images/logo.ico') }}">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/guest/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    {{-- toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('assets/guest/css/main.css') }}">

</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="/">
                {{-- <img src="{{ asset('assets/guest/images/title.jpeg') }}" alt="site icon"> --}}
                <span class="text-uppercase fw-lighter ms-2 judul">surya jaya metro</span>
            </a>

            <div class="order-lg-2 nav-btns">
                @auth
                    @php
                        $cart = App\Models\Order::where('user_id', Auth::user()->id)
                            ->where('status', 'pending')
                            ->get();
                    @endphp
                    <a href="{{ route('order.index') }}" class="text-decoration-none me-4">
                        <button type="button" class="btn position-relative">
                            <i class="fa fa-shopping-cart"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge bg-primary">{{ $cart->count() }}</span>
                        </button>
                    </a>
                    <form action="{{ route('logout') }}" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="ml-5 btn btn-danger">Keluar</button>
                    </form>

                    {{-- <a href="{{ route('login') }}" class="ml-5 btn btn-success">
                        Masuk
                    </a> --}}
                @else
                    {{-- <a href="{{ route('order.index') }}" class="text-decoration-none me-4">
                        <button type="button" class="btn position-relative">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge bg-primary">5</span>
                        </button>
                    </a> --}}
                    <a href="{{ route('login') }}" class="ml-5 btn btn-success">
                        Masuk
                    </a>
                @endauth
            </div>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="{{ route('beranda') }}">beranda</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="{{ route('shop') }}">Kategori</a>
                    </li>
                    @auth
                        <li class="nav-item px-2 py-2">
                            <a class="nav-link text-uppercase text-dark" href="{{ route('histori.index') }}">Histori</a>
                        </li>

                    @endauth
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="/about">Tentang kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->



    <!-- about us -->
    {{ $slot }}
    <!-- end of about us -->





    <!-- footer -->
    <footer class="bg-dark py-5">
        <div class="container">
            <div class="row text-white g-4">
                <div class="col-md-6 col-lg-3">
                    <a class="text-uppercase text-decoration-none brand text-white"
                        href="index.html">{{ config('app.name') }}</a>
                    <p class="text-white text-muted mt-3">Senantiasa berusaha untuk mencapai yang terbaik dalam Optik
                        kacamata, dan memberi manfaat bagi Masyarakat luas dalam menciptakan lapangan Pekerjaan baru
                        serta menyediakan frame kacamata yang baik, sesuai kebutuhan konsumen dengan harga terjangkau.
                    </p>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light">Tautan</h5>
                    <ul class="list-unstyled">
                        <li class="my-3">
                            <a href="{{ route('beranda') }}" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Beranda
                            </a>
                        </li>

                        <li class="my-3">
                            <a href="" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Tentang kami
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Kontak kami
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light mb-3">Kontak</h5>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-map-marked-alt"></i>
                        </span>
                        <span class="fw-light">
                            di Jl. Imam Bonjol No 19 Hadimulyo Barat Metro, Kelurahan Hadimulyo Barat, Kecamatan Metro
                            Pusat Kota Metro, Provinsi Lampung.
                        </span>
                    </div>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="fw-light">
                            optiksuryajayametro@gmail.com
                        </span>
                    </div>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-phone-alt"></i>
                        </span>
                        <span class="fw-light">
                            0812-7232-1704
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light mb-3">Ikuti kami</h5>
                    <div>
                        <ul class="list-unstyled d-flex">
                            <li>
                                <a href="https://www.facebook.com/optik.suryajaya"
                                    class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/optik.suryajaya.metro/?hl=id"
                                    class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end of footer -->




    <!-- jquery -->
    <script src="{{ asset('assets/guest/js/jquery-3.6.0.js') }}"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('assets/guest/bootstrap-5.0.2-dist/js/bootstrap.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('assets/guest/js/script.js') }}"></script>

    {{-- toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- custom scripts --}}
    @stack('scripts')
</body>

</html>
