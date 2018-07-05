<!-- ********************************top navigation ********************-->
<script>
  function prueba_notificacion(){
    var mensaje = document.getElementById("txt_mensaje").value;
    var propuesta=document.getElementById("txt_propuesta").value;

              if (Notification) {
                if (Notification.permission !== "granted") {
                  Notification.requestPermission()
                }
              if (mensaje>0) {
               var title = "Freelance-employ.com"
                var extra = {
                  icon: "http://freelance-employ.com/images/frelance_employ.png",
                  body: "Tienes"+ mensaje +" mensajes en tu bandeja de mensajes"
                }

                // Generamos la notificación
                  var noti = new Notification( title, extra);

                  noti.onshow=function(){
                    console.log('Notificación: show')
                  }
                  noti.onclick=function(){
                    console.log('Notificación: click')
                  }
                  noti.onerror=function(){
                    console.log('Notificación: error')
                  }
                  noti.onclose=function(){
                    console.log('Notificación: close')
                  }

                  // Se cierra a los 10s
                  setTimeout(function() {noti.close()}, 10000);
              }
              if (propuesta>0) {
                var title = "Freelance-employ.com"
                var extra = {
                  icon: "http://freelance-employ.com/images/frelance_employ.png",
                  body: "Tienes"+ propuesta +" propuestas en tu bandeja"

                }

                // Generamos la notificación
                  var noti = new Notification( title, extra);

                  noti.onshow=function(){
                    console.log('Notificacion: show')
                  }
                  noti.onclick=function(){
                    console.log('Notificacion: click')
                  }
                  noti.onerror=function(){
                    console.log('Notificacion: error')
                  }
                  noti.onclose=function(){
                    console.log('Notificacion: close')
                  }

                  // Se cierra a los 10s
                  setTimeout(function() {noti.close()}, 10000);

              };
            }
            function prueba_notificacion2(){
              if (Notification) {
                if (Notification.permission !== "granted") {
                  Notification.requestPermission()
                }

                if(typeof noti2 != 'undefined'){
                  noti2.onclose=null;
                  noti2.close()
                }

                var title = "Xitrus"
                var extra = {
                  icon: "http://xitrus.es/imgs/logo_claro.png",
                  body: "Cierra o pulsa la notificación"
                }

                // Generamos la notificación
                  noti2 = new Notification( title, extra);

                  noti2.onclick=function(){
                  noti2.onclose=null;
                    document.getElementById('XITRUS_act_perm2').value='click'
                    setTimeout(function(){document.getElementById('XITRUS_act_perm2').value=''}, 2000)
                  }
                  noti2.onclose=function(){
                    document.getElementById('XITRUS_act_perm2').value='close'
                    setTimeout(function(){document.getElementById('XITRUS_act_perm2').value=''}, 2000)
                  }
              }

              };

            }
</script>
  <body onload="prueba_notificacion()">
    <?php if ($mensaje): ?>
      <input type="hidden" name="txt_mensaje" id="txt_mensaje" value="<?=$mensaje?>">
    <?php else: ?>
        <input type="hidden" name="txt_mensaje" id="txt_mensaje" value="0">
    <?php endif ?>
    <?php if ($propuesta): ?>
      <input type="hidden" name="txt_propuesta" id="txt_propuesta" value="<?=$propuesta?>">
    <?php else: ?>
        <input type="hidden" name="txt_propuesta" id="txt_propuesta" value="0">
    <?php endif ?>
<div class="top_nav">
  <div class="nav_menu">
      <nav class="" role="navigation">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="">

          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?= $this->config->base_url();?>images/<?=$imagen?>" alt=""><label><?=$nombre_usuario?></label>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
            <li><a href="<?= $this->config->base_url();?>usuario/ver_usuario/<?=$id_usuario?>">Perfil</a>
            </li>
             <li><a href="<?= $this->config->base_url();?>preferencia">Preferencias</a>
            </li>
            <li><a href="<?= $this->config->base_url();?>login/cerrar_sesion"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesion</a>
            </li>
          </ul>
        </li>
         <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-globe"></i>

            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
            <li><a target="_blank" href="https://www.facebook.com/Freelanceemploy/"> <img src="<?= $this->config->base_url();?>/images/fb_2.png" width="22" height="22"></i> &nbsp;Siguenos en Facebook</a>
            </li>
             <li><a target="_blank" href="https://twitter.com/?lang=es"> <img src="<?= $this->config->base_url();?>/images/tw.png" width="22" height="22"> &nbsp;Siguenos en twitter</a>
            </li>
            <li><a target="_blank" href="https://plus.google.com/u/0/116489242292456419624/posts"> <img src="<?= $this->config->base_url();?>/images/gp.png" width="22" height="22"> &nbsp;Siguenos en Google+</a>
            </li>
            <li><a target="_blank" href="https://es.pinterest.com/Freelanceemploy/"> <img src="<?= $this->config->base_url();?>/images/pts.png" width="22" height="22"></i> &nbsp;Siguenos en Pinterest</a>
            </li>
             <li><a target="_blank" href="https://www.youtube.com/channel/UC7nfQpsArOp-fR_L1U0uOXg"> <img src="<?= $this->config->base_url();?>/images/yt.png" width="22" height="22"></i> &nbsp;Miranos en Youtube</a>
            </li>
          </ul>
        </li>
       <li class="">
          <a href="<?= $this->config->base_url();?>proyecto/cargar_proyecto_todos" class="" >
        <i class="glyphicon glyphicon-th-list"></i><label>&nbsp;&nbsp;Proyectos Publicados</label>
          </a>
          <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
          </ul>
        </li>
           <li class="">
          <a href="<?= $this->config->base_url();?>principal" class="" >
        <i class="glyphicon glyphicon-dashboard"></i><label>&nbsp;&nbsp;Panel de Control</label>
          </a>
          <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
          </ul>
        </li>
      </ul>
      </nav>
  </div>
</div>
<!-- /top navigation -->
