<body class="nav-md">
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
              <img src="<?= $this->config->base_url();?>images/image.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bienvenido,</span>
              <h2>Inicia Sesion</h2>
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
                    <li><a href="#">Depositos en garantia</a>
                    </li>
                    <li><a href="#">Movimientos de mi cuenta</a>
                    </li>
                  </ul>
                </li>

              </ul>
            </div>
            <div class="menu_section">
              <h3><i class="glyphicon glyphicon-cog"></i>&nbsp;&nbsp;&nbsp;Configuracion</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-cogs"></i>Config General<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?= $this->config->base_url();?>categoria">Categoria</a>
                    </li>
                    <li><a href="<?= $this->config->base_url();?>sub_categoria">Sub Categoria</a>
                    </li>
                    <li><a href="<?= $this->config->base_url();?>pais">Paises</a>
                    </li>
                    <li><a href="<?= $this->config->base_url();?>ciudad">Ciudades</a>
                    </li>
                     <li><a href="<?= $this->config->base_url();?>perfil">Perfiles</a>
                    </li>
                     <li><a href="<?= $this->config->base_url();?>plan">Planes</a>
                    </li>
                    <li><a href="<?= $this->config->base_url();?>rango_precio">Rango de precios</a>
                    </li>
                    <li><a href="<?= $this->config->base_url();?>comision">Comisiones</a>
                    </li>
                    <li><a href="<?= $this->config->base_url();?>usuario">Usuarios</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>-->
          <!-- /menu footer buttons -->
        </div>
      </div>