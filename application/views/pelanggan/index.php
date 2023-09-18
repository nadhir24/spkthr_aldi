<div class="page-header">
    <h1>Halaman Olah Pelanggan</h1>
</div>
<div class="col-lg-12">
    <?php
    $msg = $this->session->flashdata('message');
    if (isset($msg)) {
        ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?php echo $msg; ?>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="panel panel-primary">

            <div class="panel-heading">List Pelanggan</div>
            <div class="panel-content">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-6">Nama Pelanggan</th>
                            <th class="col-md-5 ">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        if (isset($pelanggan)) {
                            if(count($pelanggan) == 0){
                                echo '<tr><td colspan="3" class="text-center"><h3>No Data Input</h3></td></tr>';
                            }
                            foreach ($pelanggan as $item) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $item->pelanggan ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-xs"
                                           href="<?php echo site_url('pelanggan/tambah/' . $item->kdPelanggan) ?>"
                                           role="button">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ubah
                                        </a>

                                        <!-- Indicates a dangerous or potentially negative action -->
                                        <button type="button" data-toggle="modal" class="btn btn-danger btn-xs"
                                                data-target="#modalDelete<?php echo $item->kdPelanggan; ?>">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Hapus
                                        </button>

                                        <div class="modal fade" tabindex="-1" role="dialog" id="modalDelete<?php echo $item->kdPelanggan; ?>">
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
                                                        <button type="button" class="btn btn-danger"
                                                                onclick="hapus_pelanggan(<?php echo $item->kdPelanggan; ?>)">
                                                            Hapus
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <a href="<?php echo site_url('pelanggan/tambah') ?>" type="button" class="btn btn-primary">Tambah
                Pelanggan</a>
        </div>

    </div>

</div>
