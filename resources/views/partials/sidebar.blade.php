<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
        <li class="nav-title">Components</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-short-text') }}"></use>
                </svg> History</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="{{ route('index-transaksi-pembelian') }}"><span class="nav-icon"></span>
                        Pembelian</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('index-transaksi-penjualan') }}"><span class="nav-icon"></span>
                        Penjualan</a></li>
            </ul>
        </li>
        <li class="nav-title">Enter item data</li>
        <li class="nav-item"><a class="nav-link" href="{{ route('index-kategori') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-keyboard') }}"></use>
            </svg> Kategori</a></li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-line-weight"></use>
                </svg> Barang</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="{{ route('index-barang-gudang') }}"><span class="nav-icon"></span>
                        Gudang</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('index-barang-jual') }}"><span class="nav-icon"></span>
                        Post</a></li>
            </ul>
        </li>
        <li class="nav-title mt-auto">Akun</li>
        <li class="nav-item"><a class="nav-link nav-link-danger" href="{{ route('login-view') }}" target="_top">
                <svg class="nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-layers"></use>
                </svg> Login
            </a></li>
        <li class="nav-item"><a class="nav-link nav-link-danger" href="https://coreui.io/pro/" target="_top">
                <svg class="nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-layers"></use>
                </svg> Register
            </a></li>
        <li class="nav-item"><a class="nav-link nav-link-danger" href="https://coreui.io/pro/" target="_top">
                <svg class="nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-layers"></use>
                </svg> Logout
            </a></li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>