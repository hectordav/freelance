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
function mostrardatos(datos) {
    $.ajax({
        url: "/freelance/plan/mostrar_det_plan",
        type: 'POST',
        data: $("#form-guardar").serialize(),
        success: function(respuesta) {
            var registro = eval(respuesta);
            html = "<hr><table id='mytable' class='table table-condensed table-bordered table-hover'>";
            html += "<thead><tr>";
            html += "<th class='warning col-md-10 col-sm-10 col-xs-10'>Descripcion</th>"; //la columna de articulo
            html += "<th class='warning col-md-2 col-sm-2 col-xs-2'>Acciones</th>"; //la columna de cantidad
            html += "</thead><tbody>";
            //si hay un registro
            if (registro) {
        	for (var i = 0; i < registro.length; i++) {
            html += "<tr><td>" + registro[i]["descripcion"] + "</td>";
           html += "<td><button class='btn btn-default glyphicon glyphicon-trash ' name='btn_eliminar'id='btn_eliminar'OnClick='eliminar_det_plan(this)' type='button' value='" + registro[i]["id"] + "' title='ELiminar Item'></button></td>";
            $("#det_plan").html(html);
			document.getElementById('txt_descripcion').value = '';
            }
            }else{
            	html += "<tr><td></td>";
            	html += "<td></td></tr>";
            	$("#det_plan").html(html);
			document.getElementById('txt_descripcion').value = '';
            };
        }
    });
}
function guardar_det_plan(datos){
	event.preventDefault();
	$.ajax({
		url: "/freelance/plan/guardar_det_plan_back",
		type:"POST",
		data: $("#form-guardar").serialize(),
		success:function(respuesta){
		mostrardatos("");
	}
});
}
function actualizar_instalacion(){
	event.preventDefault();
	$.ajax({
		url: "/hotel/instalacion/actualizar_instalacion",
		type:"POST",
		data: $("#form-actualizar").serialize(),
		success:function(respuesta){
			mostrardatos("");
	}
});
}
function eliminar_det_plan(boton){
	ID=boton.value;
	$.ajax({
		url: "/freelance/plan/eliminar_det_plan",
		type:"POST",
		data:{id:ID},
		success:function(respuesta){
			mostrardatos("");
		}
});
}
function eliminar_factura(boton){
	var respuesta = confirm("Desea Salir?");
	if(respuesta){
	ID=boton.value;
		$.ajax({
				url: "/factura/eliminar_toda_factura",
				type:"POST",
				data:{id:ID},
				success:function(respuesta){
		    	top.location.href="/factura";//redirection
				}
		});
	}
}
function cambiar_status_det_instalacion(boton){
	ID=boton.value;
	$.ajax({
		url: "/hotel/cta_corriente/cambiar_status_item_det_cta_corriente",
		type:"POST",
		data:{id:ID},
		success:function(respuesta){
			mostrardatos("");
		}
});
}
