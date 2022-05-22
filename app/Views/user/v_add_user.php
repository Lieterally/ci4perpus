 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->


     <!-- DataTales Example -->



     <div class="card-body pt-0">
         <div class="card shadow mb-4">
             <div class="card-header py-3">
                 <h6 class="h3 m-0 font-weight-bold text-primary"><?=$title; ?></h6>
             </div>
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

             <!-- <?php echo form_open_multipart('/User/insert')?> -->
             <form action="/User/insert" method="POST" enctype="multipart/form-data">

                 <div class="card-body row">
                     <div class="col-md">
                         <div class="form-group">
                             <label>Nama</label>
                             <input name="nama_user"
                                 class="form-control <?= ($validation->hasError('nama_user')) ? 'is-invalid' : ''; ?>"
                                 value="<?=old('nama_user');?>">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('nama_user'); ?>
                             </div>
                         </div>

                         <div class="form-group">
                             <label>Email</label>
                             <input type="text" name="email_user"
                                 class="form-control <?= ($validation->hasError('email_user')) ? 'is-invalid' : ''; ?>"
                                 value="<?=old('email_user');?>" placeholder="">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('email_user'); ?>
                             </div>
                         </div>
                         <div class="form-group">
                             <label>Nomor Telepon</label>
                             <input type="text" name="telp_user"
                                 class="form-control <?= ($validation->hasError('telp_user')) ? 'is-invalid' : ''; ?>"
                                 value="<?=old('telp_user');?>" placeholder="">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('telp_user'); ?>
                             </div>
                         </div>


                     </div>
                     <div class="col-md">
                         <div class="form-group">
                             <label>Username</label>
                             <input type="text" name="username_user"
                                 class="form-control <?= ($validation->hasError('username_user')) ? 'is-invalid' : ''; ?>"
                                 value="<?=old('username_user');?>">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('username_user'); ?>
                             </div>
                         </div>
                         <div class="form-group">
                             <label>Password</label>
                             <input type="password" name="password_user"
                                 class="form-control <?= ($validation->hasError('password_user')) ? 'is-invalid' : ''; ?>"
                                 placeholder="">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('password_user'); ?>
                             </div>

                         </div>
                         <div class="form-group">
                             <label>Konfirmasi Password</label>
                             <input type="password" name="konfirmpassword"
                                 class="form-control <?= ($validation->hasError('password_user')) ? 'is-invalid' : ''; ?>"
                                 placeholder="">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('password_user'); ?>
                             </div>
                         </div>

                         <div class="form-group">
                             <label>Foto</label>
                             <!-- <div class="col-sm-2" id="teshide">
                                 <img src="" class="img-thumbnail img-preview">
                             </div> -->
                             <div class="custom-file">
                                 <input type="file" name="foto_user" id="foto"
                                     class="custom-file-input <?= ($validation->hasError('foto_user')) ? 'is-invalid' : ''; ?>"
                                     onchange="previewLabel()">
                                 <div class="invalid-feedback">
                                     <?=$validation->getError('foto_user'); ?>
                                 </div>
                                 <label class="custom-file-label">Pilih file</label>
                                 <!-- </div>
                             <div class="input-group"> -->
                             </div>
                             <!-- <small class="text-danger">Upload foto dalam file png atau jpg.</small> -->
                         </div>

                     </div>

                     <!-- <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="keterangan"
                                            placeholder="Keterangan"></textarea>
                                 </div> -->
                 </div>

                 <div class="modal-footer justify-content-between">

                     <a href="/User" class="btn btn-default">Kembali</a>
                     <button type="submit" class="btn btn-primary">Tambah</button>
                 </div>
         </div>
         <!-- /.card-body -->
     </div>
     </form>
     <!-- <?php echo form_close() ?> -->


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