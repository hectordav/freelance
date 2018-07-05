<div class="right_col" role="main" style="height:1040px;">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<br>
				<div class="animated fadeIn" align="right">

					<a data-toggle="modal" href="#login"><button type="button" class="btn btn-primary">Ingresa</button></a>
					<a data-toggle="modal" href="#mnuevousuario"><button type="button" class="btn btn-primary">Registrate</button></a>
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
