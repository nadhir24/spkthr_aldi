<div class="page-header">
    <h1>Tambah Karyawan</h1>
</div>
<div class="col-md-12">
    <?php echo form_open('profilSA/editKaryawan') ?>
    <div class="row">
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
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-inline">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>ID Karyawan :</label>
                            <input name="idKaryawan" type="text" class="form-control" id="idKaryawan" value="<?php echo $dataKaryawan[0]->id_karyawan; ?>" placeholder="ID Karyawan" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Username :</label>
                            <input name="usernameKaryawan" type="text" class="form-control" id="usernameKaryawan" value="<?php echo $dataKaryawan[0]->username; ?>" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Nama Karyawan :</label>
                            <input name="namaKaryawan" type="text" class="form-control" id="namaKaryawan" value="<?php echo $dataKaryawan[0]->nama_karyawan; ?>" placeholder="Nama">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Password :</label>
                            <input name="passKaryawan" type="text" class="form-control" id="passKaryawan" value="<?php echo $dataKaryawan[0]->password; ?>" placeholder="Password">
                        </div>
                    </div>
                    <br /><br /><br /><br />
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Role Karyawan :</label>
                            <select class="form-control" name="roleKaryawan" id="roleKaryawan">
                                <option value="1" <?php echo $dataKaryawan[0]->role == "1" ? "selected" : "" ?>>Admin</option>
                                <option value="2" <?php echo $dataKaryawan[0]->role == "2" ? "selected" : "" ?>>Super Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pull-right">
            <div class="col-md-12">
                <button class="btn btn-primary" type="submit">Edit</button>
                <a class="btn btn-danger" href="<?php echo site_url('profilSA') ?>" role="button">Batal</a>
            </div>
        </div>
    </div>
    <?php echo form_close() ?>
</div>