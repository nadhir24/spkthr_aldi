<section id="wrapper">
        <div class="login-register" style="background-image:url(<?php echo base_url(); ?>assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="<?php echo site_url('LoginKaryawan/ceklogin') ?>" method="post" autocomplete="false">
                        <h3 class="box-title m-b-20">Masuk</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" id="nama_karyawan" name="nama_karyawan" placeholder="Nama Pengguna"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" id="password" name="password" type="password" required="" placeholder="Password"> </div>
                        </div>
                      
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Masuk</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <div>Apakah Kamu Mempunyai Akun? Jika Belum Silahkan<a href="<?php echo site_url('./daftar_karyawan')?>" class="text-info m-l-5"><b>Daftar</b></a></div>
                             
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="recoverform" action="index.html">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php 
$data = ob_get_clean();
include('masterpage_loginkaryawan.php');
ob_flush();
?>