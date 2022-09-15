<x-frond-layout title="Keranjang-belanja">
    <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Keranjang</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4">Keranjang Belanja</h2>
            <div class="row">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <!-- CART TABLE-->
                    <div class="table-responsive mb-4">
                        <table class="table text-nowrap">
                            <thead class="bg-light">

                                <tr>
                                    <th class="border-0 p-3" scope="col"> <strong
                                            class="text-sm text-uppercase">Produk</strong></th>
                                    <th class="border-0 p-3" scope="col"> <strong
                                            class="text-sm text-uppercase">Harga</strong></th>
                                    <th class="border-0 p-3" scope="col"> <strong
                                            class="text-sm text-uppercase">Jumlah</strong></th>
                                    <th class="border-0 p-3" scope="col"> <strong
                                            class="text-sm text-uppercase">Total</strong></th>
                                    <th class="border-0 p-3" scope="col"> <strong
                                            class="text-sm text-uppercase"></strong></th>
                                </tr>
                            </thead>
                            <tbody class="border-0">
                                @php
                                    $sum = 0;
                                    $qty = 0;
                                @endphp
                                @foreach ($orders as $order)
                                    @php
                                        $total = $order->product->price * $order->qty;
                                        $sum += $total;
                                        $qty += $order->qty;
                                    @endphp
                                    <tr>
                                        <th class="ps-0 py-3 border-light" scope="row">
                                            <div class="d-flex align-items-center"><a
                                                    class="reset-anchor d-block animsition-link"
                                                    href="{{ route('product.detail', $order->product->id) }}"><img
                                                        src="{{ asset('storage/' . $order->product->photo) }}"
                                                        alt="..." width="70" /></a>
                                                <div class="ms-3"><strong class="h6"><a
                                                            class="reset-anchor animsition-link"
                                                            href="{{ route('product.detail', $order->product->id) }}">{{ $order->product->name }}</a></strong>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="p-3 align-middle border-light">
                                            <p class="mb-0 small">@currency($order->product->price)</p>
                                        </td>
                                        <td class="p-3 align-middle border-light">
                                            <p class="mb-0 small">{{ $order->qty }}</p>
                                        </td>
                                        <td class="p-3 align-middle border-light">
                                            <p class="mb-0 small">@currency($total)</p>
                                        </td>
                                        <td class="p-3 align-middle border-light">
                                            <form action="{{ route('order.destroy', $order->id) }}" method="POST"
                                                class="reset-anchor">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="text-decoration-none border-0">
                                                    <i class="fas fa-trash-alt small text-muted"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- CART NAV-->
                    <div class="bg-light px-4 py-3">
                        <div class="row align-items-center text-center">
                            <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn bg-primary btn-sm text-white"
                                    href="{{ route('shop') }}"><i class="fas fa-long-arrow-alt-left me-2"> </i>Lanjut
                                    Belanja</a>
                            </div>
                            <div class="col-md-6 text-md-end">
                                @if ($orders->count() >= 1)
                                    <a class="btn btn-success btn-sm" href="{{ route('checkout.index') }}">Proses
                                        Pembayaran<i class="fas fa-long-arrow-alt-right ms-2"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ORDER TOTAL-->
                <div class="col-lg-4">
                    <div class="card border-0 rounded-0 p-lg-4 bg-light">
                        <div class="card-body">
                            <h5 class="text-uppercase mb-4">Ringkasan Belanja</h5>
                            <ul class="list-unstyled mb-0">

                                <li class="d-flex align-items-center justify-content-between"><strong
                                        class="text-uppercase small font-weight-bold">total Harga ({{ $qty }}
                                        Barang)</strong><span class="text-muted small">@currency($sum)</span>
                                </li>
                                <li class="border-bottom my-2"></li>
                                <li class="d-flex align-items-center justify-content-between mb-4"><strong
                                        class="text-uppercase small font-weight-bold">Subtotal</strong><span>@currency($sum)</span>
                                </li>
                                <li>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
        {{-- sukses --}}
        @if (session('message'))
            <script>
                toastr.error("{{ session('message') }}");
            </script>
        @endif
    @endpush
</x-frond-layout>
