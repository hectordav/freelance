<div class="modal fade "id="meditarusuario" role="dialog">
		        <div class="modal-dialog modal-lg">
		          <div class="modal-content">
		            <div class="modal-header">
		              <button type="button" class="close" data-dismiss="modal">&times;</button>
		               <strong><h3><span class ="label label-warning">Editar Usuario</span></h3></strong><div>
		               </div>
		            </div> <!-- termina el header -->
					<div class="container">
						<div class="row">
	<form action="<?php echo $this->config->base_url();?>usuario/actualizar_usuario" method="POST" accept-charset="utf-8">
	<br>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Pais:</label></P>
	   		</div>
			<div class="col-md-5 col-sm-5 col-xs-5">
			<select class="selectpicker form-control" data-live-search="true" id="id_pais" name="id_pais"style="width:10px" required>
				  <?php if ($pais): ?>
				  <option data-tokens=""value="">Seleccione Pais</option>
					  <?php foreach ($pais->result() as $data): ?>
						<option data-tokens="<?= $data->cod.", ".$data->pais?>" value="<?= $data->cod ?>"><?= $data->pais?></option>
					  <?php endforeach ?>
					<?php else: echo "no hay Resultados"?>
				  <?php endif ?>
		</select>
			</div>
				<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Ciudad:</label></P>
	   	</div>
			<div class="col-md-4 col-sm-4 col-xs-4">
			  <select name="id_ciudad" id="id_ciudad" class="form-control" data-live-search="true" required>
						<option data-tokens=""value="">Seleccione Ciudad</option>
						 </select>
			</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<br>
			<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Tipo:</label></P>
	   		</div>
			<div class="col-md-5 col-sm-5 col-xs-5">
				<select class="selectpicker form-control" data-live-search="true" id="cb_tipo_usuario" name="cb_tipo_usuario"style="width:10px" required>
					 <option data-tokens="Freelance" value="1">Freelance</option>
					 <option data-tokens="Profesional" value="2">Profesional</option>
			</select>
			</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<br>
			<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Nombre:</label></P>
	   	</div>
	   	<?php if ($ver_usuario): ?>
        <?php foreach ($ver_usuario->result() as $data): ?>
			<div class="col-md-10 col-sm-10 col-xs-10">
				<input type="text" name="txt_nombre" id="txt_nombre" class="form-control" value="<?=$data->nombre_usuario?>" required="required" placeholder="Ingrese Nombre">
			</div>

	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<br>
			<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Ocupacion:</label></P>
	   	</div>
			<div class="col-md-10 col-sm-10 col-xs-10">
				<input type="text" name="txt_ocupacion" id="txt_ocupacion" class="form-control" value="<?=$data->ocupacion_usuario?>" required="required" placeholder="Ejemplo: Abogado, Ingeniero de Sistemas, Etc">
			</div>

	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<br>
			<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Direccion:</label></P>
	   	</div>
			<div class="col-md-10 col-sm-10 col-xs-10">
				<textarea name="txt_direccion" id="txt_direccion" class="form-control" rows="3" required="required" placeholder="Ingrese Direccion"><?= $data->direccion_usuario?></textarea>
			</div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
	<br>
			<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Telefono:</label></P>
	   	</div>
			<div class="col-md-10 col-sm-10 col-xs-10">
			<input type="tel" name="txt_telf" id="txt_telf" class="form-control" value="<?= $data->telf_usuario?>" required="required" title="" placeholder="Ingrese Telefono">
			</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	 <p>
	  		<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Valor Hora:</label></P>
	   		</div>

	   		<div class="col-md-2 col-sm-2 col-xs-2">
			<input type="number" name="txt_costo_hora" id="txt_costo_hora" class="form-control" required="required"  placeholder="Usd">
	   		</div>
	   		<div class="col-md-3 col-sm-3 col-xs-3" >
	   			<select class="selectpicker form-control" data-live-search="true" id="id_moneda" name="id_moneda"style="width:7px" required="required">
					  <?php if ($moneda): ?>
						  <?php foreach ($moneda->result() as $data): ?>
							<option data-tokens="<?= $data->id.", ".$data->moneda?>" value="<?= $data->id?>"><?= $data->moneda?>, <?= $data->simbolo?></option>
						  <?php endforeach ?>
						<?php else: echo "no hay Resultados"?>
					  <?php endif ?>
				</select>

				</div>
	   		 <input type="checkbox" name="ch_suscribirse" id="ch_suscribirse" value="1" checked >&nbsp; Suscribirme a Boletines Informativos <br>
	   		<div class="col-md-4 col-sm-4 col-xs-4" >
	 	<br>
		 <?php endforeach ?>
			<?php endif ?>

			</div>
			</div>
					<br>
		            <div class="modal-footer">
		            <div>
		            <label>Al hacer clic en Actualizar se cerrará la sesion para guardar los cambios</label>

		            	<left><button type="submit" class="btn btn-primary"><strong><i class="fa fa-save" ></i>&nbsp; Actualizar</strong></button></left>
		            </div>
		            	</form>
		            </div>
		          </div><!-- termina el content -->
		        </div> <!-- termina el modal dialog -->
		    </div> <!-- termina la ventana modal -->