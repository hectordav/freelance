<div class="modal fade "id="mnuevahabilidad">
		        <div class="modal-dialog">
		          <div class="modal-content">
		            <div class="modal-header">

		               <button type="button" class="close" data-dismiss="modal">&times;</button>
		               <strong><h3><span class ="label label-success">Nueva Habilidad</span></h3></strong>
		            </div> <!-- termina el header -->
					<div class="container">
						<div class="row">
	<form action="<?php echo $this->config->base_url();?>habilidad/nueva_habilidad" method="POST" accept-charset="utf-8">
	  <?php foreach ($ver_usuario->result() as $data): ?>
			<input type="hidden" name="txt_id_usuario"  id="txt_id_usuario"value="<?=$data->id_usuario?>">
	<?php endforeach ?>

	<br>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-2 col-sm-2 col-xs-2">
	   			<P ALIGN="RIGHT"> <label>Habilidad:</label></P>
	   		</div>
			<div class="col-md-10 col-sm-10 col-xs-10">
			   <input type="text" name="txt_habilidad" id="txt_habilidad" class="form-control" value="" required="required" placeholder="Ingrese Habilidad">
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<br>
			<div class="col-md-2 col-sm-2 col-xs-2">
	   			<P ALIGN="RIGHT"> <label>Porcentaje:</label></P>
	   		</div>
			<div class="col-md-10 col-sm-10 col-xs-10">
			<input type="number" name="txt_porcentaje" id="txt_porcentaje" class="form-control" value="" min="{0"} max="100" step="" required="required" title="Ingrese Porcentaje">
			</div>
		</div>
			</div>
			</div>
					<br>
		            <div class="modal-footer">
		            	<left><button type="submit" class="btn btn-primary"><strong><i class="fa fa-floppy-o"></i>&nbsp; Guardar</strong></button></left>
		            	</form>
		            </div>
		          </div><!-- termina el content -->
		        </div> <!-- termina el modal dialog -->
		    </div> <!-- termina la ventana modal -->