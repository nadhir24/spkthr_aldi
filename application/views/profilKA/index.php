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

            </div>
            <div class="form-body">

       
                              
                              <form class="form-horizontal form-material" action="<?php echo site_url('profil/edit')?>" method="POST">
                            
                              <?php foreach($akunkaryawanadmin as $data){?>
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
                              <?php foreach($akunkaryawanadmin as $data){?>
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
                     
        
                       
                    
                  
