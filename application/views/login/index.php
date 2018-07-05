<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Freelance-Employ</title>
    <link rel="icon" type="image/bmp" href="<?=$this->config->base_url();?>assets/img/frelance_employ_fvicon.bmp"/>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?=$this->config->base_url();?>assets/css/bootstrap.min.css" type="text/css">
    <!-- Custom Fonts -->
    <link href='<?=$this->config->base_url();?>assets/fonts/google_apis_1.css' rel='stylesheet' type='text/css'>
    <link href='<?=$this->config->base_url();?>assets/fonts/google_apis_2.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?=$this->config->base_url();?>assets/font-awesome/css/fon_awesome_46.min.css" type="text/css">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?=$this->config->base_url();?>assets/css/animate.min.css" type="text/css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=$this->config->base_url();?>assets/css/creative.css" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="<?= $this->config->base_url();?>assets/css/bootstrap-select.min.css" rel="stylesheet">
    <script src="<?php echo $this->config->base_url();?>assets/js/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->base_url();?>assets/js/bootstrap-select.min.js" type="text/javascript"></script>
</head>
<body id="page-top">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top affix">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"style="color:#2A3F54;">
                <ul class="nav navbar-nav" >
                    <li>
                        <a class="page-scroll" href="#about">Acerca de Nosotros</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Tus Proyectos a un Paso</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Categorias</a>
                    </li>
                      <li>
                        <a class="page-scroll" href="<?=$this->config->base_url()?>login/como_funciona">Como Funciona? </a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contactanos</a>
                    </li>
                </ul>
                     <ul class="nav navbar-nav navbar-right" >
                     <li>
                        <a class="page-scroll" href="#mnuevousuario" data-toggle="modal"><button type="button" class="btn btn-info">Registrate</button></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#login" data-toggle="modal"><button type="button" class="btn btn-success">Ingresa</button></a>
                    </li>
 </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <br>
    <br>
    <br>
    <?$correcto = $this->session->flashdata('alerta');
    if (($correcto))
    {?>
<div class="animated bounceInDown">
<div class="alert alert alert-dismissible" role="alert" align="right">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><label><?=$correcto?></label>
  </strong>
</div>
</div>
<!--**********************************-->
    <?}else{?>
        <?}?>
    <header>
        <div class="header-content">
            <div class="header-content-inner">
            <br>
            <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
                <br>
                <br>
               <br>
               <br>
               <br>
               <br>
               <br>
                <h3 style="color: #2A3F54;">La Primera plataforma freelance del mundo GRATIS!</h3>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Mas</a>
            </div>
        </div>
    </header>
    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Asi como lo lees; !!Es Gratis!!</h2>
                    <hr class="light">
                    <p class="text-faded">No cobramos comisión en nuestra plataforma por Registro, Suscripción, Membresias, Trabajos realizados, Concursos, o Publicación de Proyectos.</p>
                    <a href="<?=$this->config->base_url()?>login/quienes_somos" class="btn btn-default btn-xl">Acerca de Nosotros</a>
                </div>
            </div>
        </div>
    </section>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Publica tus Proyectos !Es facil!</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-balance-scale wow bounceIn text-primary"></i>
                        <h3>Abogados</h3>
                        <p class="text-muted">Busca a los mejores Profesionales</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-cogs wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Ingenieros</h3>
                        <p class="text-muted">De todas las Areas!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-desktop wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Desarrolladores y diseñadores</h3>
                        <p class="text-muted">Escoje la categoria para tu proyecto</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-rocket wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Impulsa tu proyecto</h3>
                        <p class="text-muted">Contrata a los profesionales que se adapten a tu perfil!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="<?=$this->config->base_url();?>assets/img/portfolio/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                   Diseño Grafico
                                </div>
                                <div class="project-name">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="<?=$this->config->base_url();?>assets/img/portfolio/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Escritores
                                </div>
                                <div class="project-name">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="<?=$this->config->base_url();?>assets/img/portfolio/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                   Fotografos
                                </div>
                                <div class="project-name">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="<?=$this->config->base_url();?>assets/img/portfolio/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Desarrolladores
                                </div>
                                <div class="project-name">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="<?=$this->config->base_url();?>assets/img/portfolio/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                   Abogados
                                </div>
                                <div class="project-name">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="<?=$this->config->base_url();?>assets/img/portfolio/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Carpinteros
                                </div>
                                <div class="project-name">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Y Muchos mas!</h2>
                <a href="#" class="btn btn-default btn-xl wow tada">Click Aqui!</a>
            </div>
        </div>
    </aside>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Contactanos!</h2>
                    <hr class="primary">
                    <p>Listo para Empezar un proyecto con nosotros? !!Genial!!, haga clic en Registrate. o envianos un Mail sobre algunas sugerencias   </p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>41+079-934-44-68</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">info@freelance-employ.com</a></p>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
      <div class="container">
        <p class="text-muted" align="right">
       <a target="_blank" href="https://www.facebook.com/Freelanceemploy/"><img src="<?= $this->config->base_url();?>/images/fb_2.png" width="22" height="22"></i> &nbsp;Siguenos en Facebook  &nbsp;</a>
       <a target="_blank" href="https://twitter.com/?lang=es"><img src="<?= $this->config->base_url();?>/images/tw.png" width="22" height="22"> &nbsp;Siguenos en twitter  &nbsp;</a>
       <a target="_blank" href="https://plus.google.com/u/0/116489242292456419624/posts"><img src="<?= $this->config->base_url();?>/images/gp.png" width="22" height="22"></i> &nbsp;Siguenos en Google+  &nbsp;</a>
       <a target="_blank" href="https://es.pinterest.com/Freelanceemploy/"><img src="<?= $this->config->base_url();?>/images/pts.png" width="22" height="22"> &nbsp;Siguenos en Pinterest  &nbsp;</a><a target="_blank" href="https://www.youtube.com/channel/UC7nfQpsArOp-fR_L1U0uOXg"><img src="<?= $this->config->base_url();?>/images/yt.png" width="22" height="22"> &nbsp;Miranos en Youtube  &nbsp;</a>
       </p>
      </div>
    </footer>
    <script>
function caracteres(){
var espacios = false;
var cont = 0;
var p1 = document.getElementById("txt_clave1").value;
var p2 = document.getElementById("txt_clave2").value;
while (!espacios && (cont < p1.length)) {
  if (p1.charAt(cont) == " ")
    espacios = true;
  cont++;
}
$("select").val();
if (espacios) {
    document.getElementById('password1').style.display = 'block';
    document.getElementById('password2').style.display = 'none';
    document.getElementById('password3').style.display = 'none';
  return false;
}
if (p1.length == 0 || p2.length == 0) {
    document.getElementById('password1').style.display = 'none';
    document.getElementById('password2').style.display = 'none';
    document.getElementById('password3').style.display = 'block';
    document.getElementById('password4').style.display = 'none';
    document.getElementById('siguele').style.display = 'none';
  return false;
}
if (p1 != p2) {
  document.getElementById('password1').style.display = 'none';
    document.getElementById('password2').style.display = 'block';
    document.getElementById('password3').style.display = 'none';
    document.getElementById('password4').style.display = 'none';
    document.getElementById('siguele').style.display = 'none';
  return false;
} else {
    document.getElementById('password1').style.display = 'none';
    document.getElementById('password2').style.display = 'none';
    document.getElementById('password3').style.display = 'none';
    document.getElementById('password4').style.display = 'block';
    document.getElementById('siguele').style.display = 'block';
  return true;
}
}
</script>
    <!-- jQuery -->
    <script src="<?=$this->config->base_url();?>assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=$this->config->base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="<?=$this->config->base_url();?>assets/js/jquery.easing.min.js"></script>
    <script src="<?=$this->config->base_url();?>assets/js/jquery.fittext.js"></script>
    <script src="<?=$this->config->base_url();?>assets/js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src=".<?=$this->config->base_url();?>assets/js/creative.js"></script>
</body>
</html>
