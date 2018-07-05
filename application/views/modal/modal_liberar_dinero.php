<div class="modal fade "id="mliberardinero">
		        <div class="modal-dialog modal-lg">
		          <div class="modal-content">
		            <div class="modal-header">
		             <button type="button" class="close" data-dismiss="modal">&times;</button>
		               <strong><h3><span class ="label label-warning">Liberar Dinero</span></h3></strong>
		            </div> <!-- termina el header -->
					<div class="container">
						<div class="row">
	<form action="<?php echo $this->config->base_url();?>propuesta/liberar_dinero" method="POST" accept-charset="utf-8">
	<br>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="col-md-1 col-sm-1 col-xs-1">.</div>
<div class="col-md-10 col-sm-10 col-xs-10"><div class="alert alert-warning">
<label><h4>Recuerde que si libera el dinero es porque acepta que el Freelance ha terminado satisfactoriamente su proyecto.</h4></label>
</div>
</div>
</div>
	<?php if ($propuesta): ?>
		<?php foreach ($propuesta->result() as $data): ?>
		<input type="hidden" name="txt_id_proyecto" id="txt_id_proyecto" value="<?=$data->id_proyecto?>">
		<input type="hidden" name="txt_id_propuesta" id="<?=$data->id_propuesta?>txt_id_propuesta" value="<?=$data->id_propuesta?>">
	<?php endforeach ?>

	<?php endif ?>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-6 col-sm-6 col-xs-6">
	<h4><label>Del uno al Diez, como calificaria a su Freelance</label></h4>
	</div>
	 <div class="col-md-6 col-sm-6 col-xs-6">
					    <div class="radio">
						  <label>
						    <input type="radio" name="puntaje" id="puntaje" value="1" checked >
						  1
						  </label>

						  <label>
						    <input type="radio" name="puntaje" id="puntaje" value="2" >
						  2
						  </label>

						  <label>
							<input type="radio" name="puntaje" id="puntaje" value="3">
						   3
						  </label>

						  <label>
							<input type="radio" name="puntaje" id="puntaje" value="4">
						   4
						  </label>

						  <label>
							<input type="radio" name="puntaje" id="puntaje" value="5">
						   5
						  </label>

						  <label>
							<input type="radio" name="puntaje" id="puntaje" value="6">
						   6
						  </label>

						  <label>
							<input type="radio" name="puntaje" id="puntaje" value="7">
						   7
						  </label>

						  <label>
							<input type="radio" name="puntaje" id="puntaje" value="8">
						   8
						  </label>

						  <label>
							<input type="radio" name="puntaje" id="puntaje" value="9">
						   9
						  </label>

						  <label>
							<input type="radio" name="puntaje" id="puntaje" value="10">
						   10
						  </label>
						</div>

					  </div>
					 </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-5 col-sm-5 col-xs-5">
	<h4><label>Comentarios Adicionales</label></h4>
	</div>
	<div class="col-md-7 col-sm-7 col-xs-7">
	<textarea name="txt_comentario" id="txt_comentario" class="form-control" rows="3" required="required"></textarea>
	<p>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-5 col-sm-5 col-xs-5">
	<h4></h4>
	</div>
	<div class="col-md-7 col-sm-7 col-xs-7">
	<input type="checkbox" name="ch_favorito" id="ch_favorito" value="1" checked=""><label>Agregar Freelance a Favoritos</label>

	<p>
	</div>
</div>
</div>
 <div class="modal-footer">
		            	<left><button type="submit" class="btn btn-primary"><strong><i class="glyphicon glyphicon-usd"></i>&nbsp;Liberar Dinero</strong></button></left>
		            	</form>
					<br>

		           <!-- termina la ventana modal -->

