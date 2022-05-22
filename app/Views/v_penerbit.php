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
             <a href="" class="btn btn-primary" data-toggle="modal" data-target="#add_penerbit">+Tambah Penerbit</a>
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
                             <th style="width: 150px">Penerbit</th>
                             <th style="width: 7%;">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;
                         foreach ($penerbit as $key => $value) { ?>

                         <tr>
                             <td><?=$no++; ?></td>
                             <td><?=$value['nama_penerbit']; ?></td>
                             <td>
                                 <button class="btn btn-warning" data-toggle="modal"
                                     data-target="#edit_penerbit<?=$value['id_penerbit']; ?>"><i
                                         class="fa-solid fa-pen-to-square"></i></button>
                                 <button class="btn btn-danger" data-toggle="modal"
                                     data-target="#remove_penerbit<?=$value['id_penerbit']; ?>"><i
                                         class="fa-solid fa-trash"></i></button>


                             </td>

                         </tr>


                         <?php } ?>

                     </tbody>
                 </table>
             </div>
         </div>
     </div>

     <!-- modal -->
     <div class="modal fade" id="add_penerbit">
         <div class="modal-dialog modal-m">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Tambah Penerbit</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body p-0">
                     <?php 
                        $errors = session()->getFlashdata('errors');
                        if (!empty($errors)) { ?>
                     <div class="alert alert-danger" role="alert">
                         <ul class="mb-0 px-0">
                             <?php foreach ($errors as $key => $value) { ?>
                             <li style="list-style:none"><?= esc($value); ?></li>
                             <?php } ?>
                         </ul>
                     </div>
                     <?php } 
                        ?>
                     <?php 
                     echo form_open('penerbit/insert')
                     ?>

                     <div class="card-body row m-0">
                         <div class="col-md">
                             <div class="form-group m-0">
                                 <label>Penerbit</label>
                                 <input type="text" name="nama_penerbit" class="form-control" required>
                             </div>
                         </div>

                     </div>
                 </div>
                 <!-- /.card-body -->
                 </p>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                     <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                 </div>
             </div>


             <?php 
             echo form_close() ?>

         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->

     <!-- modal edit-->
     <?php foreach ($penerbit as $key => $value) { ?>
     <div class="modal fade" id="edit_penerbit<?=$value['id_penerbit']; ?>">
         <div class="modal-dialog modal-m">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Edit Penerbit</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <?php
                        $errors = session()->getFlashdata('errors');
                        if (!empty($errors)) { ?>
                     <div class="alert alert-danger" role="alert">
                         <ul class="mb-0 px-0">
                             <?php foreach ($errors as $key => $value) { ?>
                             <li style="list-style:none"><?= esc($value); ?></li>
                             <?php } ?>
                         </ul>
                     </div>
                     <?php }
                        ?>
                     <?php
                     echo form_open('penerbit/edit/'.$value['id_penerbit'])
                     ?>

                     <div class="card-body row">
                         <div class="col-md">
                             <div class="form-group">
                                 <label>Nama Penerbit</label>
                                 <input type="text" name="nama_penerbit" class="form-control"
                                     value="<?=$value['nama_penerbit']; ?>" required>
                             </div>
                         </div>

                     </div>
                 </div>
                 <!-- /.card-body -->
                 </p>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                     <button type="submit" name="tambah" class="btn btn-primary">Ubah</button>
                 </div>
             </div>


             <?php
             echo form_close() ?>

         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
     <?php } ?>

     <!-- modal remove-->
     <?php foreach ($penerbit as $key => $value) { ?>
     <div class="modal fade" id="remove_penerbit<?=$value['id_penerbit']; ?>">
         <div class="modal-dialog modal-m">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Hapus Penerbit</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body pb-0">
                     <h6>Apakah anda yakin ingin menghapus <?=$value['nama_penerbit']; ?>?</h6>
                 </div>
                 <!-- /.card-body -->
                 </p>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                     <form action="/Penerbit/<?= $value['id_penerbit']; ?>" method="POST" class="d-inline">
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
var element1 = document.getElementById('penerbit')
var element2 = document.getElementById('collapsekatalogbukunav')
element.classList.add("active");
element1.classList.add("active");
element2.classList.add("show");
 </script>