<script language="JavaScript" type="text/javascript">
$('#mnuevousuario2').modal('show');
</script>

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


