<div class="modal fade "id="mnuevoproyecto">
		        <div class="modal-dialog">
		          <div class="modal-content">
		            <div class="modal-header">
		             <a href="<?= $this->config->base_url();?>plan">
		              <button type="button" class="close" aria-hidden="true">&times;</button></a>
		               <strong><h3><span class ="label label-warning">Nuevo Proyecto</span></h3></strong>
		            </div> <!-- termina el header -->
					<div class="container">
						<div class="row">
	<form action="<?php echo $this->config->base_url();?>proyecto/add_proyecto" method="POST" accept-charset="utf-8">
	<br>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-2 col-sm-2 col-xs-2">
   			<P ALIGN="RIGHT"> <label>Categoria:</label></P>
   		</div>
		<div class="col-md-10 col-sm-10 col-xs-10">
		 <select class="selectpicker form-control" data-live-search="true" id="id_categoria" name="id_categoria"style="width:10px" required>
					  <?php if ($categoria): ?>
						  <?php foreach ($categoria->result() as $data): ?>
							<option data-tokens="<?= $data->id.", ".$data->descripcion?>" value="<?= $data->id ?>"><?= $data->descripcion?></option>
						  <?php endforeach ?>
						<?php else: echo "no hay Resultados"?>
					  <?php endif ?>
			</select>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
	<br>
		<div class="col-md-2 col-sm-2 col-xs-2">
   			<P ALIGN="RIGHT"> <label>Sub Categoria:</label></P>
   		</div>
		<div class="col-md-10 col-sm-10 col-xs-10">
		 <select class="selectpicker form-control" data-live-search="true" id="id_sub_cat" name="id_sub_cat"style="width:10px" required>
			</select>
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