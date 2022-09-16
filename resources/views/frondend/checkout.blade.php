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

                    <div class="row gy-3">
                        <div class="col-md-3">Nama</div>
                        <div class="col-md-8">: {{ Auth::user()->name }}</div>
                        <div class="col-md-3">Email</div>
                        <div class="col-md-8">: {{ Auth::user()->email }}</div>
                        <div class="col-md-3">No Hp</div>
                        <div class="col-md-8">: {{ Auth::user()->no_hp }}</div>
                        @php
                            $pro = App\Models\Province::find(Auth::user()->province);
                            $city = App\Models\City::where('city_id', Auth::user()->city)->first();
                        @endphp
                        <div class="col-md-3">Provinsi</div>
                        <div class="col-md-8">: {{ $pro->title }}</div>
                        <div class="col-md-3">Kota</div>
                        <div class="col-md-8">: {{ $city->title }}</div>
                        <div class="col-md-3">Full Alamat</div>
                        <div class="col-md-8">: {{ Auth::user()->full_address }}</div>
                        <form action="{{ route('checkout') }}" method="post" class="d-inline">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Pilih Bank</label>
                                <div class="col-sm-10">
                                    <select name="bank" id="" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="1092832">BRI</option>
                                        <option value="">-- Pilih --</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Pilih Kurir</label>
                                <div class="col-sm-10">
                                    <select name="kurir" id="" class="form-control" id="kurir">
                                        <option value="" selected>-- Pilih --</option>
                                        <option value="jne">JNE</option>
                                        <option value="pos">POS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 form-group mt-2 text-md-end">
                                @if (Auth::user()->city != null)
                                    <button class="btn btn-dark" type="submit">Bayar</button>
                                @else
                                    <a href="{{ route('user.edit', Auth::user()->id) }}" class="btn btn dark">Lengkapi
                                        alamat tujuan</a>
                                @endif
                            </div>
                        </form>
                    </div>

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
                                            <input type="hidden" id="sum" value="{{ $sum }}">
                                            <td>@currency($sum)</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-end border-0">ongkos kirem</td>
                                            <td class="border-0">Rp. <span id="ongkir">0</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-end border-0">SubTotal</td>
                                            <td class="border-0">Rp. <span id="sub">0</span></td>
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

        <script>
            $('select[name="kurir"]').on('change', function() {
                let id = $(this).val();
                // alert(id)

                if (id) {
                    jQuery.ajax({
                        url: '/cek/' + id + '/ongkir',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            let sum = $('#sum').val()
                            $('#ongkir').text(data)
                            let subtotal = parseInt(sum) + parseInt(data)
                            $('#sub').text(subtotal)
                        }

                    });
                } else {

                }
            });
        </script>

        {{-- sukses --}}
        @if (session('message'))
            <script>
                toastr.error("{{ session('message') }}");
            </script>
        @endif
    @endpush
</x-frond-layout>
