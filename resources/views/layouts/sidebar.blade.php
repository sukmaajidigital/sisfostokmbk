<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/mbklong.png') }}" width="225" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                @if (in_array(Auth::user()->role, [0, 1, 2, 3]))
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                @endif
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('sample') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-article"></i>
                        </span>
                        <span class="hide-menu">Sample</span>
                    </a>
                </li> --}}
                @if (in_array(Auth::user()->role, [0, 1]))
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">MASTER DATA</span>
                    </li>
                @endif
                @if (in_array(Auth::user()->role, [0, 1, 2, 3]))
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('bahan.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-box"></i>
                            </span>
                            <span class="hide-menu">Bahan</span>
                        </a>
                    </li>
                @endif
                @if (in_array(Auth::user()->role, [0, 1]))
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('kategori.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-category"></i>
                            </span>
                            <span class="hide-menu">Kategori</span>
                        </a>
                    </li>
                @endif
                @if (in_array(Auth::user()->role, [0, 1]))
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('keperluan.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-news"></i>
                            </span>
                            <span class="hide-menu">Keperluan</span>
                        </a>
                    </li>
                @endif
                @if (in_array(Auth::user()->role, [0, 1, 3]))
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('supplier.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-user"></i>
                            </span>
                            <span class="hide-menu">Supplier</span>
                        </a>
                    </li>
                @endif
                @if (in_array(Auth::user()->role, [0, 1]))
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">BAHAN KELUAR MASUK</span>
                    </li>
                @endif
                @if (in_array(Auth::user()->role, [0, 1]))
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('bahanmasuk.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-package"></i>
                            </span>
                            <span class="hide-menu">Bahan Masuk</span>
                        </a>
                    </li>
                @endif
                @if (in_array(Auth::user()->role, [0, 1, 2]))
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('bahankeluar.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-package"></i>
                            </span>
                            <span class="hide-menu">Bahan Keluar</span>
                        </a>
                    </li>
                @endif
                @if (in_array(Auth::user()->role, [0, 1]))
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">MANAJEMEN AKUN</span>
                    </li>
                @endif
                @if (in_array(Auth::user()->role, [0, 1]))
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('user.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-box"></i>
                            </span>
                            <span class="hide-menu">USER</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
