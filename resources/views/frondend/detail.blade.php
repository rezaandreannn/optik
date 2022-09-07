<x-frond-layout title="Detail-Produk">
    <section class="py-5" style="margin-top: 100px">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6">
                    <!-- PRODUCT SLIDER-->
                    <div class="row m-sm-0">
                        <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
                            <div class="swiper product-slider-thumbs">
                                <div class="swiper-wrapper">
                                    {{-- <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100"
                                            src="img/product-detail-1.jpg" alt="..."></div>
                                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100"
                                            src="img/product-detail-2.jpg" alt="..."></div>
                                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100"
                                            src="img/product-detail-3.jpg" alt="..."></div>
                                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100"
                                            src="img/product-detail-4.jpg" alt="..."></div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10 order-1 order-sm-2">
                            <div class="swiper product-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide h-auto"><a class="glightbox product-view"
                                            href="img/product-detail-1.jpg" data-gallery="gallery2"
                                            data-glightbox="Product item 1"><img class="img-fluid"
                                                src="{{ asset('storage/' . $product->photo) }}" alt="..."></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT DETAILS-->
                <div class="col-lg-6">
                    <h1>{{ $product->name }}</h1>
                    <p class="text-muted lead">@currency($product->price)</p>
                    <p class="text-sm mb-4">{!! $product->description !!}</p>
                    <div class="row align-items-stretch mb-4">
                        <form action="{{ route('order.store', $product->id) }}" method="get">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="number" name="qty" class="form-control" aria-describedby="qty"
                                    min="1" value="1" max="{{ $product->qty }}">
                                <div class="input-group-append">
                                    <button class="btn bg-primary rounded-0 text-white" type="submit"
                                        id="qty">Tambah Ke Keranjang</button>
                                </div>
                            </div>
                        </form>
                        <ul class="list-unstyled small d-inline-block">
                            <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">Stok</strong><span
                                    class="ms-2 text-muted">{{ $product->qty }}</span></li>
                            <li class="px-3 py-2 mb-1 bg-white text-muted"><strong
                                    class="text-uppercase text-dark">Kategori : </strong><a
                                    class="reset-anchor ms-2 text-decoration-none text-muted"
                                    href="#!">{{ $product->category->name }}</a></li>
                        </ul>
                    </div>
                </div>
                <!-- DETAILS TABS-->
                {{-- <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                    <li class="nav-item"><a class="nav-link text-uppercase active" id="description-tab"
                            data-bs-toggle="tab" href="#description" role="tab" aria-controls="description"
                            aria-selected="true">Deskripsi</a></li>

                </ul> --}}
                <div class="tab-content mb-5" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                        aria-labelledby="description-tab">
                        <div class="p-4 p-lg-5 bg-white">
                            <h6 class="text-uppercase">Produk deskripsi </h6>
                            <p class="text-muted text-sm mb-0">{!! $product->description !!}</p>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="p-4 p-lg-5 bg-white">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="img/customer-1.png"
                                                alt="" width="50" /></div>
                                        <div class="ms-3 flex-shrink-1">
                                            <h6 class="mb-0 text-uppercase">Jason Doe</h6>
                                            <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                                            <ul class="list-inline mb-1 text-xs">
                                                <li class="list-inline-item m-0"><i
                                                        class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item m-0"><i
                                                        class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item m-0"><i
                                                        class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item m-0"><i
                                                        class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item m-0"><i
                                                        class="fas fa-star-half-alt text-warning"></i>
                                                </li>
                                            </ul>
                                            <p class="text-sm mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing
                                                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0"><img class="rounded-circle"
                                                src="img/customer-2.png" alt="" width="50" /></div>
                                        <div class="ms-3 flex-shrink-1">
                                            <h6 class="mb-0 text-uppercase">Jane Doe</h6>
                                            <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                                            <ul class="list-inline mb-1 text-xs">
                                                <li class="list-inline-item m-0"><i
                                                        class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item m-0"><i
                                                        class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item m-0"><i
                                                        class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item m-0"><i
                                                        class="fas fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item m-0"><i
                                                        class="fas fa-star-half-alt text-warning"></i>
                                                </li>
                                            </ul>
                                            <p class="text-sm mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing
                                                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!-- RELATED PRODUCTS-->
                <h2 class="h5 text-uppercase mb-4">
                    PRODUK-PRODUK TERKAIT</h2>
                @php
                    $relasi_product = App\Models\Product::where('category_id', $product->category_id)
                        ->where('name', '!=', $product->name)
                        ->limit(4)
                        ->get();
                @endphp
                <div class="row">
                    <!-- PRODUCT-->
                    @foreach ($relasi_product as $relasi)
                        <div class="col-lg-3 col-sm-6">
                            <div class="product text-center skel-loader">
                                <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.html"><img
                                            class="img-fluid w-100" src="{{ asset('storage/' . $relasi->photo) }}"
                                            alt="{{ $relasi->name }}"></a>
                                    <div class="product-overlay">
                                        <ul class="mb-0 list-inline">
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark"
                                                    href="#!"><i class="far fa-heart"></i></a></li>
                                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark"
                                                    href="#!">Tambah ke keranjang</a></li>
                                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark"
                                                    href="#productView" data-bs-toggle="modal"><i
                                                        class="fas fa-expand"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h6> <a class="reset-anchor" href="detail.html">{{ $relasi->name }}</a></h6>
                                <p class="small text-muted">@currency($relasi->price)</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>
</x-frond-layout>
