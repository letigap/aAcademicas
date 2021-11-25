<?php
    //Inicio la session
    session_start();

    // //COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
     if (!$_SESSION['email']) {
             //si no existe, envío a la página de autentificación
             header("Location: login.php");
             exit();
     }
require_once("include/header.php");
include_once("include/dbConexion.php");
include_once("include/validar_participante.php");

#consulta para roles
$sql="select * FROM rol";
$roles = getDatos($sql);
?>
<!--Vista del formulario-->
<body>
    <h2 class="p-2 text-center">Registro nuevo participante</h2>
<main class="container">
<form class="form-evento" id="form_participante" action="AgregarParticipante.php" method="POST">
<div class="form-row">
<div class="form-group col-md-10">
    <label for="id_rol">Rol de participante</label>
    <select name="id_rol" id="id_rol" class="form-control <?= (isset($errores['id_rol'])) ? 'is-invalid' : '' ?>">
        <option value="">-- N/A --</option>
        <?php foreach($roles as $rol) {
            echo "<option value='{$rol['id_rol']}'>{$rol['rol_nombre']}</option>";
        } ?>
    </select>
    <div class="invalid-feedback"><span>
        <?php
        if(isset($errores['id_rol']) && !empty($errores['id_rol'])){
         foreach($errores['id_rol'] as $tipo => $mensaje) {
         echo $mensaje;
            }
         }
        ?>
      </span>
 	</div>
</div>
</div>            
<div class="form-row">
<div class="form-group col-md-10">
    <label for="participante_nombre">Nombre de Participante</label>
    <input type="text" class="form-control <?= (isset($errores['participante_nombre'])) ? 'is-invalid' : '' ?>" name="participante_nombre" id="participante_nombre" placeholder="Nombre del participante">
        <div class="invalid-feedback">
        <span>
         <?php
          if(isset($errores['participante_nombre']) && !empty($errores['participante_nombre'])){
            foreach($errores['participante_nombre'] as $tipo => $mensaje) {
            echo $mensaje;
            	}
            }
        ?>
        </span>  
        </div>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-10">
    <label for="participante_apellidop">Apellido Paterno Participante</label>
    <input type="text" class="form-control <?= (isset($errores['participante_apellidop'])) ? 'is-invalid' : '' ?>" name="participante_apellidop" id="participante_apellidop" placeholder="Apellido Paterno">
        <div class="invalid-feedback"><span>
        <?php
            if(isset($errores['participante_apellidop']) && !empty($errores['participante_apellidop'])){
              foreach($errores['participante_apellidop'] as $tipo => $mensaje) {
               echo $mensaje;
                   }
                 }
               ?>
         </span>  
         </div>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-10">
    <label for="participante_apellidom">Apellido Materno Participante</label>
    <input type="text" class="form-control <?= (isset($errores['participante_apellidom'])) ? 'is-invalid' : '' ?>" name="participante_apellidom" id="participante_apellidom" placeholder="Apellido Materno">
        <div class="invalid-feedback"><span>
        <?php
            if(isset($errores['participante_apellidom']) && !empty($errores['participante_apellidom'])){
              foreach($errores['participante_apellidom'] as $tipo => $mensaje) {
               echo $mensaje;
                   }
                 }
               ?>
         </span>  
         </div>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-10">
    <label for="participante_email">Dirección de correo electrónico del participante</label>
    <input type="text" class="form-control <?= (isset($errores['participante_email'])) ? 'is-invalid' : '' ?>" name="participante_email" id="participante_email" placeholder="Email">
        <div class="invalid-feedback"><span>
        <?php
            if(isset($errores['participante_email']) && !empty($errores['participante_email'])){
              foreach($errores['participante_email'] as $tipo => $mensaje) {
               echo $mensaje;
                   }
                 }
               ?>
         </span>  
         </div>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-10 pb-3">
    <label for="participante_cargo_inst">Cargo Institucional Participante</label>
    <input type="text" class="form-control <?= (isset($errores['participante_cargo_inst'])) ? 'is-invalid' : '' ?>" name="participante_cargo_inst" id="participante_cargo_inst" placeholder="Cargo Institucional">
        <div class="invalid-feedback"><span>
        <?php
            if(isset($errores['participante_cargo_inst']) && !empty($errores['participante_cargo_inst'])){
              foreach($errores['participante_cargo_inst'] as $tipo => $mensaje) {
               echo $mensaje;
                   }
                 }
               ?>
         </span>  
         </div>
</div>
</div>
<div class="mb-4">
<button name="agregar" value="agregar" type="submit" class="btn btn-primary">Guardar</button>
<input type="reset"  class="btn btn-secondary" value="Limpiar datos">
<a href="cerrar.php" class="btn btn-primary">Salir</a>
</div>
</form>
</main>
<script type="text/javascript"> 
           document.querySelector('#id_rol').value=sessionStorage.getItem('id_rol'); 
           document.querySelector('#participante_nombre').value=sessionStorage.getItem('participante_nombre'); 
           document.querySelector('#participante_apellidop').value=sessionStorage.getItem('participante_apellidop'); 
           document.querySelector('#participante_apellidom').value=sessionStorage.getItem('participante_apellidom'); 
           document.querySelector('#participante_email').value=sessionStorage.getItem('participante_email'); 
           document.querySelector('#participante_cargo_inst').value=sessionStorage.getItem('participante_cargo_inst'); 
</script>

<?php
require_once ("include/footer.php");