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
                <h5 class="text-uppercase">{{ Auth::user()->name ?? '' }}</h5>
                <p>Cari kacamata terbaikmu, dengan berbelanja dari rumah saja👌</p>
            </div>
        </div>
    </div>
</header>
