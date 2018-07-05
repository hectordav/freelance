<div class="right_col" role="main" style="height:1040px;">
		<div class="col-md-12 col-sm-12 col-xs-12">
	    	<div class="x_panel">
				<div class="animated fadeIn">
					<div class="table-label">
						<h3><strong>Nuevo Proyecto Paso 2-3<strong></h3>
						<?php if ($id): ?>
				<form id="form-guardar" class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>proyecto/guardar_det_proyecto" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="id_proyecto" name="id_proyecto" value="<?=$id?>">
						<?php else: ?>
							<? redirect('proyecto/grilla')?>
						<?php endif ?>

					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
					<br>
						<div class="col-md-4 col-sm-4 col-xs-4">
							<div class="animated bounceInDown">
								<div class="alert alert-success" style="color:#FFFFFF">
									<h3><strong>Sugerimos lo siguiente:</strong></h3>
										<ul>
											<li>Un resumen de su proyecto.</li>
											<li>Espectativas del Profesional Contratado.</li>
											<li>Habilidades necesarias para llevar a cabo tu proyecto.</li>
											<li>Que esperas como cliente.</li>
											<li>Cual es la razón por la que el Profesional debería estar interesado.</li>
											<li>Preguntas relevantes que desees que el Profesional responda en su propuesta.
								</li>
								</ul>
							</div>
						</div>
						</div>
		<div class="col-md-8 col-sm-8 col-xs-8">

		<textarea name="txt_det_proyecto" id="txt_det_proyecto" class="form-control" rows="15" required="required" placeholder="Describe detalladamente tu proyecto"></textarea>
		<br>
		</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-4 col-sm-4 col-xs-4">
			Plazo para la Entrega:
				</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-4 col-sm-4 col-xs-4">
					<select name="id_plazo" id="id_plazo" class="form-control" data-live-search="true" required>
					  <?php if ($plazo): ?>
					  	<option value="">Seleccione plazo</option>
						  <?php foreach ($plazo->result() as $data): ?>
							<option data-tokens="<?= $data->id.", ".$data->descripcion?>" value="<?= $data->id ?>"><?= $data->descripcion?></option>
						  <?php endforeach ?>
						<?php else: echo "no hay Resultados"?>
					  <?php endif ?>
					</select>
				</div>
	<input type="file" name="mi_archivo">
		</div>
		<div align="right">
		<button type="submit" class="btn btn-primary btn-lg">Publicar Proyecto</button></div>
		</form>
				</div>
	    	</div>
		</div>
</div>
