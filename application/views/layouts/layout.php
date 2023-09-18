<!doctype html>
<html lang="en">
<head>
    <title>
        <?php echo $this->page->generateTitle(); ?>
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        $this->page->generateCss();
    ?>

    <style>
        body { padding-top: 70px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top ">
            <div class="container">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand active" href="<?php echo site_url()?>">SPK THR Pelanggan</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <?php
                            if(!empty($_SESSION['Super Admin'])) {
                            ?>
                            <li
                                <?php if( $this->uri->segment(1) == 'kriteria'){
                                    ?>
                                    class="active"
                                    <?php
                                }?>
                            ><a href="<?php echo site_url('kriteria');?>">Kriteria</a></li>
                            <?php
                            }
                            ?>
                            <?php
                            if(empty($_SESSION['Super Admin'])) {
                            ?>
                            <li
                                <?php if( $this->uri->segment(1) == 'profil'){
                                    ?>
                                    class="active"
                                    <?php
                                }?>
                            ><a href="<?php echo site_url('profil');?>">Profil Karyawan</a></li>
                            <?php
                            }
                            else {
                            ?>
                            <li
                                <?php if( $this->uri->segment(1) == 'profilSA'){
                                    ?>
                                    class="active"
                                    <?php
                                }?>
                            ><a href="<?php echo site_url('profilSA');?>">Profil Karyawan</a></li>
                            <?php
                            }
                            ?>
                            <li
                                <?php if( $this->uri->segment(1) == 'pelanggan'){
                                    ?>
                                    class="active"
                                    <?php
                                }?>
                            ><a href="<?php echo site_url('pelanggan');?>">Pelanggan</a></li>
                            
                            <li
                                <?php if( $this->uri->segment(1) == 'rangking'){
                                    ?>
                                    class="active"
                                    <?php
                                }?>
                            ><a href="<?php echo site_url('rangking');?>">Penentuan THR</a></li>
                            <li
                                <?php if( $this->uri->segment(1) == 'logout'){
                                    ?>
                                    class="active"
                                    <?php
                                }?>
                            ><a href="<?php echo site_url('logout');?>">Logout</a></li>
                           

                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div>


            </div>
        </nav>
    </div>

    <div class="container">
            <?php $this->load->view($view,$data);?>
    </div>

    <script>
        var base_url = "<?php echo site_url();?>";
    </script>
    <?php
            $this->page->generateJs();
    ?>

</body>
</html>