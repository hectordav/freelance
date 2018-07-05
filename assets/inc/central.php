<!-- page content -->
      <div class="right_col" role="main">
        <br />
        <div class="">
          <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-comments-o"></i>
                </div>
                <div class="count"><?=$contar_mensaje?></div>
                <h3>Nuevos Mensajes</h3>
                <a href="<?=$this->config->base_url()?>mensaje"><p>Ir a Mis Mensajes</p></a>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-comments"></i>
                </div>
                <div class="count"><?=$contar_propuesta?></div>
                <h3>Nuevas Propuestas</h3>
                  <a href="<?=$this->config->base_url()?>mensaje"><p>Ir a Mis Propuestas</p></a>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-laptop"></i>
                </div>
                <div class="count"><?=$contar_proyectos?></div>
                <h3>Nuevos proyectos</h3>
                 <a href="<?=$this->config->base_url()?>proyecto"><p>Ir a Mis Proyectos</p></a>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-money"></i>
                </div>
                <?php if ($sumar_dinero): ?>
                  <?php foreach ($sumar_dinero->result() as $data): ?>
                    <?php if ($data->monto_sin_comision>0): ?>
                      <div class="count"><?=$data->monto_sin_comision?> USD</div>
                    <?php else: ?>
                      <div class="count">0 USD</div>
                    <?php endif ?>
                  <?php endforeach ?>
                <?php endif ?>
                <h3>En Deposito</h3>
              <a href="<?=$this->config->base_url()?>deposito_garantia" ><p>Ir a Mis finanzas</p></a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Proyectos Trabajados Recientes</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                    <div class="col-md-12" style="overflow:hidden;">
                        <table class="table table-striped no-margin table-container">
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
                    </div>
                    <div class="col-md-10 " align="right">
                      <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-4">
                          <canvas id="canvas1i" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                         <a href="<?= $this->config->base_url();?>proyecto/add"><button type="button" class="btn btn-primary">Crear Proyectos</button></a>
                        </div>
                        <div class="col-md-4">
                          <canvas id="canvas1i2" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                          <a href="<?= $this->config->base_url();?>proyecto/cargar_proyecto_todos"><button type="button" class="btn btn-success">Buscar Proyectos</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Mensajes <a href="<?=$this->config->base_url()?>mensaje"><small>Ir a mensajes</small></a></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <article class="media event">
                     <?php if ($mensaje): ?>
                    <?php foreach ($mensaje->result() as $data): ?>
                      <div class="mail_list">
                        <div class="left">
                          <div class="profile_pic">
                          <img src="<?= $this->config->base_url();?>images/<?=$data->imagen_usuario?>"width="50" height="50">
                          </div>
                        </div>
                        <div class="right">
                          <h3>&nbsp;&nbsp;&nbsp;&nbsp;<?=$data->nombre_usuario_envia?><small>
                      <?$fecha= date("d-m-Y",strtotime($data->fecha_mensaje));?>
                          <?=$fecha?></small></h3>
                          &nbsp;&nbsp;&nbsp;&nbsp;<?=$data->titulo_proyecto?>
                        <div class="nav navbar-right panel_toolbox">
                    <a href="<?=$this->config->base_url()?>mensaje"><button type="button"  name="ver_det_mensaje"class="btn btn-success btn-xs" >Ver Mensaje</button></a>
                    <p>
                        </div>
                        </div>
                      </div>
                      <?php endforeach ?>
<?php endif ?>
                  </article>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Propuestas  <a href="<?=$this->config->base_url()?>propuesta"><small>Ir a Propuestas</small></a></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <article class="media event">
                    <?php if ($propuesta_2): ?>
                      <?php foreach ($propuesta_2->result() as $data): ?>
                      <div class="mail_list">
                        <div class="left">
                          <div class="profile_pic">
                          <img src="<?= $this->config->base_url();?>images/<?=$data->imagen_usuario?>"width="50" height="50">
                          </div>
                        </div>
                        <div class="right">
                          <h3>&nbsp;&nbsp;&nbsp;&nbsp;<?=$data->nombre_usuario_envia?><small>
                      <?$fecha= date("d-m-Y",strtotime($data->fecha_propuesta));?>
                          <?=$fecha?></small></h3>
                          &nbsp;&nbsp;&nbsp;&nbsp;<?=$data->titulo_proyecto?>
                        <div class="nav navbar-right panel_toolbox">
                        <a href="<?=$this->config->base_url()?>propuesta"><button type="button" name="ver_det_mensaje"class="btn btn-success btn-xs">Ver Propuesta</button></a>
                        </div>
                        </div>
                      </div>
                      <?php endforeach ?>
                    <?php endif ?>
                  </article>
                </div>
              </div>
            </div>
            <p>
    <div align="right">
  <label><strong>Usuarios Registrados: </strong></label> <?=$contar_usuario?> &nbsp;
    <label><strong>Usuarios En linea: </strong></label> <?=$contar_usuario_linea?> &nbsp;
     <label><strong>Total Proyectos Publicados: </strong></label> <?=$contar_proyectos_todos?>
    </div>

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