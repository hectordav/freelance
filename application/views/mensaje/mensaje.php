    <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                  Mensajes
                    <small>
                    </small>
                </h3>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Bandeja de Entrada<small><strong><?=$recibido?></strong></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-4 mail_list_column">

                   <p>
                  <?php if ($status_mensaje): ?>
                   <h3> <span class="label label-success">Sin leer</span></h3>
                   <?php foreach ($status_mensaje->result() as $data): ?>
                    <div class="mail_list">
                        <div class="left">
                          <div class="profile_pic">
                          <img src="<?= $this->config->base_url();?>images/<?=$data->imagen_usuario?>"width="72" height="72">
                          </div>
                        </div>
                        <div class="panel panel-danger">
                        <div class="panel panel-heading">
                        <div class="right">
                          <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; <?=$data->nombre_usuario_envia?><small>
                          <?$fecha= date("d-m-Y",strtotime($data->fecha_mensaje));?>
                          <?=$fecha?></small></h3>
                         <div>
                         </div>
                          </div>
                          <p>
                        <div class="nav navbar-right panel_toolbox">
                          <button type="button"  name="ver_det_mensaje"class="btn btn-success btn-md" value="<?=$data->id_usuario_envia?>/<?=$data->id_proyecto?>" OnClick='mostrar_det_mensaje(this)'>Ver</button>
                         </div>
                        </div>
                         &nbsp;
                        </div>
                      </div>
                   <?php endforeach ?>
                  <?php endif ?>
                   <?php if ($mensaje): ?>

                      <h3> <span class="label label-info"> Leidos</span></h3>

                   <p>
                    <?php foreach ($mensaje->result() as $data): ?>
                      <div class="mail_list">
                        <div class="left">
                          <div class="profile_pic">
                          <img src="<?= $this->config->base_url();?>images/<?=$data->imagen_usuario?>"width="72" height="72">
                          </div>
                        </div>
                        <div class="panel panel-info">
                        <div class="panel panel-heading">
                        <div class="right">
                          <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; <?=$data->nombre_usuario_envia?><small>
                          <?$fecha= date("d-m-Y",strtotime($data->fecha_mensaje));?>
                          <?=$fecha?></small></h3>
                         <div>
                         </div>
                          </div>
                          <p>
                        <div class="nav navbar-right panel_toolbox">
                         <button type="button"  name="ver_det_mensaje"class="btn btn-success btn-md" value="<?=$data->id_usuario_envia?>/<?=$data->id_proyecto?>" OnClick='mostrar_det_mensaje(this)'>Ver</button>
                         </div>
                        </div>
                         &nbsp;
                        </div>
                      </div>
                      <?php endforeach ?>
                    </div>
                    <!-- /MAIL LIST -->
                    <div id="det_mensaje">
                    <h3><center>Haga clic en un Mensaje para Ver su contenido</center>
                    </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
                   <?php endif ?>
