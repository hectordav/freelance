<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Perfil de Usuario</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Usuario</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="profile_img">
                <!-- end of image cropping -->
                <div id="crop-avatar">
                  <!-- Current avatar -->
              <?php if ($ver_usuario): ?>
              <?php foreach ($ver_usuario->result() as $data): ?>
                 <a data-toggle="modal" href="#mnuevaimagen"><div class="avatar-view" title="Cambiar Imagen">
                    <img src="<?php echo $this->config->base_url();?>/images/<?=$data->usuario_imagen?>" alt="Avatar">
                  </div></a>
                  <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                </div>
                <!-- end of image cropping -->
              </div>
              <h3><?=$data->nombre_usuario;?></h3>
              <ul class="list-unstyled user_data">
                <li><i class="fa fa-map-marker user-profile-icon"></i> <?= $data->direccion_usuario?>,&nbsp;  <?=$data->ciudad_usuario?>, <?=$data->pais_usuario?>
                </li>
                <li>
                  <i class="fa fa-briefcase user-profile-icon"></i> <?=$data->ocupacion_usuario?>
                </li>
                <li>
                  <i class="fa fa-usd user-profile-icon"></i> <?=$data->precio_hora?>&nbsp; <?=$data->simbolo_moneda?> X hora
                </li>
                 <?php endforeach ?>
            <?php endif ?>
              </ul>
              <div align="right">
               <a class="btn btn-success" data-toggle="modal" href="#meditarusuario"><i class="fa fa-edit m-right-xs"></i>Editar Perfil</a>
                   </div>
              <br />
              <!-- start skills -->
              <h3><strong>Habilidades</strong></h3>
              <ul class="list-unstyled user_data">
                <li>
                <?php if ($det_usuario): ?>
                <?php foreach ($det_usuario->result() as $data_2): ?>
                  <p><?=$data_2->usuario_habilidad?></p>
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?=$data_2->usuario_porcentaje_habilidad?>"></div>
                  </div> <?php endforeach ?>
             <?php endif ?>
                </li>
              </ul>
              <div align="right">
              </div>
                 <div align="right"><a class="btn btn-success" data-toggle="modal" href="#mnuevahabilidad"><i class="fa fa-edit m-right-xs"></i>Agregar Habilidades</a> </div>
              <!-- end of skills -->
               <!-- start skills -->
              <h4>Idiomas</h4>
              <ul class="list-unstyled user_data">
                <li>
              <?php if ($det_idioma): ?>
                <?php foreach ($det_idioma->result() as $data): ?>
                  <p><?=$data->usuario_idioma?></p>
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?=$data->usuario_porcentaje_idioma?>"></div>
                  </div> <?php endforeach ?>
             <?php endif ?>
                </li>
              </ul>
                 <div align="right"><a class="btn btn-success" data-toggle="modal" href="#mnuevoidioma"><i class="fa fa-edit m-right-xs"></i>Agregar Idiomas</a> </div>
                  <h4>Idiomas para recibir Proyectos</h4>
              <ul class="list-unstyled user_data">
                <li>
              <?php if ($idioma_proyecto): ?>
                <?php foreach ($idioma_proyecto->result() as $data): ?>
                  <p><?=$data->usuario_idioma?></p>
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="100"></div>
                  </div> <?php endforeach ?>
             <?php endif ?>
                </li>
                 <div align="right"><a class="btn btn-success" data-toggle="modal" href="#mnuevoidioma_proyecto"><i class="fa fa-edit m-right-xs"></i>Agregar Idiomas</a> </div>
              </ul>
              <!-- end of skills -->
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
 <div id="crop-avatar">
    <h3><strong>Puntos:</strong></h3>
      <?php if ($ver_usuario): ?>
        <?php foreach ($ver_usuario->result() as $data): ?>
          <h1><label><?=$data->usuario_puntaje?></label></h1>
<?
$puntaje_usuario=$data->usuario_puntaje;
$puntaje_menor= $data->puntaje_menor_perfil;
$puntaje_mayor= $data->puntaje_mayor_perfil;
?>
  <?php if ($puntaje_usuario>=0 && $puntaje_usuario<=100): ?>
    <h3><label>Nivel: Cuarzo</label></h3>
    <img src="<?php echo $this->config->base_url();?>/images/nivel_1.png" alt="Avatar" height="60" width="200" title="Cuarzo: 0-100">
  <?php endif ?>
  <?php if ($puntaje_usuario>=100 && $puntaje_usuario<=200): ?>
      <h3><label>Nivel: Esmeralda</label></h3>
    <img src="<?php echo $this->config->base_url();?>/images/nivel_2.png" alt="Avatar" height="70" width="300" title="Esmeralda: 101-200">
  <?php endif ?>
  <?php if ($puntaje_usuario>=201 && $puntaje_usuario<=300): ?>
      <h3><label>Nivel: Granate</label></h3>
    <img src="<?php echo $this->config->base_url();?>/images/nivel_3.png" alt="Avatar" height="70" width="300" title="Granate: 201-300">
  <?php endif ?>
  <?php if ($puntaje_usuario>=301 && $puntaje_usuario<=400): ?>
      <h3><label>Nivel: Zafiro</label></h3>
    <img src="<?php echo $this->config->base_url();?>/images/nivel_4.png" alt="Avatar" height="70" width="300" title="Zafiro: 301-400">
  <?php endif ?>
  <?php if ($puntaje_usuario>=401 && $puntaje_usuario<=500): ?>
      <h3><label>Nivel: Agata</label></h3>
    <img src="<?php echo $this->config->base_url();?>/images/nivel_5.png" alt="Avatar" height="70" width="300" title="Agata: 401-500">
  <?php endif ?>
  <?php if ($puntaje_usuario>=501 && $puntaje_usuario<=600): ?>
      <h3><label>Nivel: Circon</label></h3>
    <img src="<?php echo $this->config->base_url();?>/images/nivel_6.png" alt="Avatar" height="70" width="300" title="Circon: 601-700">
  <?php endif ?>
  <?php if ($puntaje_usuario>=601 && $puntaje_usuario<=1000000): ?>
      <h3><label>Nivel: Diamante</label></h3>
    <img src="<?php echo $this->config->base_url();?>/images/nivel_7.png" alt="Avatar" height="70" width="300" title="Diamante: 601-..">
  <?php endif ?>
<?php endforeach ?>
<?php endif ?>
               </div>
              <!-- start of user-activity-graph -->
              <!-- end of user-activity-graph -->
              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Perfil</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Proyectos Trabajados</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Proyectos Publicados</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                    <!-- start recent activity -->
                    <ul class="messages">
        <?php if ($ver_usuario): ?>
          <?php foreach ($ver_usuario->result() as $data): ?>
          <label><?=$data->usuario_sobre_mi?></label>
          <?php endforeach ?>
        <?php endif ?>
                    </ul>
                    <!-- end recent activity -->
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <!-- start user projects -->
                   <table class="data table table-striped no-margin">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Proyecto</th>
                          <th>Cliente</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <?php if ($proyecto_id_usuario_asignado): ?>
                        <?php foreach ($proyecto_id_usuario_asignado->result() as $data): ?>
                          <td><?=$data->id_proyecto?></td>
                          <td><?=$data->titulo_proyecto?></td>
                          <td><?=$data->cliente_proyecto?></td>
                          <td></td>
                        </tr>
                        <?php endforeach ?>
                        <?php endif ?>
                      </tbody>
                    </table>
                    <!-- end user projects -->
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                  <table class="data table table-striped table-hover no-margin">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Proyecto</th>
                          <th>F. Inicio</th>
                          <th>F. Fin</th>
                           <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <?php if ($proyecto_id_usuario_remitente): ?>
                        <?php foreach ($proyecto_id_usuario_remitente->result() as $data): ?>
                          <td><?=$data->id_proyecto?></td>
                          <td><?=$data->titulo_proyecto?></td>
      <?php $fecha_inicio= date('d-m-Y',strtotime($data->fecha_publicacion_proyecto));
                          $fecha_fin=date('d-m-Y',strtotime($data->fecha_vence_proyecto))?>
                          <td><?=$fecha_inicio?></td>
                          <td><?=$fecha_fin?></td>
                          <td><a href="<?=$this->config->base_url();?>/proyecto/ver_proyecto/<?=$data->id_proyecto?>"><button type="button" class="btn btn-success">Ver</button></a></td>
                        </tr>
                         <?php endforeach ?>
                        <?php endif ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- footer content -->
  <footer>
    <div class="copyright-info">
      <p class="pull-right"></a>
      </p>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
</div>
<!-- /page content -->
</div>
</div>
<div id="custom_notifications" class="custom-notifications dsp_none">
<ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
</ul>
<div class="clearfix"></div>
<div id="notif-group" class="tabbed_notifications"></div>
</div>
