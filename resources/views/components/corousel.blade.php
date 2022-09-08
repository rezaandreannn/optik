<header id="header" class="vh-90 carousel slide" data-bs-ride="carousel">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('assets/guest/images/title.jpeg') }}" alt="" height="400px" width="400px">
            </div>
            <div class="col-md-6 mt-5">
                <br>
                <br>
                <h2 class="mt-5">Selamat datang,</h2>
                <div class="row">
                    <div class="col-md-3 mt-2">
                        <h5 class="text-uppercase">{{ Auth::user()->name ?? '' }}</h5>

                    </div>
                    <div class="col-md-6">
                        @auth
                            <a href="{{ route('user.edit', Auth::user()->id) }}"
                                class="btn btn-success rounded-0 text-white border-0" style="background-color: blueviolet">
                                {{ Auth::user()->province == null ? 'Atur' : 'Ubah' }} alamat pengiriman
                            </a>
                        @endauth
                    </div>
                </div>
                <p>Cari kacamata terbaikmu, dengan berbelanja dari rumah saja👌</p>
            </div>
        </div>
    </div>
</header>
