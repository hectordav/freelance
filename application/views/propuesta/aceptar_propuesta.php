<div class="right_col" role="main" style="height:1140px;">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="animated fadeIn">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="table-label">
						<h4><strong>Aceptar Propuesta<strong></h4>
					</div>
					<br>
				</div>
				<?php if ($propuesta): ?>
	<form action="<?= $this->config->base_url();?>pagos_paypal/pago_seguro" method="post">
					<div class="col-md-12 col-sm-12 col-xs-12" style="border-width: 1px; border-style: dashed;border-color: #9E9C9C;">
					<?php foreach ($propuesta->result() as $data): ?>

						<input type="hidden" name="txt_descripcion" id="txt_descripcion" value="Pago por Proyecto: <?=$data->mensaje?> # Ref: <?=$data->id_mensaje?>">
						<input type="hidden" name="txt_id_propuesta" id="txt_id_propuesta" value="<?=$data->id_mensaje?>">
						<input type="hidden" name="txt_monto_sin_comision" id="txt_monto_sin_comision" value="<?=$data->precio_propuesta?>">
						<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-2 col-sm-2 col-xs-2">
						<label><h4><strong>Descripcion:</strong></h4></label>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10" >
						<label><h4> Pago por Proyecto: <?=$data->mensaje?> # Ref: <?=$data->id_mensaje?></h4></label>
						</div>
				</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
					<p>
					<?$precio_sin_comision=$data->precio_propuesta;
						$comision=$precio_sin_comision*0.09;
						$total=$precio_sin_comision+$comision;?>
						<div class="col-md-5 col-sm-5 col-xs-5">
						<label><h4>Monto presupuestado:</h4></label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2" align="right">
						<label><h4><?=$total?> USD</h4></label>
						</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-5 col-sm-5 col-xs-5">
						<!-- <label><h4>Comision de Paypal:</h4></label> -->
						</div>

						<div class="col-md-2 col-sm-2 col-xs-2" align="right">
						<!-- <label><h4><?=$comision?> USD</h4></label> -->
						</div>
				</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12" style="border-width: 1px; border-style: dashed;border-color: #9E9C9C;"></div>
						<div class="col-md-5 col-sm-5 col-xs-5">
						<label><h4>Total a Pagar:</h4></label>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2" align="right">
							<input type="hidden" name="txt_monto" id="txt_monto" value="<?=$total?>">
						<label><h4><?=$total?> USD</h4></label>
						</div>
				</div>
				<?php endforeach ?>
				<?php else: ?>
				<label>No hay datos que mostar</label>
				<?php endif ?>
				<div align="right">
					<button type="submit" class="btn btn-default"><img src="<?= $this->config->base_url();?>assets/img/pagopaypal.png"width="300" height="100"></button>
				</div>
				</div>

