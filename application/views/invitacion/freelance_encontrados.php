    <!-- page content -->
      <div class="right_col" role="main">
          <div class="page-title">
            <div class="title_left">
              <h3>Invitar a Freelance</h3>
            </div>
          </div>
          <div class="row">
              <div class="x_panel">
  <form action="<?=$this->config->base_url();?>invitacion/buscar_freelance" method="POST" accept-charset="utf-8">
              <p> <div class="col-md-12 col-sm-12 col-xs-12">
              	<div class="col-md-12 col-sm-12 col-xs-12">
								<select class="selectpicker form-control" data-live-search="true" id="id_proyecto" name="id_proyecto"style="width:10px" required>
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
              </form>
                  </div>
									</div>
									<br>
			<hr>
	<div class="col-md-12 col-sm-12 col-xs-12 table-condense">
	<table class="table table-hover">
    <thead>
      <tr>
      <?php if ($freelance_encontrados): ?>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
     <?php foreach ($freelance_encontrados->result() as $data): ?>
     	 <tr>
     	 <td><input type="checkbox" name="" value=""></td>
     	 <td><div class="col-md-12 col-sm-12 col-xs-12">
     	 	<div class="col-md-2 col-sm-2 col-xs-2">
     	 	 <img src="<?= $this->config->base_url();?>images/<?=$data->usuario_imagen?>" alt="" height="100" width="100">
     	 	</div>
     	 	<div class="col-md-6 col-sm-6 col-xs-6">
     	 <strong>Nombre: &nbsp;</strong><?=$data->nombre_usuario?><br>
     	<strong>Ciudad: &nbsp;</strong><?=$data->ciudad_usuario?><br><strong>Pais: &nbsp;</strong><?=$data->pais_usuario?><br>
     	 <strong>Ocupacion: &nbsp;</strong><?=$data->ocupacion_usuario?><br>
     	 <a class="btn btn-success" href="<?= $this->config->base_url();?>usuario/ver_usuario/<?=$id_usuario?>">Ver perfil</a>
     	 <a class="btn btn-info" href="<?= $this->config->base_url();?>invitacion/enviar_mail/<?=$data->id_usuario?>">Contactar</a>
     	 	</div>
     	 </div></td>
     	  </tr>
    <?php endforeach ?>
     </tbody>
  	 </table>
		<?php else: ?>
	<label>No hay Freelance con esos requerimientos</label>
      <?php endif ?>
	</div>
                </div>
              </div>
            </div>
          </div>
        </div>
