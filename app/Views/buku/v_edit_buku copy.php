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


             <form action="/Buku/update/<?=$buku['id_buku']; ?>" method="POST" enctype="multipart/form-data">

                 <div class="card-body row">
                     <div class="col-md">
                         <div class="form-group">
                             <label>ISBN</label>
                             <input name="isbn_buku"
                                 class="form-control <?= ($validation->hasError('isbn_buku')) ? 'is-invalid' : ''; ?>"
                                 value="<?= $buku['isbn_buku'];?>">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('isbn_buku'); ?>
                             </div>
                         </div>

                         <div class="form-group">
                             <label>Judul</label>
                             <input type="text" name="judul_buku"
                                 class="form-control <?= ($validation->hasError('judul_buku')) ? 'is-invalid' : ''; ?>"
                                 value="<?= $buku['judul_buku'];?>" placeholder="">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('judul_buku'); ?>
                             </div>
                         </div>

                         <div class="form-group">
                             <label>Penerbit</label>
                             <select name="id_penerbit"
                                 class="form-control custom-select <?= ($validation->hasError('id_penerbit')) ? 'is-invalid' : ''; ?>">
                                 <option value="<?= $buku['id_penerbit'];?>"><?= $buku['nama_penerbit'];?></option>

                                 <?php foreach ($penerbit as $key => $value) { ?>
                                 <option value="<?=$value['id_penerbit']; ?>"><?=$value['nama_penerbit']; ?></option>
                                 <?php }?>

                             </select>
                             <select name="id_penerbit"
                                 class="form-control custom-select <?= ($validation->hasError('id_penerbit')) ? 'is-invalid' : ''; ?>">
                                 <?php 
                                 
                                 ?>
                                 <option value="<?= $buku['id_penerbit'];?>"><?= $buku['nama_penerbit'];?></option>

                                 <?php
                                 $a =  $buku['id_penerbit'];
                                 foreach ($penerbit as $key => $value) { 
                                     if ($a != $value['id_penerbit']) { ?>
                                 <option value="<?= $value['id_penerbit'];?>"><?=$value['nama_penerbit']; ?></option>

                                 <?php }
                                  }?>

                             </select>
                             <div class="invalid-feedback">
                                 <?=$validation->getError('id_penerbit'); ?>
                             </div>
                         </div>

                         <div class="form-group">
                             <label>Pengarang</label>
                             <input type="text" name="pengarang_buku"
                                 class="form-control <?= ($validation->hasError('pengarang_buku')) ? 'is-invalid' : ''; ?>"
                                 value="<?= $buku['pengarang_buku'];?>" placeholder="">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('pengarang_buku'); ?>
                             </div>
                         </div>


                     </div>
                     <div class="col-md">
                         <div class="form-group">
                             <label>Kategori</label>
                             <select name="id_kategori"
                                 class="form-control custom-select <?= ($validation->hasError('id_kategori')) ? 'is-invalid' : ''; ?>">
                                 <option value="<?= $buku['id_kategori'];?>"><?= $buku['nama_kategori'];?></option>

                                 <?php foreach ($kategori as $key => $value) { ?>
                                 <option value="<?=$value['id_kategori']; ?>"><?=$value['nama_kategori']; ?></option>
                                 <?php }?>

                             </select>
                             <div class="invalid-feedback">
                                 <?=$validation->getError('id_kategori'); ?>
                             </div>
                         </div>

                         <div class="form-group">
                             <label>Stok</label>
                             <input type="text" name="stok_buku"
                                 class="form-control <?= ($validation->hasError('stok_buku')) ? 'is-invalid' : ''; ?>"
                                 value="<?= $buku['stok_buku'];?>" placeholder="">
                             <div class="invalid-feedback">
                                 <?=$validation->getError('stok_buku'); ?>
                             </div>
                         </div>

                         <div class="form-group">
                             <label>Rak</label>
                             <select name="id_rak"
                                 class="form-control custom-select <?= ($validation->hasError('id_rak')) ? 'is-invalid' : ''; ?>">
                                 <option value="<?= $buku['id_rak'];?>"><?= $buku['nama_rak'];?></option>

                                 <?php foreach ($rak as $key => $value) { ?>
                                 <option value="<?=$value['id_rak']; ?>"><?=$value['nama_rak']; ?></option>
                                 <?php }?>

                             </select>
                             <div class="invalid-feedback">
                                 <?=$validation->getError('id_rak'); ?>
                             </div>
                         </div>

                         <div class="form-group">
                             <label>Sampul</label>
                             <!-- <div class="col-sm-2" id="teshide">
                                 <img src="" class="img-thumbnail img-preview">
                             </div> -->
                             <div class="custom-file">
                                 <input type="file" name="sampul_buku" id="sampul"
                                     class="custom-file-input <?= ($validation->hasError('sampul_buku')) ? 'is-invalid' : ''; ?>"
                                     onchange="previewLabel()">
                                 <div class="invalid-feedback">
                                     <?=$validation->getError('sampul_buku'); ?>
                                 </div>
                                 <label class="custom-file-label"><?= $buku['sampul_buku'];?></label>

                             </div>

                         </div>

                     </div>


                 </div>

                 <div class="modal-footer justify-content-between">

                     <a href="/Buku" class="btn btn-default">Kembali</a>
                     <button type="submit" class="btn btn-primary">Edit</button>
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