<div class="page-header">
    <h1>Tambah Karyawan</h1>
</div>
<div class="col-md-12">
    <?php echo form_open('profilSA/tambahKaryawan') ?>
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
                            <input name="idKaryawan" type="text" class="form-control" id="idKaryawan" placeholder="ID Karyawan">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Username :</label>
                            <input name="usernameKaryawan" type="text" class="form-control" id="usernameKaryawan" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Nama Karyawan :</label>
                            <input name="namaKaryawan" type="text" class="form-control" id="namaKaryawan" placeholder="Nama">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Password :</label>
                            <input name="passKaryawan" type="text" class="form-control" id="passKaryawan" placeholder="Password">
                        </div>
                    </div>
                    <br /><br /><br /><br />
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Role Karyawan :</label>
                            <select class="form-control" name="roleKaryawan" id="roleKaryawan">
                                <option value="1">Admin</option>
                                <option value="2">Super Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pull-right">
            <div class="col-md-12">
                <button class="btn btn-primary" type="submit">Save</button>
                <a class="btn btn-danger" href="<?php echo site_url('profilSA') ?>" role="button">Batal</a>
            </div>
        </div>
    </div>
    <?php echo form_close() ?>
</div>