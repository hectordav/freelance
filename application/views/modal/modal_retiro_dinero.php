<div class="modal fade" tabindex="-1" role="dialog" id="mretirodinero">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Retiro De Dinero</h4>
      </div>
      <div class="modal-body">
      <form action="<?php echo $this->config->base_url();?>deposito_garantia/retirar_dinero" method="POST" accept-charset="utf-8">
      <?php if ($deposito_garantia): ?>
      	<?php foreach ($deposito_garantia->result() as $data): ?>
      	<input type ="hidden" name="txt_login_usuario"id="txt_login_usuario" value="<?=$data->login_usuario?>">
      	<input type="hidden" name="txt_id_deposito" id="txt_id_deposito" value="<?=$data->id_deposito_garantia?>">
				<input type ="hidden" name="txt_titulo_proyecto"id="txt_titulo_proyecto" value="<?=$data->titulo_proyecto?>">
				<input type ="hidden" name="txt_num_factura"id="txt_num_factura" value="<?=$data->num_factura?>">
				<input type ="hidden" name="txt_monto_sin_comision"id="txt_monto_sin_comision" value="<?=$data->monto_sin_comision?>">
				<input type ="hidden" name="txt_monto_con_comision"id="txt_monto_con_comision" value="<?=$data->monto_con_comision?>">
				<input type ="hidden" name="txt_fecha_pago"id="txt_fecha_pago" value="<?=$data->fecha_pago?>">


      	<?php endforeach ?>
      <?php else: ?>
      	<label>no hay datos que mostrar</label>



      <?php endif ?>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-6 col-sm-6 col-xs-6">
		<h4><label>Del uno al Diez, como calificaria a su Cliente</label></h4>
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
	<input type="checkbox" name="ch_favorito" id="ch_favorito" value="1" checked=""><label>Agregar Cliente a Favoritos</label>

	<p>
	</div>
</div>

      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-success">Retirar Dinero</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->