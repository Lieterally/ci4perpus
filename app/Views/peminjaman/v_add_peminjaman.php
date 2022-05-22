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


             <form action="/Peminjaman/insert" method="POST" enctype="multipart/form-data">

                 <div class="card-body row">
                     <div class="col-md">
                         <div class="form-group">
                             <label>Nomor Peminjaman</label>
                             <input name="no_peminjaman" id="field"
                                 class="form-control <?= ($validation->hasError('no_peminjaman')) ? 'is-invalid' : ''; ?>"
                                 value="<?=old('nomor_peminjaman');?>">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('no_peminjaman'); ?>
                             </div>
                         </div>

                         <div class="form-group">
                             <label>Nama Siswa</label>
                             <select name="id_siswa"
                                 class="form-control custom-select <?= ($validation->hasError('id_siswa')) ? 'is-invalid' : ''; ?>">
                                 <option value="">Pilih</option>

                                 <?php foreach ($siswa as $key => $value) { ?>
                                 <option value="<?=$value['id_siswa']; ?>"><?=$value['nama_siswa']; ?></option>
                                 <?php }?>

                             </select>
                             <div class="invalid-feedback">
                                 <?=$validation->getError('id_siswa'); ?>
                             </div>
                         </div>

                         <div class="form-group">
                             <label>Judul Buku</label>
                             <select name="id_buku"
                                 class="form-control custom-select <?= ($validation->hasError('id_buku')) ? 'is-invalid' : ''; ?>">
                                 <option value="">Pilih</option>

                                 <?php foreach ($buku as $key => $value) { ?>
                                 <option value="<?=$value['id_buku']; ?>"><?=$value['judul_buku']; ?></option>
                                 <?php }?>

                             </select>
                             <div class="invalid-feedback">
                                 <?=$validation->getError('id_buku'); ?>
                             </div>
                         </div>


                         <div class="form-group">
                             <label>Tanggal Peminjaman</label>
                             <input type="date" name="tanggal_peminjaman"
                                 class="form-control <?= ($validation->hasError('tanggal_peminjaman')) ? 'is-invalid' : ''; ?>"
                                 value="<?=old('tanggal_peminjaman');?>" placeholder="">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('tanggal_peminjaman'); ?>
                             </div>
                         </div>

                         <div class="form-group">
                             <label>Durasi Peminjaman (hari) </label>
                             <input name="durasi_peminjaman"
                                 class="form-control <?= ($validation->hasError('durasi_peminjaman')) ? 'is-invalid' : ''; ?>"
                                 value="<?=old('durasi_peminjaman');?>">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('durasi_peminjaman'); ?>
                             </div>
                         </div>

                     </div>


                 </div>

                 <div class="modal-footer justify-content-between">

                     <a href="/Peminjaman" class="btn btn-default">Kembali</a>
                     <button type="submit" class="btn btn-primary">Tambah</button>
                 </div>
         </div>
         <!-- /.card-body -->
     </div>
     </form>



 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 <script>
var element = document.getElementById("datauser");
element.classList.add("active");

function previewLabel() {

    const sampul = document.querySelector('#sampul');
    const sampul_label = document.querySelector('.custom-file-label');

    sampul_label.textContent = sampul.files[0].name;

}
 </script>