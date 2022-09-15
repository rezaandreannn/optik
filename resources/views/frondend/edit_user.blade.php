<x-frond-layout title="alamat">
    <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light" style="margin-top: 90px">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Atur alamat pengiriman</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-1">
            {{-- <h2 class="h5 text-uppercase">Rincian Penagihan</h2> --}}
            <div class="row">
                <div class="col-lg-7">
                    <form action="{{ route('user.update', $user->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="row gy-3">
                            <div class="col-lg-6">
                                <label class="form-label text-sm text-uppercase" for="name">Nama</label>
                                <input class="form-control form-control-lg" type="text" id="name"
                                    value="{{ Auth::user()->name }}" disabled>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label text-sm text-uppercase" for="email">Email </label>
                                <input class="form-control form-control-lg" type="email" id="email"
                                    value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label text-sm text-uppercase" for="phone">No hp</label>
                                <input class="form-control form-control-lg" type="tel" id="phone" name="no_hp"
                                    value="{{ old('no_hp', $user->no_hp) }}">
                            </div>
                            <div class="col-lg-12 form-group">
                                <label class="form-label text-sm text-uppercase" for="province">provinsi</label>
                                <select class="province form-select" id="province" name="province">
                                    @foreach ($provinces as $province => $value)
                                        @if ($province == $user->province)
                                            <option value="{{ $province }}" selected>{{ $value }}
                                            </option>
                                        @else
                                            <option value="{{ $province }}">{{ $value }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label class="form-label text-sm text-uppercase" for="city">Kota</label>
                                <select class="city form-select" id="city" name="city">
                                    @php
                                        
                                        $cities = App\Models\City::where('province_id', $user->province)->pluck('title', 'city_id');
                                        
                                    @endphp
                                    @if ($user->city)
                                        @foreach ($cities as $city => $value)
                                            @if ($city == $user->city)
                                                <option value="{{ $city }}" selected>{{ $value }}
                                                </option>
                                            @else
                                                <option value="{{ $city }}">{{ $value }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value>kota</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label text-sm text-uppercase" for="full_address">alamat
                                    Lengkap</label>
                                <textarea class="form-control" name="full_address" id="floatingTextarea">{{ old('full_address', $user->full_address) }}</textarea>
                            </div>
                            <div class="col-lg-12 form-group">
                                <button class="btn btn-dark rounded-0 text-white border-0" type="submit"
                                    style="background-color: blueviolet">Simpan</button>
                            </div>
                    </form>
                </div>


            </div>
        </section>
    </div>


    @push('scripts')
        <script>
            $('select[name="province"]').on('change', function() {
                let provinceId = $(this).val();
                // alert(provinceId)
                if (provinceId) {
                    jQuery.ajax({
                        url: '/kota/' + provinceId + '/city',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="city"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="city"]').append('<option value="' + key + '">' +
                                    value +
                                    '</option>')
                            });
                        }

                    });
                } else {
                    $('select[name="city"]').empty();
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
