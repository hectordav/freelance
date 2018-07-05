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
                        <a class="page-scroll" href="#about">Quienes Somos?</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Que Ofrecemos?</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Que Buscamos?</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contactanos</a>
                    </li>

                </ul>
                     <ul class="nav navbar-nav navbar-right" >
                     <li>
                        <a class="page-scroll" href="<?=$this->config->base_url()?>" data-toggle="modal"><button type="button" class="btn btn-info">Principal</button></a>
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
                    <h2 class="section-heading">QUIÉNES SOMOS</h2>
                    <hr class="light">
                    <p class="text-faded" align="justify">Somos una empresa de innovación tecnológica, sólida, dinámica, flexible y que nos adaptamos al cambio.
La innovación es una de nuestras preocupaciones.
Equipo humano comprometido y altamente profesional.
crecimiento económico, equilibrio y progreso social.
Experiencia y liderazgo internacional.
Oportunidades de desarrollo profesional.
Balance entre la vida profesional y personal.
</p>

                </div>
            </div>
        </div>
    </section>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"></h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">

                         <h3>Qué ofrecemos</h3>
                        <p class="text-muted" align="justify">La incorporación a un equipo formado por profesionales de gran talento y experiencia con los que aprenderás y desarrollarás tus capacidades.
Nos preocupamos por la formación y el desarrollo permanente de las personas que trabajan en nuestra compañía, y los acompañamos en su evolución profesional
</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">

                        <h3>Entorno de innovación tecnológica</h3>
                        <p class="text-muted" align="justify">Trabajar en un entorno puntero en innovación dentro de nuestro sector, donde la preocupación por la innovación tecnológica es una constante en los planes estratégicos de la compañía.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">

                        <h3>Experiencia y oportunidades internacionales</h3>
                        <p class="text-muted" align="justify">Te ofrecemos la oportunidad de trabajar en un grupo multinacional formado por profesionales diversos en cultura, experiencia y conocimientos, con los que podrás aprender y compartir.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">

                        <h3>Nuestra Dedicacion</h3>
                        <p class="text-muted" align="justify">Nos dedicamos a crear empresa y dar soluciones y mejoramiento de calidad de vida a las personas a través de nuestras plataformas de nueva tecnología y ofrecemos oportunidades profesionales no sólo en los ámbitos técnicos, sino en todas las actividades de gestión y apoyo.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Qué buscamos</h2>
                 <div class="col-lg-5 col-lg-offset-3 text-center">
                    <div class="service-box">
                         <div class="container">
                            <div class="row">

                        <p class="text-faded" align="justify">Freelance-employ.com busca personas como tú:</p>
                        <ul>
                            <p align="justify">
                            <i class="fa fa-check-square-o"></i>&nbsp;Con ganas de integrarse en un gran equipo
                            <p align="justify">
                            <i class="fa fa-check-square-o"></i>&nbsp;Capaces de adaptarse al cambio.
                            <p align="justify">
                            <i class="fa fa-check-square-o"></i>&nbsp;Innovadoras.
                            <p align="justify">
                            <i class="fa fa-check-square-o"></i>&nbsp;Comprometidas.
                            <p align="justify">
                            <i class="fa fa-check-square-o"></i>&nbsp;Responsables
                            <p align="justify">
                            </p>

                        </ul>
</p>
</div></div>
                    </div>
                </div>
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
       <a target="_blank" href="https://www.facebook.com/Freelanceemploy/"><i class="fa fa-facebook-square  "></i> &nbsp;Siguenos en Facebook  &nbsp;</a>
       <a target="_blank" href="https://twitter.com/?lang=es"><i class="fa fa-twitter-square "></i> &nbsp;Siguenos en twitter  &nbsp;</a>
       <a target="_blank" href="https://plus.google.com/u/0/116489242292456419624/posts"><i class="fa fa-google-plus-square "></i> &nbsp;Siguenos en Google+  &nbsp;</a>
       <a target="_blank" href="https://es.pinterest.com/Freelanceemploy/"><i class="fa fa-pinterest-square"></i> &nbsp;Siguenos en Pinterest  &nbsp;</a><a target="_blank" href="https://www.youtube.com/channel/UC7nfQpsArOp-fR_L1U0uOXg"><i class="fa fa-youtube-square  "></i> &nbsp;Miranos en Youtube  &nbsp;</a>



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
