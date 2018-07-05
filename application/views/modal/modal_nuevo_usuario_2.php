<div class="modal fade "id="mnuevousuario2">
		        <div class="modal-dialog modal-lg">
		          <div class="modal-content">
		            <div class="col-md-12 col-sm-12 col-xs-12">
		            <br>
		             <a href="<?= $this->config->base_url();?>usuario"><p>
		              <button type="button" class="close" aria-hidden="true">&times;</button> </a>
		              <h3><span class ="label label-warning">Registro de Usuarios</span></h3>
					</div>
					<div class="container">
						<div class="row">
	<form action="<?php echo $this->config->base_url();?>usuario/guardar_usuario_2" method="POST" accept-charset="utf-8">
	<br>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<p>
			<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Pais:</label></P>
	   		</div>
			<div class="col-md-4 col-sm-4 col-xs-4">
				<select class="selectpicker form-control" data-live-search="true" id="id_pais" name="id_pais"style="width:7px" required="required">
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
			<div class="col-md-5 col-sm-5 col-xs-5">
			  <select name="id_ciudad" id="id_ciudad" class="form-control" data-live-search="true" required="required">
						<option data-tokens=""value="">Seleccione Ciudad</option>
						 </select>
			</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<br>
	<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Tipo:</label></P>
	   	</div>
			<div class="col-md-4 col-sm-4 col-xs-4">
				<select class="selectpicker form-control" data-live-search="true" id="cb_tipo_usuario" name="cb_tipo_usuario"style="width:7px" required="required">
					 <option data-tokens="Freelance" value="1">Freelance</option>
					 <option data-tokens="Profesional" value="2">Cliente</option>
			</select>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Nombre:</label></P>
	   	</div>
			<div class="col-md-5 col-sm-5 col-xs-5">
				<input type="text" name="txt_nombre" id="txt_nombre" class="form-control" required="required" placeholder="Ingrese Nombre">
			</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs12">
	<p>
		<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Ocupacion:</label></P>
	   	</div>
		<div class="col-md-10 col-sm-10 col-xs-10">
			<input type="text" name="txt_ocupacion" id="txt_ocupacion" class="form-control"required="required" placeholder="Ejemplo: Abogado, Ingeniero de Sistemas, Etc">
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<br>
			<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Direccion:</label></P>
	   	</div>
			<div class="col-md-10 col-sm-10 col-xs-10">
				<textarea name="txt_direccion" id="txt_direccion" class="form-control" rows="3" required="required" placeholder="Ingrese Direccion"></textarea>
			</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<br>
			<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Telefono:</label></P>
	   	</div>
			<div class="col-md-4 col-sm-4 col-xs-4">
			<input type="tel" name="txt_telf" id="txt_telf" class="form-control" required="required" placeholder="Ingrese Telefono">
			</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Login:</label></P>
	   	</div>
			<div class="col-md-5 col-sm-5 col-xs-5">
			<input type="email" name="txt_login" id="txt_login" class="form-control" required="required" placeholder="Ingrese su email">
			</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<br>
			<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Password:</label></P>
	   	</div>
			<div class="col-md-4 col-sm-4 col-xs-4">
			<input type="password" name="txt_clave1" id="txt_clave1" class="form-control" required="required" placeholder="Ingrese Password">
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Repetir Password:</label></P>
	   	</div>
			<div class="col-md-5 col-sm-5 col-xs-5" >
			<input type="password" name="txt_clave2" id="txt_clave2" class="form-control" required="required" onkeyup="caracteres()" placeholder="Repita su Password">
			</div>
				<div id="password1" style='display:none;'><i class="fa fa-exclamation-triangle fa-2x " title=" Campo no debe tener epacios en blanco"></i></div>
				<div id="password2" style='display:none;'><i class="fa fa-ban fa-3x" title=" Las Contraseñas no coinciden"></i></div>
				<div id="password3" style='display:none;'><i class="fa fa-ban fa-3x" title=" Los campos no pueden estar vacios"></i></div>
				<div id="password4" style='display:none;'><i class="fa fa-check-square-o fa-3x" title="Puede Continuar"></i></div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12" id="siguele"  style='display:none;'>
			<div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Sobre Mi:</label></P>
	   	</div>
	 <div class="col-md-10 col-sm-10 col-xs-10" >
	<textarea name="txt_sobre_mi" id="txt_sobre_mi" class="form-control" rows="3" required="required" placeholder="Danos una Referencia de como eres."></textarea>
	 </div>
	 <br>
	 <div class="col-md-12 col-sm-12 col-xs-12">
	 <p>
	  <div class="col-md-1 col-sm-1 col-xs-1">
	   			<P ALIGN="RIGHT"> <label>Valor Hora:</label></P>
	   		</div>
	   		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="number" name="txt_costo_hora" id="txt_costo_hora" class="form-control" required="required">
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
	 </div>
	 <br>
	 </div>
	</div>
			</div>
			</div>
					<br>
		            <div class="modal-footer">
		            <div>
<label>Al hacer Clic en guardar, el usuario acepta los <a href="<?=$this->config->base_url()?>login/condicion" title=""><strong>Terminos y Condiciones</strong></a></label>
		            	<left><button type="submit" class="btn btn-primary"><strong><i class="fa fa-save" ></i>&nbsp; Guardar</strong></button></left>
		            </div>
		            	</form>
		            </div>
		          </div><!-- termina el content -->
		        </div> <!-- termina el modal dialog -->
		    </div> <!-- termina la ventana modal -->