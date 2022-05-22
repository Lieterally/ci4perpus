 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="h3 m-0 font-weight-bold text-primary"><?=$title; ?></h6>
         </div>
         <div class="p-3">
             <a href="/Buku/add" class="btn btn-primary">+Tambah Buku</a>
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
                             <th style="width: 150px;">Sampul</th>
                             <th>ISBN</th>
                             <th>Judul</th>
                             <th>Penerbit</th>
                             <th>Pengarang</th>
                             <th>Kategori</th>
                             <th>Stok</th>
                             <th style="width: 5%;">Dipinjam</th>
                             <th>Rak</th>
                             <th style="width: 7%;">Aksi</th>
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
                             <td><?=$value['stok_buku']; ?></td>
                             <td>11</td>
                             <td><?=$value['nama_rak']; ?></td>

                             <td>
                                 <a href="/Buku/edit/<?=$value['id_buku']; ?>" class="btn btn-warning"><i
                                         class="fa-solid fa-pen-to-square"></i></a>
                                 <button class="btn btn-danger" data-toggle="modal"
                                     data-target="#remove_buku<?=$value['id_buku']; ?>"><i
                                         class="fa-solid fa-trash"></i></button>
                             </td>

                         </tr>


                         <?php } ?>

                     </tbody>
                 </table>
             </div>
         </div>
     </div>

     <!-- modal remove-->
     <?php foreach ($buku as $key => $value) { ?>
     <div class="modal fade" id="remove_buku<?=$value['id_buku']; ?>">
         <div class="modal-dialog modal-m">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Hapus Buku</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body pb-0">
                     <h6>Apakah anda yakin ingin menghapus <?=$value['judul_buku']; ?>?</h6>
                 </div>
                 <!-- /.card-body -->
                 </p>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                     <!-- <button type="submit" name="tambah" class="btn btn-primary">Ya</button> -->
                     <form action="/Buku/<?= $value['id_buku']; ?>" method="POST" class="d-inline">
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

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->



 <script>
var element = document.getElementById('katalogbuku')
var element1 = document.getElementById('buku')
var element2 = document.getElementById('collapsekatalogbukunav')
element.classList.add("active");
element1.classList.add("active");
element2.classList.add("show");
 </script>