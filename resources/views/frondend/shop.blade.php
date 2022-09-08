<x-frond-layout title="Belanja">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light" style="margin-top: 80px">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Belanja Lebih Asyik😊</h1>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                            <li class="breadcrumb-item"><a class="text-dark" href="/">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Belanja</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container p-0">
            <div class="row">
                <!-- SHOP SIDEBAR-->
                <div class="col-lg-3 order-2 order-lg-1">
                    <h5 class="text-uppercase mb-4">Kategori</h5>
                    <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase fw-bold">Fashion
                        </strong></div>
                    <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                        @foreach ($categories as $category)
                            <li class="mb-2"><a class="reset-anchor text-decoration-none text-muted"
                                    href="#!">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>


                </div>
                <!-- SHOP LISTING-->
                <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-6 mb-2 mb-lg-0">
                            {{-- <p class="text-sm text-muted mb-0">Showing 1–12 of 53 results</p> --}}
                        </div>
                        <div class="col-lg-6">
                            {{-- <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                                <li class="list-inline-item">
                                    <select class="selectpicker" data-customclass="form-control form-control-sm">
                                        <option value>Sort By </option>
                                        <option value="default">Default sorting </option>
                                        <option value="popularity">Popularity </option>
                                        <option value="low-high">Price: Low to High </option>
                                        <option value="high-low">Price: High to Low </option>
                                    </select>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                    <div class="row">
                        <!-- PRODUCT-->
                        @foreach ($products as $product)
                            <div class="col-md-6 col-lg-4 col-xl-3 p-2 {{ $product->name }}">
                                <div class="collection-img position-relative">
                                    <a href="{{ route('product.detail', $product->id) }}">
                                        <img src="{{ asset('storage/' . $product->photo) }}" class="w-100 img-fluid">
                                    </a>
                                </div>
                                <div class="text-center">
                                    <p class="text-capitalize my-2">
                                        @currency($product->price)
                                        <a href="#" class="badge bg-primary border-0 text-decoration-none"
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $product->id }}">detail</a>
                                    </p>

                                    <p>{{ $product->name }} - {{ $product->description }}</p>
                                    <span class="fw-bold">
                                        <div class="row">
                                            <form action="{{ route('order.store', $product->id) }}" method="post"
                                                class="list-inline-item m-0 p-0">
                                                @csrf
                                                <button class="btn bg-primary rounded-0 text-white" type="submit">
                                                    Tambah keranjang</button>
                                            </form>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    @foreach ($products as $product)
        <div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail : {{ $product->name }} - @currency($product->price)
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="special-img position-relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $product->photo) }}" class="w-100">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <p>
                                    <span class="fw-bold">Kategori</span> <br><span
                                        class="text-muted">{{ $product->category->name }}</span>
                                </p>
                                <hr>
                                <p>
                                    <span class="fw-bold">Deskripsi</span> <br><span
                                        class="text-muted">{{ $product->description }}</span>
                                </p>

                            </div>
                            <div class="row">
                                <form method="post" action="{{ route('order.store', $product->id) }}"
                                    class="d-inline">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="qty" class="col-sm-2 col-form-label">Jumlah</label>
                                        <div class="col-sm-10">
                                            <div class="input-group mb-3">
                                                <input type="number" name="qty" class="form-control"
                                                    aria-describedby="qty" min="1" value="1"
                                                    max="{{ $product->qty }}">
                                                <div class="input-group-append">
                                                    <button class="btn bg-primary rounded-0 text-white" type="submit"
                                                        id="qty">Tambah Ke Keranjang</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="badge bg-primary border-0" data-bs-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @push('scripts')
        {{-- sukses --}}
        @if (session('message'))
            <script>
                toastr.success("{{ session('message') }}");
            </script>
        @endif

        {{-- fail --}}
        @if (session('failed'))
            <script>
                toastr.error("{{ session('failed') }}");
            </script>
        @endif
    @endpush

</x-frond-layout>
