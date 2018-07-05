<div class="modal fade "id="mnuevapropuesta">
		        <div class="modal-dialog">
		          <div class="modal-content">
		            <div class="modal-header">
		             <button type="button" class="close" data-dismiss="modal">&times;</button>
		               <strong><h3><span class ="label label-warning">Nueva Propuesta</span></h3></strong>
		            </div> <!-- termina el header -->
					<div class="container">
						<div class="row">
	<form action="<?php echo $this->config->base_url();?>propuesta/nueva_propuesta" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	<br>
	<?php if ($proyecto): ?>
		<?php foreach ($proyecto->result() as $data): ?>
		<input type="hidden" name="txt_id_proyecto" id="txt_id_proyecto" value="<?=$data->id_proyecto?>">
		<input type="hidden" name="txt_cliente_envia" id="txt_cliente_envia" value="<?=$id_usuario?>">
		<input type="hidden" name="txt_cliente_receptor" id="txt_cliente_receptor" value=<?=$data->id_cliente_receptor?>>
	<?php endforeach ?>
	<?php endif ?>

		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-2 col-sm-2 col-xs-2">
   			<P ALIGN="RIGHT"> <label>Mensaje:</label></P>
   		</div>

		<div class="col-md-10 col-sm-10 col-xs-10">
		  <textarea name="txt_mensaje" id="txt_mensaje" class="form-control" rows="4" required="required"></textarea>
		</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<br>
		<div class="col-md-2 col-sm-2 col-xs-2">
   			<P ALIGN="RIGHT"> <label>Neto a cobrar:</label></P>
   		</div>
		<div class="col-md-10 col-sm-10 col-xs-10">
		  <input type="number" name="txt_neto" id="txt_neto" class="form-control" value="" required="required">
		</div>
		</div>

			</div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-2 col-sm-2 col-xs-2">

				</div>
				<div class="col-md-10 col-sm-10 col-xs-10">
					<input type="file" name="mi_archivo">
					<br>
				</div>
			</div>
					<br>
		            <div class="modal-footer">
		            	<left><button type="submit" class="btn btn-primary"><strong><i class="glyphicon glyphicon-envelope"></i>&nbsp; Enviar Propuesta</strong></button></left>
		            	</form>
		            </div>
		          </div><!-- termina el content -->
		        </div> <!-- termina el modal dialog -->
		    </div> <!-- termina la ventana modal -->