<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<?php
        foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>

  <title>Freelance-Employ</title>
   <link rel="icon" type="image/bmp" href="<?=$this->config->base_url();?>assets/img/frelance_employ_fvicon.bmp"/>
  <!-- Bootstrap core CSS -->
<!--<link href="<?= $this->config->base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">-->
 <!-- <link href="<?= $this->config->base_url();?>assets/css/fonts/css/font-awesome.min.css" rel="stylesheet">-->
  <link href="<?= $this->config->base_url();?>assets/css/animate.min.css" rel="stylesheet">
  <link href="<?= $this->config->base_url();?>assets/css/bootstrap-select.min.css" rel="stylesheet">

<!--*******************************************************************-->


  <script src="<?php echo $this->config->base_url();?>assets/js/jquery-1.9.1.js" type="text/javascript"></script>
  <!-- <script src="<?php echo $this->config->base_url();?>assets/js/jquery-ui.js"></script>
   Custom styling plus plugins -->
     <script src="<?php echo $this->config->base_url();?>assets/js/bootstrap-select.min.js" type="text/javascript"></script>
  <link href="<?= $this->config->base_url();?>assets/css/custom.css" rel="stylesheet">
 <!-- <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />-->
  <link href="<?= $this->config->base_url();?>assets/css/icheck/flat/green.css" rel="stylesheet" />
  <link href="<?= $this->config->base_url();?>assets/css/floatexamples.css" rel="stylesheet" type="text/css" />
<!--<script src="<?= $this->config->base_url();?>assets/js/jquery.min.js"></script>-->
  <script src="<?= $this->config->base_url();?>assets/js/nprogress.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

