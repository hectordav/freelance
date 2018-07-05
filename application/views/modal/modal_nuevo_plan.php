<div class="modal fade "id="mnuevoplan">
		        <div class="modal-dialog">
		          <div class="modal-content">
		            <div class="modal-header">
		             <a href="<?= $this->config->base_url();?>plan">
		              <button type="button" class="close" aria-hidden="true">&times;</button></a>
		               <strong><h3><span class ="label label-warning">Nuevo Plan</span></h3></strong>
		            </div> <!-- termina el header -->
					<div class="container">
						<div class="row">
	<form action="<?php echo $this->config->base_url();?>plan/add_plan" method="POST" accept-charset="utf-8">
	<br>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-2 col-sm-2 col-xs-2">
   			<P ALIGN="RIGHT"> <label>Titulo:</label></P>
   		</div>
		<div class="col-md-10 col-sm-10 col-xs-10">
		   <input type="text" name="txt_titulo_plan" id="txt_titulo_plan" class="form-control" value="" required="required" placeholder="Ingrese Titulo del plan">
		</div>


	</div>
			</div>
			</div>
					<br>
		            <div class="modal-footer">
		            	<left><button type="submit" class="btn btn-primary"><strong><i class="fa fa-plus-circle"></i>&nbsp; Crear Plan</strong></button></left>
		            	</form>
		            </div>
		          </div><!-- termina el content -->
		        </div> <!-- termina el modal dialog -->
		    </div> <!-- termina la ventana modal -->