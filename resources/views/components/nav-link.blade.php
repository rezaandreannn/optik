<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Beranda <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('cetak.index') }}">Cetak Laporan</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-table"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('category.index') }}">Kategori</a></li>
                    <li><a href="{{ route('product.index') }}">Produk</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <div class="menu_section">
        <h3>Lainnya</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-cog"></i> Pengaturan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('user.index') }}">User</a></li>
                    <li><a href="{{ route('role.index') }}">Role</a></li>
                    {{-- <li><a href="#">Contacts</a></li> --}}
                </ul>
            </li>
        </ul>
    </div>

</div>
