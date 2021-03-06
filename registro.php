<?php
   //Inicio la session
   session_start();

   // //COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
   if (!$_SESSION['email']) {
           //si no existe, envío a la página de autentificación
           header("Location: login.php");
           exit();
   } 
require_once ("include/header.php");
include_once("include/dbConexion.php");
include_once("include/validar_registro.php");
?>
<!-- ======= Seccion de Registro ======= -->
<section class="bg-light py-5">
    <div class="container">
      <div class="row">
          <span style="color: #ed1b24">
            <?= $mensaje ?>
          </span>
      	<div class=" col-md-4 col-lg-4">
            <div class="info">
              <div class="red-inst">
                <li class="list-inline"><i class="fa fa-map-marker"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9020.449601909662!2d-99.18742347636712!3d19.31075889845436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xecbd2e7c9f00b20!2sPUEE%20UNAM!5e0!3m2!1ses!2smx!4v1623934452162!5m2!1ses!2smx" width="150" height="100" style="border:0;" allowfullscreen="" loading="lazy"></iframe></i></li>
                <p> Circuito Mario de la Cueva sin número,<br> Zona Cultural, Ciudad Universitaria,<br> México, D.F. C.P. 04510</p>
              </div>

              <div class="red-inst">
                <li class="list-inline"><i class="fa fa-envelope"></i></li>
                <p>info@example.com</p>
              </div>

              <div class="red-inst">
                <li class="list-inline"><i class="fa fa-phone"></i></li>
                <p>55 5622 1888</p>
              </div>
            </div>
    	</div>
		<div class="col-md 8 col-lg-8">
          <h3>Registro</h3>
		<form name ="formularioUsuario" method="POST" action="registro.php" onsubmit="return comprobarDatosFormulario()">
		<label for="nombre" class="label_formulario">Nombre</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <i class="fa fa-user input-group-text"></i>
              </div>
                <input type="text" class="form-control <?= (isset($errores['nombre'])) ? 'is-invalid' : '' ?>" name="nombre" id="nombre" placeholder="Nombre">
            </div>
                <div class="invalid-feedback"><span>
                    <?php
                     if(isset($errores['nombre']) && !empty($errores['nombre'])){
                         foreach($errores['nombre'] as $tipo => $mensaje) {
                        echo $mensaje;
                       }
                     }
                     ?>
                     </span>  
                </div>
				<h3 id='result2'></h3>
				<label for="email" class="label_formulario">Correo</label> 
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <i class="fa fa-envelope input-group-text"></i>
              </div>
                <input type="email" class="form-control <?= (isset($errores['email'])) ? 'is-invalid' : '' ?>" name="email" id="email" placeholder="Tu dirección de correo electrónico" >
            </div>
            <div class="invalid-feedback">
              
                    <span>
                    <?php
                     if(isset($errores['email']) && !empty($errores['email'])){
                         foreach($errores['email'] as $tipo => $mensaje) {
                        echo $mensaje;
                       }
                     }
                     ?>
                     </span>  
                    </div>
                    <label for="password" class="label_formulario">Contraseña</label> 
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <i class="fa fa-asterisk input-group-text"></i>
              </div>
                <input type="password" class="form-control <?= (isset($errores['password'])) ? 'is-invalid' : '' ?>" name="password" id="password" placeholder="Tu contraseña">
            </div>
            <div class="invalid-feedback">
              
                    <span>
                    <?php
                     if(isset($errores['password']) && !empty($errores['password'])){
                         foreach($errores['password'] as $tipo => $mensaje) {
                        echo $mensaje;
                       }
                     }
                     ?>
                     </span>  
                    </div>  
                    <div class="input-group mb-3">
              <div class="input-group-prepend">
                <i class="fa fa-asterisk input-group-text"></i>
              </div>
                <input type="password" class="form-control <?= (isset($errores['password_confirm'])) ? 'is-invalid' : '' ?>" name="password_confirm" id="password_confirm" placeholder="Confirma contraseña">
            </div>
            <div class="invalid-feedback">
              		<span>
                    <?php
                     if(isset($errores['password_confirm']) && !empty($errores['password_confirm'])){
                         foreach($errores['password_confirm'] as $tipo => $mensaje) {
                        echo $mensaje;
                       }
                     }
                    ?>
                    </span>  
            </div>      
            <div class="text-center mb-5"><button class="btn btn-primary" id ="botonEnvio1" type="submit" name="enviar" value="enviar">Enviar datos</div>
			<!-- <label><input id ="botonEnvio1" type="submit" value="Enviar"></label> -->
			</div>
		</form>
		</div>
	</div>
</div>
<?php 
        require_once ("include/footer.php");