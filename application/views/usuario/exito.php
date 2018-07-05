<div class="right_col" role="main" style="height:1040px;">
<br>
<div class="col-md-2 col-sm-2 col-xs-2"></div>
	<div class="col-md-8 col-sm-8 col-xs-8">
		<div class="animated bounceInDown">
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
	    	<div >
				<div class="animated bounceInDown">
           		<div class="col-md-12 col-sm-12 col-xs-12">
    <form action="<?=$this->config->base_url();?>usuario/enviar_correo" method="POST" accept-charset="utf-8">
					<div class="col-md-10 col-sm-10 col-xs-10">
						<h4><label style="color: white;">Se ha reestablecido su clave, haga clic para ir al Inicio de Sesion</label></h4>
						<a href="<?=$this->config->base_url();?>"><button type="button" class="btn btn-success">Volver</button></a>
					</div>

	    	</div>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
		</div>
	</div>
</div>

<script>
function caracteres(){
var espacios = false;
var cont = 0;
var p1 = document.getElementById("txt_clave1").value;
var p2 = document.getElementById("txt_clave2").value;
while (!espacios && (cont < p1.length)) {
  if (p1.charAt(cont) == " ")
    espacios = true;
  cont++;
}
$("select").val();
if (espacios) {
	document.getElementById('password1').style.display = 'block';
 	document.getElementById('password2').style.display = 'none';
	document.getElementById('password3').style.display = 'none';
  return false;
}
if (p1.length == 0 || p2.length == 0) {
	document.getElementById('password1').style.display = 'none';
	document.getElementById('password2').style.display = 'none';
	document.getElementById('password3').style.display = 'block';
	document.getElementById('password4').style.display = 'none';
	document.getElementById('siguele').style.display = 'none';

  return false;
}
if (p1 != p2) {
  document.getElementById('password1').style.display = 'none';
	document.getElementById('password2').style.display = 'block';
	document.getElementById('password3').style.display = 'none';
	document.getElementById('password4').style.display = 'none';
	document.getElementById('siguele').style.display = 'none';
  return false;
} else {
	document.getElementById('password1').style.display = 'none';
	document.getElementById('password2').style.display = 'none';
	document.getElementById('password3').style.display = 'none';
	document.getElementById('password4').style.display = 'block';
	document.getElementById('siguele').style.display = 'block';
  return true;
}
}
</script>

