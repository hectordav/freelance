<div class="modal fade "id="mnuevomensaje2">
		        <div class="modal-dialog">
		          <div class="modal-content">
		            <div class="modal-header">
		             <button type="button" class="close" data-dismiss="modal">&times;</button>
		               <strong><h3><span class ="label label-warning">Nuevo Mensaje</span></h3></strong>
		            </div> <!-- termina el header -->
					<div class="container">
						<div class="row">
	<form action="<?php echo $this->config->base_url();?>mensaje/nuevo_mensaje_2" method="POST" accept-charset="utf-8">
	<br>
	<?php if ($mensaje): ?>
		<?php foreach ($mensaje->result() as $data): ?>
		<input type="hidden" name="txt_id_proyecto" id="txt_id_proyecto" value="<?=$data->id_proyecto?>"><?php endforeach ?>
		<input type="hidden" name="txt_cliente_envia" id="txt_cliente_envia" value=" <?=$id_usuario?>">
		<input type="hidden" name="txt_cliente_receptor" id="txt_cliente_receptor" value="">
		<?$fecha= date('Y-m-d');?>
		<input type="hidden" name="txt_fecha" id="txt_fecha" value="<?=$fecha?>">

	<?php endif ?>

		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-2 col-sm-2 col-xs-2">
   			<P ALIGN="RIGHT"> <label>Mensaje:</label></P>
   		</div>
		<div class="col-md-10 col-sm-10 col-xs-10">
		  <textarea name="txt_mensaje" id="txt_mensaje" class="form-control" rows="4" required="required"></textarea>
		</div>
	</div>
			</div>
			</div>
					<br>
		            <div class="modal-footer">
		            	<left><button type="submit" class="btn btn-primary"><strong><i class="glyphicon glyphicon-envelope"></i>&nbsp; Enviar Mensaje</strong></button></left>
		            	</form>
		            </div>
		          </div><!-- termina el content -->
		        </div> <!-- termina el modal dialog -->
		    </div> <!-- termina la ventana modal -->

