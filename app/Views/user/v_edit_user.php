 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

     <!-- Content Row -->
     <div class="h3 pb-2"><?=$title; ?></div>
     <div class="row justify-content-center">
         <div class="col-xl-6 col-md-6">
             <!-- DataTales Example -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="h4 m-0 font-weight-bold text-primary">Profil</h6>
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
                     <?php } ?>

                     <form action="/User/update_profil/<?=$user['id_user']; ?>" method="POST"
                         enctype="multipart/form-data">

                         <div class="card-body row">
                             <div class="col-md">
                                 <div class="form-group">
                                     <label>Nama</label>
                                     <input name="nama_user"
                                         class="form-control <?= ($validation->hasError('nama_user')) ? 'is-invalid' : ''; ?>"
                                         value="<?= $user['nama_user'];?>">
                                     <div class="invalid-feedback">
                                         <?=$validation->getError('nama_user'); ?>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label>Email</label>
                                     <input type="text" name="email_user"
                                         class="form-control <?= ($validation->hasError('email_user')) ? 'is-invalid' : ''; ?>"
                                         value="<?= $user['email_user'];?>" placeholder="">
                                     <div class=" invalid-feedback">
                                         <?=$validation->getError('email_user'); ?>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label>Nomor Telepon</label>
                                     <input type="text" name="telp_user"
                                         class="form-control <?= ($validation->hasError('telp_user')) ? 'is-invalid' : ''; ?>"
                                         value="<?= $user['telp_user'];?>" placeholder="">
                                     <div class="invalid-feedback">
                                         <?=$validation->getError('telp_user'); ?>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label>Foto</label>
                                     <div class="custom-file">
                                         <input type="file" name="foto_user" id="foto"
                                             class="custom-file-input <?= ($validation->hasError('foto_user')) ? 'is-invalid' : ''; ?>"
                                             onchange="previewLabel()">
                                         <div class="invalid-feedback">
                                             <?=$validation->getError('foto_user'); ?>
                                         </div>
                                         <label class="custom-file-label"><?= $user['foto_user'];?></label>
                                         <!-- </div>
                             <div class="input-group"> -->
                                     </div>
                                     <!-- <small class="text-danger">Upload foto dalam file png atau jpg.</small> -->
                                 </div>


                             </div>

                         </div>
                 </div>
                 <div class="modal-footer justify-content-end">
                     <button type="submit" class="btn btn-primary">Ubah</button>
                 </div>
                 </form>
             </div>
         </div>
         <div class="col-xl-6 col-md-6">
             <!-- DataTales Example -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="h4 m-0 font-weight-bold text-primary">Akun</h6>
                 </div>
                 <div class="card-body pt-0">
                     <?php 
                    if (session()->getFlashdata('pesan1')) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                        echo session()->getFlashdata('pesan1');
                        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                        echo '</div>';
                    }
                    ?>
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
                     <?php } ?>


                     <form action="/User/update_akun/<?=$user['id_user']; ?>" method="POST"
                         enctype="multipart/form-data">

                         <div class="card-body row">
                             <div class="col-md">
                                 <div class="form-group">
                                     <label>Username</label>
                                     <input type="text" name="username_user"
                                         class="form-control <?= ($validation->hasError('username_user')) ? 'is-invalid' : ''; ?>"
                                         value="<?= $user['username_user'];?>">
                                     <div class="invalid-feedback">
                                         <?=$validation->getError('username_user'); ?>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label>Password</label>
                                     <input type="password" name="password_user"
                                         class="form-control <?= ($validation->hasError('password_user')) ? 'is-invalid' : ''; ?>"
                                         placeholder="Kosongkan bila tidak ingin diubah">
                                     <div class="invalid-feedback">
                                         <?=$validation->getError('password_user'); ?>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label>Konfirmasi Password</label>
                                     <input type="password" name="konfirmpassword"
                                         class="form-control <?= ($validation->hasError('password_user')) ? 'is-invalid' : ''; ?>"
                                         placeholder="Kosongkan bila tidak ingin diubah">
                                     <div class="invalid-feedback">
                                         <?=$validation->getError('password_user'); ?>
                                     </div>
                                 </div>


                             </div>

                         </div>
                 </div>
                 <div class="modal-footer justify-content-end">
                     <button type="submit" class="btn btn-primary">Ubah</button>
                 </div>
                 </form>
             </div>
         </div>



     </div>
     <div class="row justify-content-start pl-3">

         <a href="/User" class="btn btn-primary">Kembali</a>
     </div>
 </div>
 <!-- /.container-fluid -->

 </div>

 <!-- End of Main Content -->

 <script>
var element = document.getElementById("datauser");
element.classList.add("active");

function previewLabel() {

    const foto = document.querySelector('#foto');
    const foto_label = document.querySelector('.custom-file-label');

    foto_label.textContent = foto.files[0].name;

}
 </script>