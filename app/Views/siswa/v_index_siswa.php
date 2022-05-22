 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->


     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="h3 m-0 font-weight-bold text-primary"><?=$title; ?></h6>
         </div>
         <div class="p-3">
             <a href="/Siswa/add" class="btn btn-primary">+Tambah Siswa</a>
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

                             <th>Nama</th>
                             <th>NISN</th>
                             <th>Kelas</th>
                             <th>Tanggal Lahir</th>
                             <th style="width: 7%;">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;
                         foreach ($siswa as $key => $value) { ?>

                         <tr>
                             <td><?=$no++; ?></td>
                             <td><?=$value['nama_siswa']; ?></td>
                             <td><?=$value['nisn_siswa']; ?></td>
                             <td><?=$value['kelas_siswa']; ?></td>
                             <td><?=$value['tgl_lahir']; ?></td>

                             <td>
                                 <a href="/Siswa/edit/<?=$value['id_siswa']; ?>" class="btn btn-warning"><i
                                         class="fa-solid fa-pen-to-square"></i></a>
                                 <button class="btn btn-danger" data-toggle="modal"
                                     data-target="#remove_siswa<?=$value['id_siswa']; ?>"><i
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
     <?php foreach ($siswa as $key => $value) { ?>
     <div class="modal fade" id="remove_siswa<?=$value['id_siswa']; ?>">
         <div class="modal-dialog modal-m">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Hapus Siswa</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body pb-0">
                     <h6>Apakah anda yakin ingin menghapus <?=$value['nama_siswa']; ?>?</h6>
                 </div>
                 <!-- /.card-body -->
                 </p>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                     <!-- <button type="submit" name="tambah" class="btn btn-primary">Ya</button> -->
                     <form action="/Siswa/<?= $value['id_siswa']; ?>" method="POST" class="d-inline">
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
var element = document.getElementById("datasiswa");
element.classList.add("active");
 </script>