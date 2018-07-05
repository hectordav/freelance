<div class="top_nav">
  <div class="nav_menu">
      <nav class="" role="navigation">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?= $this->config->base_url();?>images/image.png" alt=""><label>Iniciar Sesion</label>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
            <li><a href="<?= $this->config->base_url();?>login">Inicia Sesion</a>
            <?$id_usuario=0?>

            </li>
          </ul>
        </li>
       <li class="">
          <a href="<?= $this->config->base_url();?>proyecto/cargar_proyecto_todos" class="" >
        <i class="glyphicon glyphicon-th-list"></i><label>&nbsp;&nbsp;Proyectos Publicados</label>
          </a>
          <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
          </ul>
        </li>
           <li class="">
          <a href="<?= $this->config->base_url();?>login" class="" >
        <i class="glyphicon glyphicon-dashboard"></i><label>&nbsp;&nbsp;Panel de Control</label>
          </a>
          <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
          </ul>
        </li>
      </ul>
      </nav>
  </div>
</div>
<!-- /top navigation -->
