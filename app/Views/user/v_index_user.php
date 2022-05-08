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
             <a href="" class="btn btn-primary" data-toggle="modal" data-target="#add_user">+Tambah User</a>
         </div>


         <div class="card-body pt-0">
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
                                 <a href="" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                 <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                             </td>

                         </tr>


                         <?php } ?>

                     </tbody>
                 </table>
             </div>
         </div>
     </div>

     <!-- modal -->
     <div class="modal fade" id="add_user">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Tambah User</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <p>
                     <form action="http://localhost/pengarsipan/admin/tambahsm" enctype="multipart/form-data"
                         method="post" accept-charset="utf-8">
                         <div class="card-body row">
                             <div class="col-md">
                                 <div class="form-group">
                                     <label>Nama</label>
                                     <input type="text" name="nama" class="form-control">
                                 </div>

                                 <div class="form-group">
                                     <label>Sub Bagian</label>
                                     <select class="form-control" name="id_subbagian">
                                         <option selected>Pilih</option>
                                         <option value="1">
                                             PERENCANAAN </option>
                                         <option value="2">
                                             KEUANGAN </option>
                                         <option value="6">
                                             KETATA USAHAAN </option>
                                         <option value="10">
                                             SARANA DAN PRASARANA </option>
                                         <option value="11">
                                             KESENIAN </option>
                                         <option value="19">
                                             KEPEGAWAIAN </option>
                                         <option value="20">
                                             PERLENGKAPAN </option>
                                         <option value="21">
                                             ORGANISASI </option>
                                         <option value="22">
                                             PENDIDIKAN </option>
                                         <option value="23">
                                             KURIKULUM/PENGAWASAN </option>
                                         <option value="24">
                                             OLAHRAGA </option>
                                     </select>
                                 </div>

                                 <div class="form-group">
                                     <label>Email</label>
                                     <input type="text" name="email" class="form-control" placeholder="" required="">
                                 </div>
                                 <div class="form-group">
                                     <label>Nomor Telepon</label>
                                     <input type="text" name="notelp" class="form-control" placeholder="" required="">
                                 </div>
                                 <div class="form-group">
                                     <label>Alamat</label>
                                     <textarea name="alamat" class="form-control" placeholder="" required=""></textarea>
                                 </div>


                             </div>
                             <div class="col-md">
                                 <div class="form-group">
                                     <label>Username</label>
                                     <input type="text" name="nusername" class="form-control">
                                 </div>
                                 <div class="form-group">
                                     <label>Password</label>
                                     <input type="password" name="password" class="form-control" placeholder=""
                                         required="">
                                 </div>
                                 <div class="form-group">
                                     <label>Konfirmasi Password</label>
                                     <input type="password" name="konfpassword" class="form-control" placeholder=""
                                         required="">
                                 </div>

                                 <div class="form-group">
                                     <label>Level</label>
                                     <select class="form-control" name="id_level">
                                         <option selected>Pilih</option>
                                         <option value="1">
                                             PERENCANAAN </option>
                                         <option value="2">
                                             KEUANGAN </option>
                                         <option value="6">
                                             KETATA USAHAAN </option>
                                         <option value="10">
                                             SARANA DAN PRASARANA </option>
                                         <option value="11">
                                             KESENIAN </option>
                                         <option value="19">
                                             KEPEGAWAIAN </option>
                                         <option value="20">
                                             PERLENGKAPAN </option>
                                         <option value="21">
                                             ORGANISASI </option>
                                         <option value="22">
                                             PENDIDIKAN </option>
                                         <option value="23">
                                             KURIKULUM/PENGAWASAN </option>
                                         <option value="24">
                                             OLAHRAGA </option>
                                     </select>
                                 </div>

                                 <div class="form-group">
                                     <label>Foto</label>
                                     <div class="input-group">
                                         <div class="custom-file">
                                             <input type="file" name="foto" class="custom-file-input">
                                             <label class="custom-file-label">Pilih file</label>
                                         </div>
                                     </div>
                                     <small class="text-danger">Upload foto dalam file png atau jpg.</small>
                                 </div>

                             </div>

                             <!-- <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="keterangan"
                                            placeholder="Keterangan"></textarea>
                                 </div> -->
                         </div>
                 </div>
                 <!-- /.card-body -->
                 </p>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                     <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                 </div>
             </div>

             </form>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 <script>
var element = document.getElementById("datauser");
element.classList.add("active");
 </script>