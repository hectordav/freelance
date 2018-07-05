    <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                  Propuestas
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
                  <h2>Bandeja de Entrada<small><strong></strong></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-3 mail_list_column">
                   <div align="right">
                   </div>
                   <?php if ($propuesta): ?>
                      <?php foreach ($propuesta->result() as $data): ?>
                      <div class="mail_list">
                        <div class="left">
                          <div class="profile_pic">
                          <img src="<?= $this->config->base_url();?>images/<?=$data->imagen_usuario?>"width="22" height="22">
                          </div>
                            <i class="fa fa-edit"></i>
                        </div>
                        <div class="right">
                          <h3><?=$data->nombre_usuario_envia?><small>
                      <?$fecha= date("d-m-Y",strtotime($data->fecha_propuesta));?>
                          <?=$fecha?></small></h3>
                          <?=$data->titulo_proyecto?>
                        <div class="nav navbar-right panel_toolbox">
                        <button type="button" name="ver_det_mensaje"class="btn btn-success btn-xs" value="<?=$data->id_usuario_envia?>/<?=$data->id_proyecto?>" OnClick='mostrar_det_propuesta(this)'>Ver</button>
                        </div>
                        </div>
                      </div>
                      <?php endforeach ?>
                    </div>
                    <!-- /MAIL LIST -->
                    <!-- CONTENT MAIL -->
                    <div id="det_mensaje">
                    <h3><center>Haga clic en una Propuesta para Ver su contenido</center>
                    </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php else: ?>
        <label>No hay Propuestas</label>
<?php endif ?>