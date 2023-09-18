<?php ob_start(); ?>
        <?php
            $connect = mysqli_connect("localhost", "root", "","db_spk");
            mysqli_select_db($connect,"db_spk");
        ?>
<section id="wrapper">
        <div class="login-register" style="background-image:url(<?php echo base_url(); ?>assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="<?php echo site_url('Daftar_Karyawan/tambah')?>" method="post" enctype="multipart/form-data" class="">
                        <h3 class="box-title m-b-20">Buat Akun Kamu Disini</h3>
                        <?php
                            $connect = mysqli_connect("localhost", "root", "","db_spk");
                            mysqli_select_db($connect,"db_spk");
                            $que = mysqli_query($connect,"SELECT max(id_karyawan) as maxID FROM karyawan WHERE id_karyawan LIKE 'KRY%'");
                            if(mysqli_num_rows($que) > 0) {
                            $max = mysqli_fetch_array($que);
                            $idmax = $max['maxID'];

                            $no = (int) substr($idmax,3,3);
                            $no++;
                            $IDbaru = 'KRY' . sprintf('%03s', $no);}
                            ?>
                            <input type="hidden" class="control-label mb-1" name="id_karyawan" value="<?php echo $IDbaru ?>" required>
                
                            <div class="form-group m-t-20">
                        <div class="col-xs-12">
                            <input class="form-control" id="nama_karyawan" name="nama_karyawan" type="text" required="" placeholder="Nama Pengguna">
                            <p id="valNama" name="valNama" style="color: red; font-weight: bold; font-family: arial; text-align: center;"></p>
                        </div>
                    </div>
                    <div class="form-group m-t-20">
                        <div class="col-xs-12">
                            <input class="form-control" id="username" name="username" type="text" required="" placeholder="Nama Lengkap">
                            <p id="valNama" name="valNama" style="color: red; font-weight: bold; font-family: arial; text-align: center;"></p>
                        </div>
                    </div>
                    <div class="form-group m-t-20">
                        <div class="col-xs-12">
                            <input class="form-control" id="password" name="password" type="text" required="" placeholder="Password">
                            <p id="valNama" name="valNama" style="color: red; font-weight: bold; font-family: arial; text-align: center;"></p>
                        </div>
                    </div>
                   
                  
                  
                    <div class="form-group m-t-20">
                        <div class="col-xs-12">
                                        <div class="input-group-addon">Role</div>
                                        <select name="role" id="role" class="form-control">
                                                <option value="1">Admin</option>
                                                <option value="2">Super Admin</option>
                                        </select>
                                    </div>
                                </div> 
                            
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Daftar</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <div>Sudah Punya Akun? <a href="<?php echo site_url('./loginKaryawan')?>" class="text-info m-l-5"><b>Masuk</b></a></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </section>
    <script>
                //SCRIPT FOR EMAIL
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
 
                var emailaddressVal = $("#email").val();
                if(emailaddressVal == '') {
                    $("#emailNotif").text('Please enter your email address');
                }
         
                else if(!emailReg.test(emailaddressVal)) {
                    $("#emailNotif").text('Enter a valid email address');
                    
                }else if(emailaddressVal != '') {
                    $("#emailNotif").text('');
                }
            });
        });
        </script>
        <script>
            var nama_stat = false;
	var hp_stat = false;



$("#nama_karyawan").keyup(function(){
			var nama = /^[A-Z a-z]+$/;
		    if(nama.test(document.getElementById("nama_karyawan").value)) {
		       document.getElementById("valNama").innerHTML = "";
		       nama_stat = true;
		       if(nama_stat == true && hp_stat == true) {
					$("#submit").prop("disabled", false);
				} else {
					$("#submit").prop("disabled", true);
				}
		    }
		    else if(document.getElementById("nama_karyawan").value == "") {
		       document.getElementById("valNama").innerHTML = "Nama Tidak Boleh Kosong !";
		       nama_stat = false;
		       if(nama_stat == true && hp_stat == true) {
					$("#submit").prop("disabled", false);
				} else {
					$("#submit").prop("disabled", true);
				}
		    }
		    else {
		       document.getElementById("valNama").innerHTML = "Nama Tidak Boleh Mengandung Angka !";
		       nama_stat = false;
		       if(nama_stat == true && hp_stat == true) {
					$("#submit").prop("disabled", false);
				} else {
					$("#submit").prop("disabled", true);
				}
		    }
		});




$("#telepon").keyup(function(){
			if(document.getElementById("telepon").value == "") {
				document.getElementById("valHp").innerHTML = "No. HP Tidak Boleh Kosong !";
				$("#submit").prop("disabled", true);
				hp_stat = false;
				if(nama_stat == true && hp_stat == true) {
					$("#submit").prop("disabled", false);
				} else {
					$("#submit").prop("disabled", true);
				}
			} else {
				document.getElementById("valHp").innerHTML = "";
				$("#submit").prop("disabled", false);
				hp_stat = true;
				if(nama_stat == true  && hp_stat == true) {
					$("#submit").prop("disabled", false);
				} else {
					$("#submit").prop("disabled", true);
				}
			}
		});
        </script>
    <?php
$data = ob_get_clean();
include('masterpage_loginkaryawan.php');
ob_flush();
?>