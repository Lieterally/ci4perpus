<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIMPUS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="dasbor">
                <a class="nav-link" href="/Dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Interface
            </div> -->


            <!-- Nav Item - Data Administrator -->
            <li id="dataadmin" class="nav-item">
                <a class="nav-link" href="/User">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Administrator</span></a>
            </li>
            <!-- Nav Item - Data Administrator -->
            <li id="datasiswa" class="nav-item">
                <a class="nav-link" href="/Siswa">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Siswa</span></a>
            </li>

            <!-- Nav Item - Data Master -->
            <li id="katalogbuku" class="nav-item" onclick="">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsekatalogbukunav"
                    aria-expanded="true" aria-controls="collapsekatalogbukunav">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Katalog Buku</span>
                </a>
                <div id="collapsekatalogbukunav" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a id="buku" class="collapse-item" href="/Buku">Data Buku</a>
                        <a id="kategori" class="collapse-item" href="/Kategori">Kategori</a>
                        <a id="rak" class="collapse-item" href="/Rak">Rak</a>
                        <a id="penerbit" class="collapse-item" href="/Penerbit">Penerbit</a>
                    </div>
                </div>
            </li>



            <!-- Nav Item - Data Transaksi -->
            <li id="transaksi" class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetransaksi"
                    aria-expanded="true" aria-controls="collapsetransaksi">
                    <i class="fas fa-fw fa-list-check"></i>

                    <span>Data Transaksi</span>
                </a>
                <div id="collapsetransaksi" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a id="peminjaman" class="collapse-item" href="/Peminjaman">Data Peminjaman</a>
                        <a id="pengembalian" class="collapse-item" href="/Pengembalian">Data Pengembalian</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block mb-0 mt-3">

            <!-- Nav Item - Data Administrator -->
            <li class="nav-item">
                <a class="nav-link" href="/Auth/logout">
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components,
                    and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
                    Pro!</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">