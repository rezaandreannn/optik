<x-frond-layout title="Keranjang-belanja">
    <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light" style="margin-top: 90px">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Pembayaran</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                <li class="breadcrumb-item"><a class="text-dark" href="/">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Keranjang</li>
                                <li class="breadcrumb-item active" aria-current="page">pembayaran</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4">Rincian Penagihan</h2>
            <div class="row">
                <div class="col-lg-7">
                    <form action="#">
                        <div class="row gy-3">
                            <div class="col-lg-6">
                                <label class="form-label text-sm text-uppercase" for="name">Nama</label>
                                <input class="form-control form-control-lg" type="text" id="name"
                                    value="{{ Auth::user()->name }}" disabled>
                            </div>
                            {{-- <div class="col-lg-6">
                                <label class="form-label text-sm text-uppercase" for="lastName">Last name </label>
                                <input class="form-control form-control-lg" type="text" id="lastName"
                                    placeholder="Enter your last name">
                            </div> --}}
                            <div class="col-lg-6">
                                <label class="form-label text-sm text-uppercase" for="email">Email </label>
                                <input class="form-control form-control-lg" type="email" id="email"
                                    value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label text-sm text-uppercase" for="phone">Phone number </label>
                                <input class="form-control form-control-lg" type="tel" id="phone"
                                    placeholder="e.g. +02 245354745">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label text-sm text-uppercase" for="company">Company name (optional)
                                </label>
                                <input class="form-control form-control-lg" type="text" id="company"
                                    placeholder="Your company name">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="form-label text-sm text-uppercase" for="country">Country</label>
                                <select class="country" id="country"
                                    data-customclass="form-control form-control-lg rounded-0">
                                    <option value>Choose your country</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label text-sm text-uppercase" for="address">Address line 1 </label>
                                <input class="form-control form-control-lg" type="text" id="address"
                                    placeholder="House number and street name">
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label text-sm text-uppercase" for="addressalt">Address line 2
                                </label>
                                <input class="form-control form-control-lg" type="text" id="addressalt"
                                    placeholder="Apartment, Suite, Unit, etc (optional)">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label text-sm text-uppercase" for="city">Town/City </label>
                                <input class="form-control form-control-lg" type="text" id="city">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label text-sm text-uppercase" for="state">State/County </label>
                                <input class="form-control form-control-lg" type="text" id="state">
                            </div>

                            <div class="col-lg-12 form-group">
                                <button class="btn btn-dark" type="submit">Place order</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- ORDER SUMMARY-->
                <div class="col-lg-5">
                    <div class="card border-0 rounded-0 p-lg-4 bg-light">
                        <div class="card-body">
                            <h5 class="text-uppercase mb-4">Produk Detail</h5>
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
                                                    <div class="d-flex align-items-center">
                                                        <a class="reset-anchor d-block animsition-link"
                                                            href="{{ route('product.detail', $order->product->id) }}"><img
                                                                src="{{ asset('storage/' . $order->product->photo) }}"
                                                                alt="..." width="70" /></a>
                                                        {{-- <div class="ms-3"><strong class="h6"><a
                                                                    class="reset-anchor animsition-link"
                                                                    href="{{ route('product.detail', $order->product->id) }}">{{ $order->product->name }}</a></strong>
                                                        </div> --}}
                                                    </div>
                                                </th>
                                                <td class="p-3 align-middle border-light">
                                                    <p class="mb-0 small">@currency($order->product->price)</p>
                                                </td>
                                                <td class="p-3 align-middle border-light">
                                                    <p class="mb-0 small">{{ $order->qty }}</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2" class="text-end">Total</td>
                                            <td>@currency($sum)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
