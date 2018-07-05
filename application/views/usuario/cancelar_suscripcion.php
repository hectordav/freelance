<div class="right_col" role="main" style="height:1040px;">
<br>
<div class="col-md-2 col-sm-2 col-xs-2"></div>
	<div class="col-md-8 col-sm-8 col-xs-8">
		<div class="animated bounceInDown">
<?php if ($alerta): ?>
<div class="alert alert-danger">
	  	<div align="center">
	  	<h4><strong>Error</strong> Correo Electronico invalido</h4>
	  	</div>
</div>
<?php else: ?>
<?php endif ?>
<?php if ($info): ?>
<div class="alert alert-success">
	  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  	<div align="center">
	  	<h4><strong></strong>Ha cancelado la suscripcion a Boletines de noticias</h4>
	  <a href="<?=$this->config->base_url();?>"><button type="button" class="btn btn-success">Volver</button></a>
	  	</div>

</div>

<?php else: ?>
<?php endif ?>
</div>
</div>
			<br>
	    	<br>
	    	<br>
	    	<br>
		<div class="col-md-12 col-sm-12 col-xs-12">



		<div class="col-md-3 col-sm-3 col-xs-3">
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
		<div class="alert alert-warning ">
						<h4>Para cancelar su suscripcion a Boletines de noticias, llene el siguiente Cuadro de texto:</h4>
		</div>
	    	<div >
				<div class="animated bounceInDown">

           		<div class="col-md-12 col-sm-12 col-xs-12">
           		<p></p>
					<div class="col-md-3 col-sm-3 col-xs-3">
						<label style="color: white;">Ingrese su Email </label>
					</div>
<form action="<?=$this->config->base_url();?>usuario/cancelar_suscripcion" method="POST" accept-charset="utf-8">
					<div class="col-md-9 col-sm-9 col-xs-9">
						<input type="email" name="txt_correo" id="txt_correo" class="form-control" value="" required="required" title="">
						<br>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div align="right">
				<button type="submit" class="btn btn-success">Clic aqui</button>
				</form>
				</div>
				</div>
				</div>
	    	</div>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
		</div>
	</div>
</div>
