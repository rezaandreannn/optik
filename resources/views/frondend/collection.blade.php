<x-frond-layout title="Beranda">
    <x-corousel />

    <!-- collection -->
    <section id="collection" class="">
        <div class="container">
            <div class="title text-center">
                <h2 class="position-relative d-inline-block">Produk Kami</h2>
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-12 col-md-6">
                        <form action="" method="get">
                            <div class="input-group mb-3 mt-2">
                                <input type="text" class="form-control" name="search" placeholder="Cari nama Produk"
                                    @if (request('search')) value="{{ request('search') }}" @endif>
                                <button class="btn bg-primary text-white border-0" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row g-0">


                @forelse ($products as $product)
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
                                    data-bs-toggle="modal" data-bs-target="#exampleModal{{ $product->id }}">detail</a>
                            </p>

                            <p>{{ $product->name }} - {{ $product->description }}</p>
                            <span class="fw-bold">
                                <div class="row">
                                    <form action="{{ route('order.store', $product->id) }}" method="post"
                                        class="list-inline-item m-0 p-0">
                                        @csrf
                                        <button class="btn bg-primary rounded-0 text-white" type="submit">
                                            Tambah Ke Keranjang</button>
                                    </form>
                                </div>
                            </span>
                        </div>
                    </div>
                @empty
                    <h5 class="text-center">Data Tidak ada. </h5>
                @endforelse
                <div class="row d-flex ">

                    <div class="col justify-content-center">


                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
    </section>
    <!-- end of collection -->



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
