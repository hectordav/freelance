<div class="right_col" role="main" style="height:1040px;">
	<div class="x_panel">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="table-label">
						<h4><strong>Agregar Detalles al Plan<strong></h4>
					</div>
					<div class="form-container table-container">
						<form id="form-guardar" class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>plan/grilla" method="POST">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-2 col-sm-2 col-xs-2">
						<h4 ><P ALIGN="RIGHT"><label>Titulo:</label></h4 ></P>
						</div>
					  <div class="col-md-10 col-sm-10 col-xs-10">
					  <?php foreach ($nuevo_plan->result() as $data): ?>
						<h3><label><?= $data->descripcion?></label></h3>
						<input type="hidden" name="txt_id_plan" id="txt_id_plan" value="<?= $data->id?>">
					  <?php endforeach ?>
						</div>
					</div>
<!--*****************************************************************************-->
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-1 col-sm-1 col-xs-1">
	<P ALIGN="CENTER"><label>Descripcion</label></h3 ></P>
	</div>
		<div class="col-md-10 col-sm-10 col-xs-10">
			<input type="text" name="txt_descripcion" id="txt_descripcion" class="form-control">
			</div>
		  <div class="col-md-1 col-sm-1 col-xs-1">
<button class="btn btn-default " onclick="guardar_det_plan()" name="btn_enviar_producto"id="btn_enviar_producto" type="button">Agregar</button>
			</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<hr>
	<div id="det_plan">
<table class="table table-condensed table-bordered table-hover">
	<thead>
		<tr>
			<th class="warning col-md-10 col-sm-10 col-xs-10"><h5><strong>Descripcion</strong></h5></th>
			<th class="warning col-md-2 col-sm-2 col-xs-2"><h5><strong>Acciones</strong></h5></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>


	</div>
<!--******************los botones***********************-->
					  <div class="col-md-12 col-sm-12 col-xs-12">
					  <hr>
					<div class="col-md-9 col-sm-9 col-xs-9">
					</div>
					    <div class="col-md-3 col-sm-3 col-xs-3">
					    <br>
					      <button type="submit" class="btn btn-info">Guardar</button>
					      <a href="<?php echo $this->config->base_url();?>producto"><button type="button" class="btn btn-danger">Cancelar</button></a>
						</form>
					    </div>
					  </div>
			</div>
			<br>
		</div>
	</div>
  </div>
 </div>
	    	</div>
</div>
