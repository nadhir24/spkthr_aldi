<?php ob_start(); ?>
        <?php
            $connect = mysqli_connect("localhost", "root", "","db_spk");
            mysqli_select_db($connect,"db_spk");
        ?>
<div class="page-header">
        <h1>Lihat Akun</h1>
    </div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="errors">
                <?php
                $errors = $this->session->flashdata('errors');
                if (isset($errors)) {
                    foreach ($errors as $error) {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <?php echo $error; ?>
                        </div>
                        <?php
                    }
                }
                ?>
                <?php
                $success = $this->session->flashdata('message');
                if (isset($success)) {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <?php echo $success; ?>
                    </div>
                    <?php
                }
                ?>

            </div>

            <div class="row">
                <div class="form-group">
                    <a href="<?php echo site_url('profilSA/viewTambahKaryawan') ?>" type="button" class="btn btn-primary">Tambah Karyawan</a>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">List Karyawan</div>
                    <div class="panel-content">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($allakunkaryawanadminSA as $item) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $item->id_karyawan ?></td>
                                            <td><?php echo $item->username ?></td>
                                            <td><?php echo $item->nama_karyawan ?></td>
                                            <td><?php echo $item->password ?></td>
                                            <td><?php echo $item->role == "1" ? "Admin" : "Super Admin" ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-xs" href="<?php echo site_url('profilSA/viewEditKaryawan/' . $item->id_karyawan) ?>" role="button">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ubah
                                                </a>
                                                <button type="button" data-toggle="modal" class="btn btn-danger btn-xs"
                                                        data-target="#modalDelete<?php echo $item->id_karyawan; ?>">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Hapus
                                                </button>
                                                <div class="modal fade" tabindex="-1" role="dialog" id="modalDelete<?php echo $item->id_karyawan; ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">Konfirmasi hapus data</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Apakah anda yakin menghapus data ini ? </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <a class="btn btn-danger" href="<?php echo site_url('profilSA/deleteKaryawan/' . $item->id_karyawan) ?>">
                                                                    Hapus
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-body">

       
                              
                              <form class="form-horizontal form-material" action="<?php echo site_url('profilSA/edit')?>" method="POST">
                            
                              <?php foreach($akunkaryawanadminSA as $data){?>
                                <?php } ?> 
                                  <div class="form-group">
                                      <label class="col-md-12">ID Karyawan</label>
                                      <div class="col-md-12">
                                          <input type="text" id="id_karyawan" name="id_karyawan" class="form-control form-control-line" value="<?php echo $data->id_karyawan; ?>" readonly required>
                                      </div>
                                  </div>
                              <div class="form-group">
                                      <label class="col-md-12">Nama Pengguna</label>
                                      <div class="col-md-12">
                                          <input type="text" id="nama_karyawan" name="nama_karyawan" class="form-control form-control-line" required value="<?php echo $data->nama_karyawan; ?>"readonly required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-md-12">Password</label>
                                      <div class="col-md-12">
                                          <input type="text" id="password" name="password" class="form-control form-control-line" required value="<?php echo $data->password; ?>"readonly required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-md-12">Role</label>
                                      <div class="col-md-12">
                                          <input type="text" id="role" name="role" class="form-control form-control-line" required value="<?php if($data->role == "1"){echo "Admin";}else{echo "Super Admin";}?>"readonly required>
                                      </div>
                                  </div>
                                  
                                 
                              
                              <div class="page-header">
                                     <h1>Ubah Akun</h1>
                             </div>
                              <?php foreach($akunkaryawanadminSA as $data){?>
                                <?php } ?> 
                              <div class="form-group">
                                      <label class="col-md-12">Nama Pengguna</label>
                                      <div class="col-md-12">
                                          <input type="text" id="nama_karyawan" name="nama_karyawan" class="form-control form-control-line" required value="<?php echo $data->nama_karyawan; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-md-12">Password</label>
                                      <div class="col-md-12">
                                          <input type="text" id="password" name="password" class="form-control form-control-line" required value="<?php echo $data->password; ?>">
                                      </div>
                                  </div>
                                  
                               
                                  <div class="form-group">
                                      <div class="col-sm-12">
                                          <button class="btn btn-success" type="edit" ID="edit">Ubah Profile</button>
                                          
                                      </div>
                                  </div>
                                
                                  
                             
                                  </form>
                              
                          </div>
                          
                      </div>
                     
        
                       
                    
                  
