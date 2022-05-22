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

             <!-- <?php echo form_open_multipart('/Siswa/update')?> -->
             <form action="/Siswa/update/<?=$siswa['id_siswa']; ?>" method="POST" enctype="multipart/form-data">

                 <div class="card-body row">
                     <div class="col-md">
                         <div class="form-group">
                             <label>Nama</label>
                             <input name="nama_siswa"
                                 class="form-control <?= ($validation->hasError('nama_siswa')) ? 'is-invalid' : ''; ?>"
                                 value="<?= $siswa['nama_siswa'];?>">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('nama_siswa'); ?>
                             </div>
                         </div>

                         <div class="form-group">
                             <label>NISN</label>
                             <input type="text" name="nisn_siswa"
                                 class="form-control <?= ($validation->hasError('nisn_siswa')) ? 'is-invalid' : ''; ?>"
                                 value="<?= $siswa['nisn_siswa'];?>" placeholder="">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('nisn_siswa'); ?>
                             </div>
                         </div>
                         <div class="form-group">
                             <label>Kelas</label>
                             <input type="text" name="kelas_siswa"
                                 class="form-control <?= ($validation->hasError('kelas_siswa')) ? 'is-invalid' : ''; ?>"
                                 value="<?= $siswa['kelas_siswa'];?>" placeholder="">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('kelas_siswa'); ?>
                             </div>
                         </div>
                         <div class="form-group">
                             <label>Tanggal Lahir</label>
                             <input type="date" name="tgl_lahir"
                                 class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>"
                                 value="<?= $siswa['tgl_lahir'];?>" placeholder="">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('tgl_lahir'); ?>
                             </div>
                         </div>


                     </div>

                 </div>

                 <div class="modal-footer justify-content-between">

                     <a href="/Siswa" class="btn btn-default">Kembali</a>
                     <button type="submit" class="btn btn-primary">Edit</button>
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