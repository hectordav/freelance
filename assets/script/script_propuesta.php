<script>
function fncSumar(){
var precio_sin_comision = Number(document.getElementById("txt_neto").value);
var comision = Number(document.getElementById("txt_comision").value);
var total_nuevo =((precio_sin_comision*comision)/100)+precio_sin_comision;
var ganancia= (precio_sin_comision*comision)/100
document.getElementById("txt_total").value =(total_nuevo);
document.getElementById("txt_ganancia").value =(ganancia);
}
</script>