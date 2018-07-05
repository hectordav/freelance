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
function mostrar_det_mensaje(boton){
  ID=boton.value;
  $.ajax({
      url: "cuerpo_mensaje",
      type:"POST",
      data:{id:ID},
      success: function(respuesta) {
        var registro = eval(respuesta);
        //todo el encabezado
        html = "<div class='col-sm-8'>";
        if (registro) {
        for (var i = 0; i < registro.length; i++) {
        fecha=registro[i]["fecha_mensaje"].split("-");

        html += "Fecha: "+fecha[2]+"-"+fecha[1]+"-"+fecha[0]+"<br>";
        html += "<strong> Envia: </strong> "+registro[i]["nombre_usuario"];
        html += "<p><strong> Nombre de Proyecto: </strong>"+registro[i]["titulo_proyecto"]+ "</p>" ;
        html += "<p><strong> Mensaje:  </strong>"+registro[i]["mensaje"] ;
        html += "<hr>";
        }
        html += " <div class='compose-btn' align='right'>";
        html += " <a class='btn btn-sm btn-primary' data-toggle='modal' href='#mnuevomensaje2'><i class='fa fa-reply'></i>Responder</a>";
        html += "</div>";
        html += "</div>";
        document.getElementById("txt_cliente_receptor").value =(ID);
          $("#det_mensaje").html(html);
        };
      }
});
}

