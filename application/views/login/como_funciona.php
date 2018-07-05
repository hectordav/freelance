<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
      <link rel="icon" type="image/bmp" href="<?=$this->config->base_url();?>assets/img/frelance_employ_fvicon.bmp"/>
    <title>Freelance-Employ</title>
    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="<?=$this->config->base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=$this->config->base_url()?>assets/css/freelancer.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?=$this->config->base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" class="index">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">Freelance-Employ</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Como lo Hago</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">Que Tareas Puedo Solicitar</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Beneficios</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Header -->
    <header>
            <div class="row">
                <div class="col-lg-12">
                <video poster="<?=$this->config->base_url()?>img/frelance_employ.jpg" width="1350" autoplay muted loop>
                <source src="<?=$this->config->base_url()?>assets/videos/freelance_employ.webm" type='video/webm; codecs="vp8,vorbis"' />
          <source src="<?=$this->config->base_url()?>assets/videos/freelance_employ.MP4" type='video/mp4; codecs="avc1,mp4a"' />

                </video>
                </div>
            </div>
    </header>
    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>¿Como lo hago?  </h2>
                      <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus">Consiste en realizar trabajos propios de su ocupación, oficio o profesión, de forma autónoma para terceros que requieren sus servicios</i>
                            </div>
                        </div>
                        <img src="<?=$this->config->base_url()?>assets/img/freelance.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus ">Persona, o empresa interesada en suplir o realizar una tarea, trabajo o proyecto</i>
                            </div>
                        </div>
                        <img src="<?=$this->config->base_url()?>assets/img/empleadores.png" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>¿Que tareas puedo solicitar?</h2>
                    <hr class="star-light">
                    <div align="justify">
                     <h4>Todo tipo de trabajos y oficios, en nuestra plataforma encuentras todo tipo de profesionales certificados y empíricos, desde:</h4>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                 <div align="justify">
                    <p>Informáticos, abogados, contables, Publicistas, Escritores, Ingenieros, Técnicos, Electricistas, fontaneros, Empleadas de Hogar, jardineros, Constructores Etc</p>
                     </div>
                </div>

                <div class="col-lg-8 col-lg-offset-2 text-center">
                <br>
                    <a href="<?=$this->config->base_url()?>" class="btn btn-lg btn-default">
                        <i class="fa fa-sign-in"></i>&nbsp;Registrate aquí
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Beneficios</h2>
                    <hr class="star-primary ">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                   <div class="modal-body">

                            <div align="justify">
                            <ul style="list-style:none">
                            <h1>
                                <li> <p><strong>1-</strong>&nbsp;Realiza tu trabajo desde cualquier lugar y a la hora que desees</p></li>
                                <li><p><strong>2-</strong>&nbsp;Eres tu propio jefe</p></li>
                                <li> <p><strong>3-</strong>&nbsp;Gana Dinero rápidamente y de forma segura, aunque su cliente este al otro lado del  mundo y su pago es seguro</li>
                                </h1>

                            </ul>

</div>

                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer id ="portfolio"class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Contactanos</h3>
                        <i class="fa fa-phone fa-3x wow bounceIn"></i>
                        <p>41+079-934-44-68</p>
                        <h3></h3>
                        <i class="fa fa fa-envelope-o fa-3x wow bounceIn"></i>
                        <p>info@freelance-employ.com</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Siguenos</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com/Freelanceemploy/" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://plus.google.com/u/0/116489242292456419624/posts" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/?lang=es" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://es.pinterest.com/Freelanceemploy/" class="btn-social btn-outline"><i class="fa fa-fw fa-pinterest"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UC7nfQpsArOp-fR_L1U0uOXg" class="btn-social btn-outline"><i class="fa fa-fw fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Acerca de</h3>
                        <p><a href="<?=$this->config->base_url()?>login/condicion"class="btn btn-default">Clic Aqui</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; SERVICES GROUP AG 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Registrarse es Muy Facil</h2>
                            <hr class="star-primary">
                            <img src="<?=$this->config->base_url()?>assets/img/Imagen_13.png" class="img-responsive img-centered" alt=""><div align="justify">
                            <ul style="list-style:none">
                                <li> <p><strong>1-</strong>&nbsp;Llena el Formulario de registro en nuestra pagina <a href="<?=$this->config->base_url()?>">freelance-employ.com</a>. Nosotros no cobramos comisiones por membresias,  consursos, trabajo realizado por el freelancer</p></li>
                                <li><p><strong>2-</strong>&nbsp;Completa tu perfil, defina los servicios que desea ofrecer, habilidades,    preferencias, idioma etc</p></li>
                                <li> <p><strong>3-</strong>&nbsp;Presenta propuestas a proyectos publicados en categorias de su profesion,  incluyendo precio.</p></li>
                                <li><p><strong>4-</strong>&nbsp;Al recibir la aceptacion a su propuesta, el cliente realiza el pago atraves de nuestra plataforma, quedando en garantia hasta la finalizacion del proyecto. </p>
<p><strong>5-</strong>&nbsp;Al finalizar el proyecto y el cliente confirmar su satisfaccion liberaremos el pago</p></li>

                            </ul>

</div>
<strong><h3>Y lo mas importante no te cobramos comisiones.</h3></strong>
                            <ul class="list-inline item-details">
                                <li>
                                <strong><a class="btn btn-primary btn-lg " href="<?=$this->config->base_url()?>"><i class="fa fa-sign-in"></i> Registrate</a>
                                    </strong>
                                </li>
                                <li><strong><a class="btn btn-success btn-lg " href="<?=$this->config->base_url()?>login/condicion"><i class="fa fa-info-circle "></i> Mas Info</a>
                                    </strong>
                                </li>

                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Registrarse es Muy Facil</h2>
                            <hr class="star-primary">
                            <img src="<?=$this->config->base_url()?>assets/img/Imagen_23.png" class="img-responsive img-centered" alt="">
                           <div align="justify">
                            <ul style="list-style:none">
                                <li> <p><strong>1-</strong>&nbsp;Llena el Formulario de registro en nuestra pagina <a href="<?=$this->config->base_url()?>">freelance-employ.com</a> y registrate como Cliente</p></li>
                                <li><p><strong>2-</strong>&nbsp;Haga clic en el menú Mis Proyectos Crea tu proyecto (Explica brevemente el trabajo a realizar)</p></li>
                                <li> <p><strong>3-</strong>&nbsp;De manera inmediata los freelancer con los conocimientos suficientes para realizar tu proyecto presentaran su propuesta, garantizando calidad, tiempo y el mejor precio del mercado</p></li>
                                <li><p><strong>4-</strong>&nbsp; Habla con los diferentes Freelancer y Selecciona el que mejor se adapte a su necesidad, calidad, precio</p>
<li><p><strong>5-</strong>&nbsp; Adjudica tu proyecto para que el freelancer empiece a trabajar</p></li>
<li><p><strong>6-</strong>&nbsp; Y lo mejor pagas por medio de nuestra plataforma, quedando el dinero en garantia hasta finalizar el trabajo y estar conforme al 100%</p></li>
<li><p><strong>7-</strong>&nbsp; Al confirmarnos la finalización del proyecto y la conformidad, liberaremos el pago al freelancer. Todas nuestras transacciones son seguras y encriptadas mediante SSL </p></li>

                            </ul>

</div>
                            <ul class="list-inline item-details">
                                <li>
                                <strong><a class="btn btn-primary btn-lg " href="<?=$this->config->base_url()?>"><i class="fa fa-sign-in"></i> Registrate</a>
                                    </strong>
                                </li>
                                <li><strong><a class="btn btn-success btn-lg " href="<?=$this->config->base_url()?>login/condicion"><i class="fa fa-info-circle "></i> Mas Info</a>
                                    </strong>
                                </li>

                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?=$this->config->base_url()?>assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=$this->config->base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?=$this->config->base_url()?>assets/js/classie.js"></script>
    <script src="<?=$this->config->base_url()?>assets/js/cbpAnimatedHeader.js"></script>
    <!-- Contact Form JavaScript -->
    <script src="<?=$this->config->base_url()?>assets/js/jqBootstrapValidation.js"></script>
    <script src="<?=$this->config->base_url()?>assets/js/contact_me.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?=$this->config->base_url()?>assets/js/freelancer.js"></script>
</body>
</html>
