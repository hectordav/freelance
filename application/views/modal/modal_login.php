<div class="modal fade "id="login">
		        <div class="modal-dialog">
		          <div class="modal-content">
		            <div class="modal-header">
		             <button type="button" class="close" data-dismiss="modal">&times;</button><?php if ($login): ?>
		               	<center><a href="<?= $login ?>"><img src="<?= $this->config->base_url();?>/images/fb.png"width="200" height="50"></a></center>

		               <?php endif ?>
		               <strong><h3><span class ="label label-warning">Iniciar Sesion</span></h3></strong>


		            </div> <!-- termina el header -->
					<div class="container">
						<div class="row">
	<form action="<?php echo $this->config->base_url();?>login/iniciar_sesion_post_sin_facebook" method="POST" accept-charset="utf-8">
	<br>

		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-1 col-sm-1 col-xs-1">
   			<P ALIGN="RIGHT"> <label>Login:</label></P>
   		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
		<input type="email" class="form-control" name="txt_login" id="txt_login"placeholder="Ingrese su email" aria-describedby="basic-addon1" required="required">
		</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<p></p>
			<div class="col-md-1 col-sm-1 col-xs-1">
   			<P ALIGN="RIGHT"> <label>Clave:</label></P>
   		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
		<input type="password" class="form-control" name="txt_pass" id="txt_pass"placeholder="Ingrese Password" aria-describedby="basic-addon1" required="required">
		<div align="right">
			<h4><a href="<?php echo $this->config->base_url();?>usuario/olvido_su_contrasena">¿Olvidó su password?</a></h4>
		</div>
		</div>

		</div>
			</div>
			</div>
					<br>
		            <div class="modal-footer">
		            	<left><button type="submit" class="btn btn-primary"><strong><i class="glyphicon glyphicon-off"></i>&nbsp; Iniciar Sesion</strong></button></left>
		            	</form>
		            </div>
		          </div><!-- termina el content -->
		        </div> <!-- termina el modal dialog -->
		    </div> <!-- termina la ventana modal -->