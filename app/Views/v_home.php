<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Siswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$siswa->countsiswa(); ?></div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Buku</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$buku->countbuku(); ?></div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Peminjaman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$peminjaman->counttotpinjam(); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                            <i class="fas fa-arrow-up fa-2x text-gray-300"></i>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pengembalian</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$peminjaman->counttotkembali(); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                            <i class="fas fa-arrow-down fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-md-12 mb-4">
            <section class="card shadow h-100 p-2">

                <div class="container">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-12">
                            <div class="calendar calendar-first" id="calendar_first">
                                <div class="calendar_header">
                                    <button class="switch-month switch-left"> <i
                                            class="fa fa-chevron-left"></i></button>
                                    <h2></h2>
                                    <button class="switch-month switch-right"> <i
                                            class="fa fa-chevron-right"></i></button>
                                </div>
                                <div class="calendar_weekdays"></div>
                                <div class="calendar_content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Area Chart -->
        <!-- <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Peminjaman</h6>
                </div>
                <div id="angka" class="d-none">
                    a: <input type="number" name="a" id="a" value="100000"><br>
                    b: <input type="number" name="b" id="b"><br>

                </div>
                
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div> -->



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>

<script>
var element = document.getElementById("dasbor");
element.classList.add("active");
</script>