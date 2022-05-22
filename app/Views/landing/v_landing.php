<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Perpustakaan Sekolah</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon"
        href="<?=base_url()?>/template/startbootstrap-landing-page-gh-pages/assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
        type="text/css" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="<?=base_url()?>/template/startbootstrap-landing-page-gh-pages/css/styles.css">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">

    <!-- <link href="<?=base_url()?>/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>/template/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e62ddf0975.js" crossorigin="anonymous"></script>






</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="#!">Perpustakaan Sekolah</a>
            <a class="btn btn-primary" href="Auth">Login Admin</a>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5">Selamat Datang!</h1>
                        <h4 class="mb-5">Website ini menyediakan informasi terkait ketersediaan buku pada sekolah X</h4>
                        <a class="btn-lg btn-info" href="#daftarbuku">Cari Buku <i
                                class="fas fa-fw fa-magnifying-glass"></i></a>


                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Icons Grid-->
    <section class="features-icons text-center" style="background-color:#f5f5f5 ;">
        <div class="container">
            <h1 class="mb-5">Katalog Buku</h1>
            <div class="row justify-content-center">
                <?php 
                         foreach ($buku as $key => $value) { ?>

                <div class="col text-center pb-4">
                    <div class="card" style="width:min-content ;">
                        <div class="card-img-top" style="height: 450px;">
                            <img src="/img/sampul/<?=$value['sampul_buku']; ?>" style="width: 300px;" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?=$value['judul_buku']; ?></h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush text-start">
                                <li class="list-group-item">Penerbit: <?=$value['nama_penerbit']; ?></li>
                                <li class="list-group-item">Pengarang: <?=$value['pengarang_buku']; ?></li>
                                <li class="list-group-item">Kategori: <?=$value['nama_kategori']; ?></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </section>

    <!-- Image Showcases-->
    <div class="container-fluid" id="daftarbuku" style="background-color:white ;">
        <h1 class="mb-5 text-center pt-4">Daftar Buku</h1>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-bordered pt-4" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 150px;">Sampul</th>
                                    <th>ISBN</th>
                                    <th>Judul</th>
                                    <th style="width: 15%;">Penerbit</th>
                                    <th>Pengarang</th>
                                    <th>Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                 foreach ($buku as $key => $value) { ?>

                                <tr>
                                    <td><?=$no++; ?></td>
                                    <td class="text-center"><img src="/img/sampul/<?=$value['sampul_buku']; ?>"
                                            style="width: 150px;">
                                    </td>
                                    <td><?=$value['isbn_buku']; ?></td>
                                    <td><?=$value['judul_buku']; ?></td>
                                    <td><?=$value['nama_penerbit']; ?></td>
                                    <td><?=$value['pengarang_buku']; ?></td>
                                    <td><?=$value['nama_kategori']; ?></td>


                                </tr>


                                <?php } ?>

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>

    </div>
    <!-- Testimonials-->
    <!-- <section class="testimonials text-center bg-light">
        <div class="container">
            <h2 class="mb-5">What people are saying...</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-1.jpg" alt="..." />
                        <h5>Margaret E.</h5>
                        <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-2.jpg" alt="..." />
                        <h5>Fred S.</h5>
                        <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of
                            super nice landing pages."</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-3.jpg" alt="..." />
                        <h5>Sarah W.</h5>
                        <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to
                            us!"</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Call to Action-->
    <section class="call-to-action text-white text-center" id="signup">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">

                </div>
            </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 h-100 text-center text-lg my-auto">
                    <p class="text-muted small mb-4 mb-lg-0">&copy; SIMPUS 2022. All Rights Reserved.</p>
                </div>

            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->

    <script src="<?=base_url()?>/template/vendor/jquery/jquery.min.js"></script>
    <!-- <script src="<?=base_url()?>/template/vendor/datatables/jquery.dataTables.min.js"></script> -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js">
    </script>



    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" type="text/javascript">
    </script>
    <!-- Core theme JS-->
    <script src="<?=base_url()?>/template/startbootstrap-landing-page-gh-pages/js/scripts.js"></script>



</body>

</html>