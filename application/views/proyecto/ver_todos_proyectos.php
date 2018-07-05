      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
            Proyectos Publicados
                </h3>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="animated fadeIn">
              <div class="x_panel">
                <div class="x_content">
              <div class="radio" align="left">
              <label><h4><strong>Buscar por: &nbsp;&nbsp;&nbsp;</strong></h4></label>
              <label>
                <input type="radio" name="opciones" id="opciones" value="1" checked onclick="mostrar_categoria()">
              Categorias
              </label>
              <label>
                <input type="radio" name="opciones" id="opciones" value="2"  onclick="mostrar_pais()">
             Paises/Ciudades
              </label>
            </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                  <div id="categoria" style='display:block;'>
                   <div class="col-md-12 col-sm-12 col-xs-12">
                 <?php if ($id_usuario==0): ?>
                  <div class="alert alert-warning" align="center">
                   <h4><label>Inicia sesion para ver mas resultados</label></h4>
                  </div>
                   <?php else: ?>
                 <?php endif ?>
                </div>
                 <div  class="col-md-5 col-sm-5 col-xs-5">
    <form action="<?=$this->config->base_url();?>proyecto/buscar_proyectos" method="POST" accept-charset="utf-8">
    <?php if ($id_usuario==0): ?>
                <?php else: ?>
                <select class="selectpicker form-control" data-live-search="true" id="id_categoria" name="id_categoria"required>
                    <?php if ($categoria): ?>
                      <option data-tokens="", "" value="">Seleccione una Categoria</option>
                      <?php foreach ($categoria->result() as $data): ?>
                      <option data-tokens="<?= $data->id.", ".$data->descripcion?>" value="<?= $data->id ?>"><?= $data->descripcion?></option>
                      <?php endforeach ?>
                    <?php else: echo "no hay Resultados"?>
                    <?php endif ?>
              </select>
                </div>
                <div  class="col-md-5 col-sm-5 col-xs-5">
                 <select name="id_sub_cat" id="id_sub_cat" class=" form-control" data-live-search="true" required>
              <option value="">Seleccione una Sub Categoria</option>
              option
                </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <div align="right">
                  <button type="submit" class="btn btn-success btn-lg"><strong><i class="fa fa-search" ></i>&nbsp; Buscar</strong></button></left>
                  </div>
                  </div>
                   <?php endif ?>
                </div>
                </div>
                </form>

<!-- ****************************************************************** -->
                <div id="pais" style='display:none;'>
                <div class="col-md-12 col-sm-12 col-xs-12" >
                 <?php if ($id_usuario==0): ?>
                  <div class="alert alert-warning" align="center">
                   <h4><label>Inicia sesion para ver mas resultados</label></h4>
                  </div>
                   <?php else: ?>
                </label>
                 <?php endif ?>
                </div>
                 <div  class="col-md-12 col-sm-12 col-xs-12">
    <?php if ($id_usuario==0): ?>
                <?php else: ?>
   <div  class="col-md-5 col-sm-5 col-xs-5">
    <form action="<?=$this->config->base_url();?>proyecto/buscar_proyectos_x_pais" method="POST" accept-charset="utf-8">
                <select class="selectpicker form-control" data-live-search="true" id="id_pais" name="id_pais"required>
                    <?php if ($pais): ?>
                      <option data-tokens="", "" value="">Seleccione Pais</option>
                      <?php foreach ($pais->result() as $data): ?>
                      <option data-tokens="<?= $data->cod.", ".$data->pais?>" value="<?= $data->cod ?>"><?= $data->pais?></option>
                      <?php endforeach ?>
                    <?php else: echo "no hay Resultados"?>
                    <?php endif ?>
              </select>
                </div>
                <div  class="col-md-5 col-sm-5 col-xs-5">
                 <select name="id_ciudad" id="id_ciudad" class=" form-control" data-live-search="true" required>
              <option value="">Seleccione Ciudad</option>
              option
                </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <div align="right">
                  <button type="submit" class="btn btn-success btn-lg"><strong><i class="fa fa-search" ></i>&nbsp; Buscar</strong></button></left>
   </form>
                  </div>
                   <?php endif ?>
                </div>
                </div>
                </div>
                <div class="x_title">
                  <div class="clearfix"></div>
                </div>
                <br>
<div class="col-md-12 content">
<?php if ($respuesta): ?>
  <?php foreach ($respuesta as $fila): ?>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                               <?php echo $fila->titulo_proyecto ?>
                                <span class="pull-right"><a href="<?=$this->config->base_url();?>proyecto/ver_proyecto/<?=$fila->id_proyecto ?>"><button type="button" class="btn btn-primary btn-sm">Ver Proyecto</button></a></span>
                            </h3>
                            <br></div>
                        <div class="panel-body">
                        <?=substr($fila->descripcion_proyecto, 0, 200)?>...
                        </div>
                         <div class="panel-footer" align="right">
                         <? $fecha_i=date('d-m-Y', strtotime($fila->fecha_publicacion_proyecto))?>
                         <span class="label label-success"><strong> Precio:</strong> <?php echo $fila->rango_precio_proyecto?></span> <span class="label label-success"><strong>
                       Pais:</strong> <?php echo $fila->pais_usuario?><strong></span> <span class="label label-success"><strong>Publicado:</strong> <?php echo $fecha_i?></span> <span class="label label-success"><strong> Plazo: </strong><?php echo $fila->plazo_entrega?></span>
                         </div>
                    </div>
                <?php
                $id = $fila->id_proyecto; ?>
  <?php endforeach ?>
<?php else: ?>
  <label>no hay datos que mostrar</label>
<?php endif ?>
            </div>
            <?php if ($respuesta): ?>
              <div class="before col-md-12 text-center"><img src='../images/loader.gif' /></div>
            <div class="lastId" style="display:none" id="<?php echo  $id?>"></div>
            <?php else: ?>
            <?php endif ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- footer content -->
        <footer>
          <div class="copyright-info">
           <!-- <p class="pull-right">Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </p>-->
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
      <!-- /page content -->
    </div>
  </div>
  <script type="text/javascript">
//creamos una función para llamarla en el evento del scroll
function loadMore()
{
    var id = $(".lastId").attr("id"), getLastId, html = "";
    if (id != "" || id != "undefined")
    {
        $.ajax({
            type : "POST",
            url : "/proyecto/loadMore",
            data : "lastId=" + id,//la última id
            beforeSend: function()
            {
                $(".before").show();
            },
            success : function(data)
            {
                $(".before").hide();
                var json = JSON.parse(data);
                if(json.res === "success")
                {
                   for(datos in json.proyectos)
                   {
                html += '<div class="panel panel-info">';
                html += '<div class="panel-heading">';
                html += '<h3 class="panel-title">';
                html += json.proyectos[datos].titulo_proyecto;
                html += '<span class="pull-right"><a href="/freelance/proyecto/ver_proyecto/' + json.proyectos[datos].id_proyecto + '"><button type="button" class="btn btn-primary btn-sm">Ver Proyecto</button></a></span>';
                html += '</h3>';
                html += '<br></div>';
                html += '<div class="panel-body">';
                var trunca = json.proyectos[datos].descripcion_proyecto.substring(0, 200);
                html += '<p>' + trunca + '</p>';
                html += '<p>' + json.proyectos[datos].fecha_publicacion_proyecto + '</p>';
                html += '</div>';
                html += '<div class="panel-footer" align="right">';
                html += ' <span class="label label-success"><strong> Precio:</strong>'+ json.proyectos[datos].rango_precio_proyecto + '</span>';
                html += ' <span class="label label-success"><strong> Pais:</strong>'+ json.proyectos[datos].pais_usuario + '</span>';
                html += ' <span class="label label-success"><strong> Publicado:</strong>'+ json.proyectos[datos].fecha_inicio + '</span>';
                html += ' <span class="label label-success"><strong> Plazo:</strong>'+ json.proyectos[datos].plazo_entrega + '</span>';
                html += '</div>';
                 html += '</div>';
                getLastId = json.proyectos[datos].id_proyecto;
                   }
                   $(".content").append(html);
                     scrollLoad = true;
                       console.log(getLastId);
               }
               else
               {
                    moreusers = false;
                    $(".content").append("<div class='animated fadeIn'><div class='alert alert-danger text-center'>no hay proyectos que mostrar</div></div>");
               }
                 $(".lastId").attr("id",getLastId);
            },
            error: function()
            {
                console("un error");
            }
        });
    }
}
//actuamos en en evento del scroll
var scrollLoad = true;
$(window).scroll(function () {
  if (scrollLoad && $(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
    scrollLoad = false;
    loadMore();
  }
});
</script>
