<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="bi bi-house"></i>
                    Dashboard
                </a>
            </li>
            @canany(['admin'])
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('menu.index') }}">
                        <i class="bi bi-file-earmark"></i>
                        Menu
                    </a>
                </li>
            @endcanany
            @canany(['admin','pengguna','waiter'])
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pesanan.index') }}">
                        <i class="bi bi-cart"></i>
                        Pesanan
                    </a>
                </li>
            @endcanany
            @canany(['admin','kasir'])
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-people"></i>
                        Transaksi
                    </a>
                </li>
            @endcanany
            @canany(['admin','waiter','owner'])
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-pie-chart"></i>
                        Laporan
                    </a>
                </li>
            @endcanany
        </ul>
    </div>
</nav>
