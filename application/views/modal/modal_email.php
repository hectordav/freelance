<div class="modal fade "id="memail">
		        <div class="modal-dialog">
		          <div class="modal-content">
		            <div class="modal-header">

		               <button type="button" class="close" data-dismiss="modal">&times;</button>
		               <strong><h3><span class ="label label-success">Compartir Por Email</span></h3></strong>
		            </div> <!-- termina el header -->
					<div class="container">
						<div class="row">
	<form action="<?php echo $this->config->base_url();?>proyecto/enviar_mail" method="POST" accept-charset="utf-8">
	  <?php foreach ($proyecto->result() as $data): ?>
			<input type="hidden" name="txt_id_proyecto"  id="txt_id_usuario"value="<?=$data->id_proyecto?>">
	<?php endforeach ?>

	<br>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-2 col-sm-2 col-xs-2">
	   			<P ALIGN="RIGHT"> <label>Para:</label></P>
	   		</div>
			<div class="col-md-10 col-sm-10 col-xs-10">
			   <input type="email" name="txt_remitente" id="txt_remitente" class="form-control" value="" required="required" placeholder="Ingrese Email Destinatario">
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<br>
			<div class="col-md-2 col-sm-2 col-xs-2">
	   			<P ALIGN="RIGHT"> <label>Mensaje:</label></P>
	   		</div>
			<div class="col-md-10 col-sm-10 col-xs-10">
			<input type="text" name="txt_mensaje" id="txt_mensaje" class="form-control" required="required" placeholder="Ingrese un mensaje">
			</div>
		</div>
			</div>
			</div>
					<br>
		            <div class="modal-footer">
		            	<left><button type="submit" class="btn btn-primary"><strong><i class="glyphicon glyphicon-envelope"></i>&nbsp; Enviar</strong></button></left>
		            	</form>
		            </div>
		          </div><!-- termina el content -->
		        </div> <!-- termina el modal dialog -->
		    </div> <!-- termina la ventana modal -->