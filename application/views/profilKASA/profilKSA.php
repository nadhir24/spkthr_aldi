<div class="page-header">
        <h1>Edit Karyawan</h1>
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
         
        </div>
    </div>

</div>
