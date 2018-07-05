<script type="text/javascript">
            $(document).ready(function() {
                $("#id_categoria").change(function() {
                    $("#id_categoria option:selected").each(function() {
                        id_categoria = $('#id_categoria').val();
                        $.post("<?php echo base_url(); ?>proyecto/fill_categoria", {
                            id_categoria : id_categoria
                        }, function(data) {
                            $("#id_sub_cat").html(data);
                            $("#id_sub_cat").selectpicker('refresh');
                        });
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#id_pais").change(function() {
                    $("#id_pais option:selected").each(function() {
                        id_pais = $('#id_pais').val();
                        $.post("<?php echo base_url(); ?>pais/fill_ciudad", {
                            id_pais : id_pais,
                        }, function(data) {
                          $("#id_ciudad").html(data);
                          $("#id_ciudad").selectpicker('refresh');
                        });
                    });
                });
            });
        </script>
        <script>
function fncvalidar(){
 var id_pais= document.getElementById("id_pais").value;
 var id_ciudad= document.getElementById("id_ciudad").value;
 var txt_titulo_proyecto= document.getElementById("txt_titulo_proyecto").value;
 var id_categoria= document.getElementById("id_categoria").value;
 var id_sub_cat= document.getElementById("id_sub_cat").value;
 var id_presupuesto= document.getElementById("id_presupuesto").value;
 var id_disponibilidad= document.getElementById("id_disponibilidad").value;
 console.log (id_pais);
 console.log("algo");
 console.log(id_ciudad);
 console.log(id_categoria);
 console.log(id_sub_cat);
 console.log(id_presupuesto);
 console.log(id_disponibilidad);
 if (id_pais=="") {
    alert("Pais no puede estar Vacio");
} else if (id_ciudad=="") {
    alert("Ciudad no puede Estar Vacio");
}else if (id_categoria=="") {
    alert("Categoria no puede estar vacio");
} else if (id_sub_cat=="") {
    alert(" Sub Categoria no puede estar vacio");
}else if (txt_titulo_proyecto=="") {
    alert("Titulo del Proyecto no puede estar vacio");
}else if(id_presupuesto=="") {
    alert(" Presupuesto no puede estar vacio");
}else if(id_disponibilidad==""){
    alert(" Disponibilidad no puede estar vacio");
}else{
    document.getElementById('btn_siguiente').type = 'submit';
}
};

</script>