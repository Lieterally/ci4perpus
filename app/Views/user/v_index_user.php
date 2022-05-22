 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="h3 m-0 font-weight-bold text-primary"><?=$title; ?></h6>
         </div>
         <div class="p-3">
             <a href="/User/add" class="btn btn-primary">+Tambah User</a>
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
                             <th style="width: 150px">Foto</th>
                             <th>Nama</th>
                             <th>Username</th>
                             <th>Email</th>
                             <th>Nomor Telepon</th>
                             <th style="width: 7%;">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;
                         foreach ($user as $key => $value) { ?>

                         <tr>
                             <td><?=$no++; ?></td>
                             <td class="text-center"><img src="/img/<?=$value['foto_user']; ?>" style="width: 150px;">
                             </td>
                             <td><?=$value['nama_user']; ?></td>
                             <td><?=$value['username_user']; ?></td>
                             <td><?=$value['email_user']; ?></td>
                             <td><?=$value['telp_user']; ?></td>

                             <td>
                                 <a href="/User/edit/<?=$value['id_user']; ?>" class="btn btn-warning"><i
                                         class="fa-solid fa-pen-to-square"></i></a>
                                 <button class="btn btn-danger" data-toggle="modal"
                                     data-target="#remove_user<?=$value['id_user']; ?>"><i
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
     <?php foreach ($user as $key => $value) { ?>
     <div class="modal fade" id="remove_user<?=$value['id_user']; ?>">
         <div class="modal-dialog modal-m">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Hapus Admin</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body pb-0">
                     <h6>Apakah anda yakin ingin menghapus <?=$value['nama_user']; ?>?</h6>
                 </div>
                 <!-- /.card-body -->
                 </p>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                     <!-- <button type="submit" name="tambah" class="btn btn-primary">Ya</button> -->
                     <form action="/User/<?= $value['id_user']; ?>" method="POST" class="d-inline">
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
var element = document.getElementById("dataadmin");
element.classList.add("active");
 </script>