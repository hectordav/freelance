<div class="right_col" role="main" style="height:1140px;">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="animated fadeIn">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="table-label">
						<h3><strong>Agregar Preferencia<strong></h3>
					</div>
					<br>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="animated bounceInDown">
										<div class="alert alert-warning" style="color:#FFFFFF">
											<strong><p><h4>Seleccione las categorias y subcategorias por las que desea ser contactado</p></label></h4>
										</div>
								</div>
								</div>
	</div>
	<form id="form-guardar" class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>preferencia/guardar_preferencia" method="POST">
						<div class="col-md-4 col-sm-4 col-xs-4">
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
						<div class="col-md-4 col-sm-4 col-xs-4">
						 <select name="id_sub_cat" id="id_sub_cat" class=" selectpicker form-control" data-live-search="true" required>
						 	<option value="">Seleccione una Sub Categoria</option>
						 	option
						 </select>
						</div>
<div align="center">
<button type="submit" class="btn btn-primary btn-lg">Guardar</button>
</form>
<a href="<?php echo $this->config->base_url();?>preferencia"><button type="button" class="btn btn-success btn-lg">Cancelar</button></a>
</div>
			</div>
	</div>
</div>
