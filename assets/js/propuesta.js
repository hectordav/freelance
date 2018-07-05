$(document).on("ready".inicio);
function inicio(){
    //mostrardatos();
    $("form").submit(function(event){
        event.preventDefault();
        $.ajax({
            url:$("form").attr("action"),
            type:$("form").attr("method"),
            type:$("form").serialize(),
            success:function(respuesta){
                alert(respuesta);
            }
        });
    });
}
function mostrar_det_propuesta(boton){
  ID=boton.value;
  $.ajax({
      url: "cuerpo_propuesta",
      type:"POST",
      data:{id:ID},
      success: function(respuesta) {
        var registro = eval(respuesta);
        //todo el encabezado
        html = "<div class='col-sm-9 mail_view'>";
        html += " <div class='mail_heading row'>";
        html += "  <div class='col-md-12'>";
       ;
        //cierra el encabezado
        //si hay un registro
        if (registro) {
        for (var i = 0; i < registro.length; i++) {
        html += "<h3>"+ registro[i]["titulo_proyecto"] + "</h3>";
        var precio_comision=registro[i]["precio_propuesta"]*0.09;
        var total=parseInt(precio_comision)+parseInt(registro[i]["precio_propuesta"]);
        html += "<div align='right'>";
        html += "<h3><label class='label label-primary'>Monto de la Propuesta:"+ total + " USD</label></h3>";
        html += "</div>";
        html += "<div align='right'>";
        html += "</div>";
        html += "<hr>";
        html += "</div>";
        html += "</div>";
        html += "<div class='view-mail'>";
        html += "<p>"+ registro[i]["mensaje"] + "</p>";
        html += "<br>";
        html += "<br>";
        html += "<br>";
        html += "</div>";
        html += "<div class='col-md-12'>";
        if (registro[i]["archivo_propuesta"]) {
             html +=" <p><label>Archivo:</label> &nbsp;<a href='/uploads/"+ registro[i]["archivo_propuesta"] + "' download="+ registro[i]["archivo_propuesta"] + "><i class='glyphicon glyphicon-paperclip'></i>"+ registro[i]["archivo_propuesta"] + "</a></p>";
        };
        if (registro[i]["id_status_propuesta"]==1) {
        html += " <div class='compose-btn' align='right'>";
        html += " <a class='btn btn-lg btn-primary' data-toggle='modal' href='#mnuevomensajepropuesta'><i class='fa fa-reply'></i> Enviar Mensaje</a>";
        html += " <a class='btn btn-lg btn-success' href='aceptar_propuesta/"+ registro[i]["id_mensaje"] + "'><i class='glyphicon glyphicon-ok-sign'></i> Aceptar Propuesta</a>";
        html += "</div>";

        }else{
             if (registro[i]["id_status_propuesta"]==2) {
                html += " <a class='btn btn-lg btn-success' data-toggle='modal' href='#mliberardinero'><i class='glyphicon glyphicon-usd'></i>Liberar Dinero</a>";

             }else{
                 html += "<h3><label class='label label-primary'>Esta Propuesta ya fue aceptada y se libero el dinero</label></h3>";
             };
        };


        document.getElementById("txt_cliente_receptor").value =(ID);
        $("#det_mensaje").html(html);
        }
        };
      }
});
}
