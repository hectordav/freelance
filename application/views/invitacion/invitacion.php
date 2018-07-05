    <!-- page content -->
<form action="<?=$this->config->base_url();?>invitacion/buscar_freelance" method="POST" accept-charset="utf-8">
      <div class="right_col" role="main">
          <div class="page-title">
            <div class="title_left">
              <h3>Invitar a Freelance</h3>
            </div>
          </div>

          <div class="row">
              <div class="x_panel">

              <p> <div class="col-md-12 col-sm-12 col-xs-12">

              	<div class="col-md-12 col-sm-12 col-xs-12">
								<select class="selectpicker form-control" data-live-search="true" id="id_proyecto" name="id_proyecto" required>
								<?php if ($proyecto_id_usuario): ?>
										<option data-tokens="" value="">Seleccione Proyecto</option>
								<?php foreach ($proyecto_id_usuario->result() as $data): ?>
										<option data-tokens="<?= $data->titulo_proyecto?>" value="<?= $data->id_proyecto?>"><?= $data->titulo_proyecto?></option>
								<?php endforeach ?>
								<?php else: ?>
									<option data-tokens="" value="">No hay proyectos</option>
								<?php endif ?>
								</select>
			             </div>

              </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
										<p>
		                <hr>
										<div class="col-md-6 col-sm-6 col-xs-6">
									<select class="selectpicker form-control" data-live-search="true" id="id_pais" name="id_pais" required>
										<?php if ($pais): ?>
										<?php foreach ($pais->result() as $data): ?>
											<option data-tokens="<?= $data->cod.", ".$data->pais ?>" value="<?= $data->cod ?>"><?= $data->pais?></option>
										<?php endforeach ?>
										<?php else: ?>
											<option data-tokens="" value="">No hay Paisanos</option>
										<?php endif ?>
										</select>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-6">
											<select name="id_ciudad" id="id_ciudad" class="selectpicker form-control" data-live-search="true" required>
											<option data-tokens=""value="">Seleccione Ciudad</option>
								 			</select>
											</div>
								</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
									 <p>
										<div class="col-md-6 col-sm-6 col-xs-6">
						 <select class="selectpicker form-control" data-live-search="true" id="id_categoria" name="id_categoria"style="width:10px" required>
									  <?php if ($categoria): ?>
									  	<option data-tokens="", "" value="">Seleccione una Categoria</option>
										  <?php foreach ($categoria->result() as $data): ?>
											<option data-tokens="<?= $data->id.", ".$data->descripcion?>" value="<?= $data->id ?>"><?= $data->descripcion?></option>
										  <?php endforeach ?>
										<?php else: echo "no hay Resultados"?>
									  <?php endif ?>
							</select>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
						 <select name="id_sub_cat" id="id_sub_cat" class="form-control" data-live-search="true" required>
						 	<option value="">Seleccione una Sub Categoria</option>
						 	option
						 </select>
						  <p>
						</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
                  <button type="submit" class="col-md-12 col-sm-12 col-xs-12 btn btn-success btn-lg"><strong><i class="fa fa-search" ></i>&nbsp; Buscar</strong></button></left>

                  </div>
									</div>
									<br>
                </div>
              </div>
            </div>
          </div>
        </div>
   </form>