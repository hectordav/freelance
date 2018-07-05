<body class="nav-md">
</script>
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="" class="site_title"><i class="fa fa-paw"></i> <span>Freelance-employ</span></a>
          </div>
          <div class="clearfix"></div>
          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="<?= $this->config->base_url();?>images/<?=$imagen?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bienvenido,</span>
              <h2><?=$nombre_usuario?></h2>
            </div>
          </div>
          <!-- /menu prile quick info -->
          <br />
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="<?= $this->config->base_url();?>principal" ><i class="fa fa-home"></i> Home</a>
                <li><a><i class="fa fa-edit"></i>Mis Proyectos<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?= $this->config->base_url();?>proyecto">Publicados</a>
                    </li>
                    <li><a href="<?= $this->config->base_url();?>proyecto/proyecto_trabajado">Proyectos Trabajados</a>
                    </li>
                  </ul>
                </li>
                 <li><a><i class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;&nbsp;Mis Mensajes<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?= $this->config->base_url();?>mensaje">Mensajes</a>
                    </li>
                    <li><a href="<?= $this->config->base_url();?>propuesta">Propuestas</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="glyphicon glyphicon-usd"></i>&nbsp;&nbsp;&nbsp;Mis Finanzas<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?= $this->config->base_url();?>deposito_garantia">Depositos en garantia</a>
                    </li>
                  </ul>
                </li>
              <li><a><i class="fa fa-star"></i>Mis favoritos<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?= $this->config->base_url();?>favorito">Mis Freelance/cliente favoritos</a>
                    </li>
                  </ul>
                </li>
                  <li><a><i class="fa fa-bullhorn"></i>Contactar Freelance<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?= $this->config->base_url();?>invitacion">Contactar un Freelance</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>

          </div>
        </div>
      </div>