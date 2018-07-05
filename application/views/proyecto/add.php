<div class="right_col" role="main" style="height:1140px;">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="animated fadeIn">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="table-label">
						<h3><strong>Nuevo Proyecto Paso 1-3<strong></h3>
					</div>
					<br>
				</div>

	<form id="form-guardar" class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>proyecto/guardar_proyecto" method="POST">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-6 col-sm-6 col-xs-6">
						 <select class="selectpicker form-control" data-live-search="true" id="id_pais" name="id_pais" required>
									  <?php if ($pais): ?>

										  <?php foreach ($pais->result() as $data): ?>
											<option data-tokens="<?= $data->cod.", ".$data->pais ?>" value="<?= $data->cod ?>"><?= $data->pais?></option>
										  <?php endforeach ?>
										<?php else: echo "no hay Resultados"?>
									  <?php endif ?>
							</select>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
						  <select name="id_ciudad" id="id_ciudad" class="selectpicker form-control" data-live-search="true">
						<option data-tokens=""value="">Seleccione Ciudad</option>

						 </select>
						</div>

</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<p>
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
						 <select name="id_sub_cat" id="id_sub_cat" class="form-control" data-live-search="true" required>
						 	<option value="">Seleccione una Sub Categoria</option>
						 	option
						 </select>
						</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="animated bounceInDown">
										<div class="alert alert-warning" style="color:#FFFFFF">
											<strong><p><h4>Publicar un proyecto es gratis ¡Pruébalo!</p></h4></strong><p>Recibe ofertas de Profesionales, en solo minutos.</p>
											<p>Mira los perfiles y comentarios de los Profesionales. ¡Luego comunicate con ellos!</p>
											<p>Tu Profesional que quede adjudicado puede comenzar a trabajar para ti hoy mismo</p>
											<p>Paga al Profesional una vez que estés 100% satisfecho.</p></label>
										</div>
								</div>
					</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" >
		<br>
		<div style="border-width: 1px; border-style: dashed;border-color: #9E9C9C;">
		</div>
		<H3><label>Titulo del Proyecto</label></H3>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
				<input type="text" name="txt_titulo_proyecto" id="txt_titulo_proyecto" class="form-control" value="" required="required">
		</div>
<div class="col-md-12 col-sm-12 col-xs-12">
		<br>
<div style="border-width: 1px; border-style: dashed;border-color: #9E9C9C;">
		</div>
		<h3><label>Proyecto o Contratacion a Largo Plazo?</label></h3>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<CENTER>
		<div class="col-md-2 col-sm-2 col-xs-2">
			<div class="radio">
				<label>
					<h4><input type="radio" name="opciones" id="opciones" value="1" checked="checked" >
					Proyecto</h4>
				</label>
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<div class="radio">
				<label>
					<h4><input type="radio" name="opciones" id="opciones" value="2">
					Contratacion a Largo Plazo</h4>
				</label>
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<div class="radio">
				<label>
					<h4><input type="radio" name="opciones" id="opciones" value="3">
					Aun no lo se</h4>
				</label>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<br>
		<div style="border-width: 1px; border-style: dashed;border-color: #9E9C9C;">
		</div>
		<h3><label>Tipo de Proyecto</label></h3>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<CENTER>
		<div class="col-md-2 col-sm-2 col-xs-2">
			<div class="radio">
				<label>
					<h4><input type="radio" name="opciones_2" id="opciones_2" value="1" checked="checked">
					Proyecto fijo</h4>
				</label>
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<div class="radio">
				<label>
					<h4><input type="radio" name="opciones_2" id="opciones_2" value="2">
					Proyecto x horas</h4>
				</label>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div style="border-width: 1px; border-style: dashed;border-color: #9E9C9C;">
		</div>
		<h3><label>Estado del Desarrollo</label></h3>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-3 col-sm-3 col-xs-3">
			<div class="radio">
				<label>
					<h5><input type="radio" name="opciones_3" id="opciones_3" value="1" checked="checked">
					Tengo la Idea del proyecto</h5>
				</label>
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<div class="radio">
				<label>
					<h5><input type="radio" name="opciones_3" id="opciones_3" value="2">
					Tengo el Diseño del Proyecto</h5>
				</label>
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<div class="radio">
				<label>
					<h5><input type="radio" name="opciones_3" id="opciones_3" value="3">
					Tengo las Especificaciones del Proyecto</h5>
				</label>
			</div>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
			<div class="radio">
				<label>
					<h5><input type="radio" name="opciones_3" id="opciones_3" value="4">
					No Aplica</h5>
				</label>
			</div>
		</div>
	   </div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div style="border-width: 1px; border-style: dashed;border-color: #9E9C9C;">
		</div>
		  <div class="col-md-4 col-sm-4 col-xs-4">
		<h3><label>Tu Presupuesto</label></h3>
		</div>
		  <div class="col-md-4 col-sm-4 col-xs-4">
		<h3><label>Disponibilidad</label></h3>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-4 col-sm-4 col-xs-4">
			 <select name="id_presupuesto" id="id_presupuesto" class="form-control" data-live-search="true" required>
									  <?php if ($rango): ?>
									  	<option value="">Seleccione un Presupuesto</option>
										  <?php foreach ($rango->result() as $data): ?>
											<option data-tokens="<?= $data->id.", ".$data->descripcion?>" value="<?= $data->id ?>"><?= $data->descripcion?></option>
										  <?php endforeach ?>
										<?php else: echo "no hay Resultados"?>
									  <?php endif ?>
							</select>
	   </div>
		<div class="col-md-4 col-sm-4 col-xs-4">
		 <select name="id_disponibilidad" id="id_disponibilidad" class="form-control" data-live-search="true" required>
									  <?php if ($disponibilidad): ?>
									  	<option value="">Seleccione Disponibilidad</option>
										  <?php foreach ($disponibilidad->result() as $data): ?>
											<option data-tokens="<?= $data->id.", ".$data->descripcion?>" value="<?= $data->id ?>"><?= $data->descripcion?></option>
										  <?php endforeach ?>
										<?php else: echo "no hay Resultados"?>
									  <?php endif ?>
							</select>
	   </div>
	</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
			<br>
			<div style="border-width: 1px; border-style: dashed;border-color: #9E9C9C;">
		</div>
		<br>
<div align="right"><button type="button"  name="btn_siguiente" id="btn_siguiente"onclick="fncvalidar()" class="btn btn-primary btn-lg">Ir al Paso Siguiente</button></div>
			</div>
	</div>
</div>
</form>