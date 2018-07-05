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
    <form action="<?=$this->config->base_url();?>usuario/exito" method="POST" accept-charset="utf-8">
					<div class="col-md-3 col-sm-3 col-xs-3">
						<label style="color: white;">Ingrese su Nueva Contraseña</label>
					</div>
				<input type="hidden" name="samsung" id="samsung" value="<?=$id_usuario?>">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<input type="password" name="txt_clave1" id="txt_clave1" class="form-control" value="" required="required" title="">
						<br>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-3 col-sm-3 col-xs-3">
						<label style="color: white;">Repita su Contraseña</label>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<input type="password" name="txt_clave2" id="txt_clave2" class="form-control" value="" required="required" onkeyup="caracteres()" title="">
						<br>


				<div class="col-md-1 col-sm-1 col-xs-1">
					<div id="password1" style='display:none;'><i class="fa fa-exclamation-triangle fa-2x " title=" Campo no debe tener epacios en blanco"></i></div>
					<div id="password2" style='display:none;'><i class="fa fa-ban fa-3x" title=" Las Contraseñas no coinciden"></i></div>
					<div id="password3" style='display:none;'><i class="fa fa-ban fa-3x" title=" Los campos no pueden estar vacios"></i></div>
					<div id="password4" style='display:none;'><i class="fa fa-check-square-o fa-3x" title="Puede Continuar"></i><button type="submit" class="btn btn-success">Restablecer Password</button></div>
						</div>
				</div>
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

