<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content=" web development">
        <meta name="author" content="">
        <title>
            Codaemon Software
        </title>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
        <!-- Optional Bootstrap Theme -->
        <link href="data:text/css;charset=utf-8," data-href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet">
        <!-- Documentation extras -->
        <link href="<?php echo base_url(); ?>assets/css/docs.min.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="<?php echo base_url(); ?>assets/js/ie-emulation-modes-warning.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Favicons -->
        <link href="<?php echo base_url(); ?>assets/img/medicalclinic.png" rel="shortcut icon">
        <link rel="icon" href="/favicon.ico">
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/docs.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?php echo base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>
    </head>
    <body>
        <?php
        $userName = $this->session->userdata('userName');
        $userType = $this->session->userdata('userType');
        $segment = trim($this->uri->segment(2));
        $segment3 = trim($this->uri->segment(3));
        ?>
        <!-- Docs master nav -->
        <header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">SAMPLE CODE</a>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="pull-right logout" href="<?php echo base_url(); ?>login/index/logout"><i class="icon-off icon-white"></i> Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="container bs-docs-container">
            <div class="row">
                <div class="col-md-3" role="main">
                    <div class="bs-docs-section">
                        <div class="list-group">
                            <a href="<?php echo base_url(); ?>admin/customer/index" class="list-group-item <?php
                            if (( $segment == 'customer' && $segment3 == 'index' ) || ( $segment == 'bill' )) {
                                echo 'active';
                            }
                            ?>" >
                                Customers
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9" role="complementary">