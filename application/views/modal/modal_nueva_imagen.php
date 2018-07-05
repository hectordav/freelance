<div class="modal fade "id="mnuevaimagen">
		        <div class="modal-dialog">
		          <div class="modal-content">
		            <div class="modal-header">

		               <button type="button" class="close" data-dismiss="modal">&times;</button>
		               <strong><h3><span class ="label label-success">Cambiar Imagen</span></h3></strong>
		            </div> <!-- termina el header -->
					<div class="container">
						<div class="row">
	<form action="<?php echo $this->config->base_url();?>usuario/subir_imagen" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	  <?php foreach ($ver_usuario->result() as $data): ?>
			<input type="hidden" name="txt_id_usuario"  id="txt_id_usuario"value="<?=$data->id_usuario?>">
	<?php endforeach ?>

	<br>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-1 col-sm-1 col-xs-1"></div>
		<div class="col-md-10 col-sm-10 col-xs-10">
			<input type="file" name="mi_archivo" required>
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