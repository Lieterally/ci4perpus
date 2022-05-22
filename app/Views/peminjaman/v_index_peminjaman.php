 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="h3 m-0 font-weight-bold text-primary"><?=$title; ?></h6>
         </div>
         <div class="p-3">
             <a href="/Peminjaman/add" class="btn btn-primary">+Tambah Peminjaman</a>
         </div>


         <div class="card-body pt-0">
             <?php 
                    if (session()->getFlashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                        echo session()->getFlashdata('pesan');
                        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                        echo '</div>';
                    }
                ?>
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th style="width: 5%;">No</th>
                             <th>Nomor Peminjaman</th>
                             <th>Judul Buku</th>
                             <th>Nama Siswa</th>
                             <th>Tanggal Peminjaman</th>
                             <th>Tanggal Pengembalian</th>
                             <th style="width: 5%;">Status</th>
                             <th style="width: 10%;">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                          $no = 1;
                          foreach ($peminjaman as $key => $value) { 
                                $a =  $value['status_peminjaman'];
                                if ($a == 'Dipinjam') { ?>
                         <tr>
                             <td><?=$no++; ?></td>
                             <td><?=$value['no_peminjaman']; ?></td>
                             <td><?=$value['judul_buku']; ?></td>
                             <td><?=$value['nama_siswa']; ?></td>
                             <td><?=$value['tanggal_peminjaman']; ?></td>
                             <td><?=$value['tanggal_pengembalian']; ?></td>
                             <td>

                                 <h5>
                                     <span class="badge p-2 border border-warning">
                                         <?=$value['status_peminjaman']; ?>
                                     </span>

                                 </h5>
                             </td>
                             <td>
                                 <!-- <a href="" class="btn btn-warning py-1">Kembali</a> -->
                                 <button class="btn btn-warning py-1" data-toggle="modal"
                                     data-target="#kembali_peminjaman<?=$value['id_peminjaman']; ?>">Kembali</button>
                                 <button class="btn btn-danger py-2" data-toggle="modal"
                                     data-target="#remove_peminjaman<?=$value['id_peminjaman']; ?>"><i
                                         class="fa-solid fa-trash"></i></button>
                             </td>

                         </tr>
                         <?php }
                            }?>

                     </tbody>
                 </table>
             </div>
         </div>
     </div>



     <!-- modal remove-->
     <?php foreach ($peminjaman as $key => $value) { ?>
     <div class="modal fade" id="remove_peminjaman<?=$value['id_peminjaman']; ?>">
         <div class="modal-dialog modal-m">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Hapus Peminjaman</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body pb-0">
                     <h6>Apakah anda yakin ingin menghapus <?=$value['no_peminjaman']; ?>?</h6>
                 </div>
                 <!-- /.card-body -->
                 </p>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                     <!-- <button type="submit" name="tambah" class="btn btn-primary">Ya</button> -->
                     <form action="/Peminjaman/<?= $value['id_peminjaman']; ?>" method="POST" class="d-inline">
                         <?= csrf_field(); ?>
                         <input type="hidden" name="_method" value="DELETE">
                         <button type="submit" class="btn btn-danger">Ya</button>

                     </form>
                 </div>
             </div>


         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
     <?php } ?>

     <!-- modal kembali-->
     <?php foreach ($peminjaman as $key => $value) { ?>
     <div class="modal fade" id="kembali_peminjaman<?=$value['id_peminjaman']; ?>">
         <div class="modal-dialog modal-m">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Kembali Peminjaman</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body pb-0">
                     <h6>Apakah anda yakin ingin menyelesaikan peminjaman
                         <?=$value['no_peminjaman']; ?> oleh <?=$value['nama_siswa']; ?>?</h6>
                 </div>
                 <!-- /.card-body -->
                 </p>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                     <!-- <button type="submit" name="tambah" class="btn btn-primary">Ya</button> -->
                     <form action="/Peminjaman/<?= $value['id_peminjaman']; ?>" method="POST" class="d-inline">
                         <?= csrf_field(); ?>
                         <input type="hidden" name="_method" value="UPDATE">
                         <button type="submit" class="btn btn-danger">Ya</button>

                     </form>
                 </div>
             </div>


         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
     <?php } ?>

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->


 <script>
var element = document.getElementById('transaksi')
var element1 = document.getElementById('peminjaman')
var element2 = document.getElementById('collapsetransaksi')
element.classList.add("active");
element1.classList.add("active");
element2.classList.add("show");
 </script>