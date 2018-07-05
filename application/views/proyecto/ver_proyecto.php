<div class="right_col" role="main" style="height:1040px;">
		<div class="col-md-12 col-sm-12 col-xs-12">
	    	<div class="x_panel">
				<div class="animated fadeIn">
					<div class="panel panel-info">
					<div class="panel-heading">
					<?php if ($proyecto): ?>
						<?php foreach ($proyecto->result() as $data): ?>
					    <h2><strong><label><?=$data->titulo_proyecto?></label>
					    </strong>
					    </h2>
					  </div>
					  <div class="panel-body">
					  <div align="right">
						<a href="http://www.facebook.com/sharer.php?u=<?= $this->config->base_url();?>proyecto/ver_proyecto/<?= $data->id_proyecto?>" target="blanck"><img src="<?= $this->config->base_url();?>images/compartirF.png" alt="" width="150" height="34"></a>
						<a href="http://twitter.com/home?status=<?= $this->config->base_url();?>proyecto/ver_proyecto/<?= $data->id_proyecto?>" target="blanck"><img src="<?= $this->config->base_url();?>images/compartir_tw.jpg" alt="" width="150" height="38"></a>
						<a class="btn btn-primary" data-toggle="modal" href="#memail"><i class="glyphicon glyphicon-envelope"></i> Compartir por Email</a>
					  </div>
					  <br>

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-3 col-sm-3 col-xs-3">
						<div class="panel panel-primary">
							<div class="panel-heading">
							<label>Datos del Proyecto</label>
							</div>
					<div class="panel-body">
						<p><label>Solicitante:</label>&nbsp;<?=$data->cliente_proyecto?>&nbsp;<a href="<?php echo $this->config->base_url();?>usuario/ver_perfil_usuario/<?=$data->cliente_id?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-user"></i>&nbsp;Ver Perfil</a></p>
						<p><label>Pais:</label>&nbsp;<?=$data->pais_usuario?></p>
						<p><label>Ciudad:</label>&nbsp;<?=$data->ciudad_proyecto?></p>
						<p><label>Tipo:</label> &nbsp;<?=$data->proyecto_o_posicion_proyecto?></p>
						<p><label>Categoria: </label>&nbsp;<?=$data->categoria_proyecto?></p>
						<p><label>Sub Categoria: </label>&nbsp;<?=$data->sub_cat_proyecto?></p>
						<p><label>Estado: </label>&nbsp;<?=$data->status_proyecto?></p>

						<p><label>Importe:</label> &nbsp;<?=$data->rango_precio_proyecto?> USD</p>
						<p><label>Disponibilidad:</label> &nbsp;<?=$data->disponibilidad_proyecto?></p>
						<p><label>Especificaciones:</label> &nbsp;<?=$data->estado_desarrollo_proyecto?></p>
						<p><label>Plazo de Entrega:</label> &nbsp;<?=$data->plazo_entrega?></p>
						<?$fecha_inicio= date("d-m-Y",strtotime($data->fecha_inicio)); ;?>
						<??>
						<?$fecha_fin= date("d-m-Y",strtotime($data->fecha_fin));?>
						<p><label>F. Publicacion:</label> &nbsp;<?=$fecha_inicio?></p>
						<p><label>F. Vencimiento:</label> &nbsp;<?=$fecha_fin;?></p><?php if ($data->fecha_asignacion_usuario==null): ?>
						<?php else: ?>
							<?$fecha_acepta= date("d-m-Y",strtotime($data->fecha_asignacion_usuario));?>
							<p><label>Fecha propuesta aceptada: &nbsp; </label>&nbsp;<?=$fecha_acepta?></p>
						<?php endif ?>
							<p><label>Archivo:</label> &nbsp;<a href="<?php echo $this->config->base_url();?>uploads/<?=$data->archivo_proyecto?>" download="<?=$data->archivo_proyecto?>"><i class="glyphicon glyphicon-paperclip"></i><?=$data->archivo_proyecto?></a></p>
					</div>
						</div>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
			<div class="x_panel">
						<h3><label>Descripcion del Proyecto</label></h3>
					 <div class="panel-footer">
					 	<label><?=$data->descripcion_proyecto?></label>
					 </div>
			</div>
			</div>
						 	<?php endforeach ?>
			</div>
					<?php endif ?>
			<div align="right">
			<?php if (!$id_usuario==0): ?>
			<?php foreach ($proyecto->result() as $data): ?>

			<?php endforeach ?>
			<a data-toggle="modal" href="#mnuevomensaje"><button type="button" class="btn btn-primary btn-lg">Enviar Mensaje</button></a>
			<a data-toggle="modal" href="#mnuevapropuesta"><button type="button" class="btn btn-success btn-lg">Enviar una Propuesta</button></a></div>
			<?php else: ?>
			<a href="<?= $this->config->base_url();?>login"><button type="button" class="btn btn-primary btn-lg">Enviar Mensaje</button></a>
				<a href="<?= $this->config->base_url();?>login"><button type="button" class="btn btn-success btn-lg">Enviar una Propuesta</button></a></div>
			<?php endif ?>
		</div>
					  </div>
					</div>
				</div>
	    	</div>
		</div>
</div>
