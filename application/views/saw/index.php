<div class="page-header">
    <h1>Halaman Hitung Rangking </h1>
</div>


<div class="col-lg-12">

    <div class="row">
        <div class="panel panel-primary">

            <div class="panel-heading">Table Perhitungan</div>
            <div class="panel-body">
                <h2>Table 1 - Nilai Awal</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr class="active">
                            <th class="col-md-1 text-center">No</th>
                            <?php
                            $no = 1;
                            $table = $this->page->getData('table1');
                            foreach ($table as $item => $value) {
                                foreach ($value as $heading => $itemValue) {
                                    ?>
                                    <th class="text-center"><?php echo $heading ?></th>
                                    <?php
                                }
                                break;
                            }
                            ?>
                        </tr>
                        <?php
                        foreach ($table as $item => $value) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no ?></td>
                                <?php
                                foreach ($value as $itemValue) {
                                    ?>
                                    <td><?php echo $itemValue ?></td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>

                    </table>
                </div>

                <h2>Table 2 - Dihitung sesuai sifat cost atau benefit</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr class="active">
                            <th class="col-md-1 text-center">No</th>
                            <?php
                            $no = 1;
                            $table = $this->page->getData('table2');
                            foreach ($table as $item => $value) {
                                foreach ($value as $heading => $itemValue) {
                                    ?>
                                    <th class="text-center"><?php echo $heading ?></th>
                                    <?php
                                }
                                break;
                            }
                            ?>
                        </tr>
                        <?php
                        foreach ($table as $item => $value) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no ?></td>
                                <?php
                                foreach ($value as $itemValue) {
                                    ?>
                                    <td><?php echo $itemValue ?></td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </table>
                </div>

                <div class="table-responsive ">
                    <table class="table table-bordered">
                        <tr class="active">
                            <th class="col-md-1 text-center">No</th>
                            <th class="text-center">Kriteria</th>
                            <th class="text-center">Sifat</th>
                            <th class="text-center">Nilai min /max</th>
                        </tr>
                        <?php
                        $dataSifat = $this->page->getData('dataSifat');
                        $no = 1;
                        foreach ($dataSifat as $item => $value) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no ?></td>
                                <td><?php echo $item ?></td>
                                <td><?php echo $value->sifat ?></td>
                                <td>
                                    <?php
                                    $valueMinMax = $dataSifat = $this->page->getData('valueMinMax');
                                    if (isset($valueMinMax['min' . $item])) {
                                        echo $valueMinMax['min' . $item] . ' - Minimal';
                                    }
                                    if (isset($valueMinMax['max' . $item])) {
                                        echo $valueMinMax['max' . $item] . ' - Maksimal';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </table>
                </div>

                <h2>Table 3 - Dikali dengan bobot</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr class="active">
                            <th class="col-md-1 text-center">No</th>
                            <?php
                            $no = 1;
                            $table = $this->page->getData('table3');
                            foreach ($table as $item => $value) {
                                foreach ($value as $heading => $itemValue) {
                                    ?>
                                    <th class="text-center"><?php echo $heading ?></th>
                                    <?php
                                }
                                break;
                            }
                            ?>
                        </tr>
                        <?php
                        foreach ($table as $item => $value) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no ?></td>
                                <?php
                                foreach ($value as $itemValue) {
                                    ?>
                                    <td><?php echo $itemValue ?></td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </table>
                </div>

                <div class="table-responsive ">
                    <table class="table table-bordered">
                        <tr class="active">
                            <th class="col-md-1 text-center">No</th>
                            <th class="text-center">Kriteria</th>
                            <th class="text-center">Bobot</th>
                        </tr>
                        <?php
                        $bobot = $this->page->getData('bobot');
                        $no = 1;
                        foreach ($bobot as $item => $value) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no ?></td>
                                <td><?php echo $value->kriteria ?></td>
                                <td class="text-center"><?php echo $value->bobot ?></td>

                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </table>
                </div>
                <h2>Table 4 - Dijumlah sesuai dengan pelanggan dan di dapat hasil rangking</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr class="active">
                            <th class="col-md-1 text-center">No</th>
                            <?php
                            $no = 1;
                            $table = $this->page->getData('tableFinal');
                            foreach ($table as $item => $value) {
                                foreach ($value as $heading => $itemValue) {
                                    ?>
                                    <th class="text-center"><?php echo $heading ?></th>
                                    <?php
                                }
                                break;
                            }
                            ?>
                        </tr>
                        <?php
                        foreach ($table as $item => $value) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no ?></td>
                                <?php
                                foreach ($value as $itemValue) {
                                    ?>
                                    <td><?php echo $itemValue ?></td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </table>
                </div>

                <?php
                $table = $this->page->getData('tableFinal');
                $strRanking = ['Pertama','Kedua','Ketiga','Keempat','Kelima','Keenam','Ketujuh','Kedelapan','Kesembilan','Kesepuluh',
                'Kesebelas','Kedua Belas','Ketiga Belas','Keempat Belas','Kelima Belas','Keenam Belas','Ketujuh Belas','Kedelapan Belas',
                'Kesembilan Belas','Kedua Puluh','Kedua Puluh Satu','Kedua Puluh Dua','Kedua Puluh Tiga','Kedua Puluh Empat','Kedua Puluh Lima',
                'Kedua Puluh Enam','Kedua Puluh Tujuh','Kedua Puluh Delapan','Kedua Puluh Sembilan','Ketiga Puluh'];
                $i = 0;
                $j = 0;
                $kelipatan = 5;
                $currKelipatan = 1;
                foreach ($table as $item => $value) {
                    if ($currKelipatan == 3) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <h4>Dari hasil perhitungan yang dilakukan menggunakan metode SAW
                                pelanggan terbaik <?php echo $strRanking[$j]; ?> untuk diberi THR senilai <b>Rp 500.000,00</b> adalah
                               <b> <?php echo $value->Pelanggan ?> </b>dengan nilai <?php echo $value->Total ?>
                            </h4>
                        </div>
                        <?php
                    }
                     elseif ($currKelipatan == 4) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <h4><b></b> Dari hasil perhitungan yang dilakukan menggunakan metode SAW
                               pelanggan terbaik <?php echo $strRanking[$j]; ?> untuk diberi THR senilai <b>Rp 250.000,00</b><b>
                                <?php echo $value->Pelanggan ?> </b>dengan nilai <?php echo $value->Total ?>
                            </h4>
                        </div>
                        <?php
                    }
                     elseif ($currKelipatan == 1) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <h4><b>Kesimpulan : </b> Dari hasil perhitungan yang dilakukan menggunakan metode SAW
                                pelanggan terbaik <?php echo $strRanking[$j]; ?> untuk diberi THR senilai <b>Rp 1.000.000,00</b><b>
                                <?php echo $value->Pelanggan ?></b> dengan nilai <?php echo $value->Total ?>
                            </h4>
                        </div>
                        <?php
                    }
                    elseif ($currKelipatan == 2) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <h4><b>Kesimpulan : </b> Dari hasil perhitungan yang dilakukan menggunakan metode SAW
                                pelanggan terbaik <?php echo $strRanking[$j]; ?> untuk diberi THR senilai <b>Rp 800.000,00</b><b>
                                <?php echo $value->Pelanggan ?></b> dengan nilai <?php echo $value->Total ?>
                            </h4>
                        </div>
                        <?php
                    }

                    $i++;
                    $j++;
                    if($i % $kelipatan == 0) {
                        $currKelipatan++;
                        $i = 0;
                    }
                }
                ?>
            </div>
        </div>
    </div>

</div>

