<div class="right_col" role="main" style="height:1040px;">
		<div class="col-md-12 col-sm-12 col-xs-12">

<?$correcto = $this->session->flashdata('alerta');
    if (($correcto))
    {?>
<div class="animated bounceInDown">
		 <div class="alert alert-error alert-dismissible" role="alert">
			<strong></strong><?=$correcto?>
			<br>
		</div>
</div>
<!--**********************************-->
    <?}else{?>
    	<?}?>
    <?$otro = $this->session->flashdata('otro_mas');
    if ($otro)
    {?>
	<div class="animated bounceInDown">
		 <div class="alert alert-error alert-dismissible" role="alert">
			<strong></strong>Se envio un email al Administrador y en 2 dias habiles tendra el dinero en su cuenta.
			<br>

		</div>
	</div>
<!--**********************************-->

    <?}?>
	    	<div class="x_panel">
				<div class="animated fadeIn">
           			<?php echo $output; ?>
				</div>
	    	</div>
		</div>
</div>
