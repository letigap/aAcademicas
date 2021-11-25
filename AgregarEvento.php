<?php
//Inicio la session
     session_start();

     //COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
      if (!$_SESSION['email']) {
              //si no existe, envío a la página de autentificación
              header("Location: login.php");
              exit();
      }
require_once("include/header.php");
include_once("include/dbConexion.php");
include_once("include/validar_evento.php");


#Consulta para el tipo de evento
$sql="SELECT * FROM tipo_evento";
$tipos = getDatos($sql);

#consulta para el tipo de apoyo
$sql="SELECT * FROM tipo_apoyo_evento";
$apoyos = getDatos($sql);

#consulta para obtener el lugar de evento
$sql = "select distinct l.lugar_evento_ubicacion from lugar_evento l order by lugar_evento_ubicacion";
$instituciones = getDatos($sql);

#consulta para las salas
$sql="SELECT id_lugar_evento, lugar_evento_sala, lugar_evento_piso FROM lugar_evento ORDER BY lugar_evento_ubicacion";
$salas = getDatos($sql);

#consulta para obtener las instituciones organizadoras
$sql2="select * FROM institucion_organizadora";
$organizadoras = getDatos($sql2);

#consulta para participante y rol
$sql="SELECT id_participante, CONCAT(participante_nombre, ' ', participante_apellidop, ' ', participante_apellidom) AS nombre, participante_cargo_inst, rol.*
FROM participante 
LEFT JOIN rol ON participante.id_rol = rol.id_rol";

$participantes = getDatos($sql);

?>


<!--Vista del formulario-->
<body>
    <h2 class="p-2 text-center">Registro nuevo evento</h2>
    <main class="container">
    <form class="form-evento" id="myform" action="AgregarEvento.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-10">
                <label for="id_tevento">Tipo de evento</label>
                <select name="id_tevento" id="id_tevento" class="form-control <?= (isset($errores['id_tevento'])) ? 'is-invalid' : '' ?>">
                        <option value="">-- N/A --</option>
                        <?php foreach($tipos as $tipo) {
                            echo "<option value='{$tipo['id_tevento']}'>{$tipo['tipo_evento_nombre']}</option>";
                        } ?>
                    </select>
                    <div class="invalid-feedback">
                        <span>
                        <?php
                        if(isset($errores['id_tevento']) && !empty($errores['id_tevento'])){
                            foreach($errores['id_tevento'] as $tipo => $mensaje) {
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
                    <label for="evento_nombre">Nombre del evento</label>
                    <input type="text" class="form-control <?= (isset($errores['evento_nombre'])) ? 'is-invalid' : '' ?>" name="evento_nombre" id="evento_nombre"  placeholder="Nombre de evento" value="<?php echo $evento_nombre; ?>"> 
                    <div class="invalid-feedback">
                        <span>
                        <?php
                        if(isset($errores['evento_nombre']) && !empty($errores['evento_nombre'])){
                            foreach($errores['evento_nombre'] as $tipo => $mensaje) {
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
                    <label for="evento_descripcion">Descripción del evento</label>
                    <textarea type="text" class="form-control <?= (isset($errores['evento_descripcion'])) ? 'is-invalid' : '' ?>" name="evento_descripcion" id="evento_descripcion" value="Descripción de evento"></textarea>
                    <div class="invalid-feedback">
                        <span>
                        <?php
                        if(isset($errores['evento_descripcion']) && !empty($errores['evento_descripcion'])){
                            foreach($errores['evento_descripcion'] as $tipo => $mensaje) {
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
                <label for="evento_informes">Informes</label>
                    <input type="text" class="form-control <?= (isset($errores['evento_informes'])) ? 'is-invalid' : '' ?>" name="evento_informes" id="evento_informes" placeholder="Dirección de informes de evento" value="<?php echo $evento_informes; ?>">
                    <div class="invalid-feedback"><span>
                    <?php
                     if(isset($errores['evento_informes']) && !empty($errores['evento_informes'])){
                         foreach($errores['evento_informes'] as $tipo => $mensaje) {
                        echo $mensaje;
                       }
                     }
                     ?>
                     </span>
                    </div>
                </div>
            </div>
            <input type="checkbox" id="opcinal"> <label for="opcinal">Agregar otro Email</label>
            <!-- Segundo Email opcional -->
            <div class="form-row" id="email2">
                <div class="form-group col-md-10">
                <label for="evento_informes2">Informes2</label>
                    <input type="text" class="form-control <?= (isset($errores['evento_informes2'])) ? 'is-invalid' : '' ?>" name="evento_informes2" id="evento_informes2" placeholder="Dirección de informes de evento" value="<?php echo $evento_informes2; ?>">
                    <div class="invalid-feedback"><span>
                    <?php
                     if(isset($errores['evento_informes2']) && !empty($errores['evento_informes2'])){
                         foreach($errores['evento_informes2'] as $tipo => $mensaje) {
                        echo $mensaje;
                       }
                     }
                     ?>
                     </span>
                    </div>   
                </div>
            </div>
            <!--  -->
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="evento_modalidad">Modalidad del evento</label>
                    <div class="form-check">
                        <input type="checkbox"  name="evento_modalidad[]" class="form-check-input" value="Presencial">
                        <label class="form-check-label" for="exampleCheck1">Presencial</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="evento_modalidad[]" class="form-check-input" value="Virtual">
                        <label class="form-check-label" for="exampleCheck1">Virtual</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="evento_modalidad[]" class="form-check-input" value="Semipresencial">
                        <label class="form-check-label" for="exampleCheck1">Semipresencial</label>
                    </div>
                   
                    <div class="invalid-feedback"><?php
                     if(isset($errores['evento_modalidad']) && !empty($errores['evento_modalidad'])){
                         foreach($errores['evento_modalidad'] as $tipo => $mensaje) {
                        echo $mensaje;
                       }
                     }
                     ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10">
                <label for="id_tipo_apoyo">Tipo de apoyo del evento </label>
                    <select name="id_tipo_apoyo" id="id_tipo_apoyo" class="form-control <?= (isset($errores['id_tipo_apoyo'])) ? 'is-invalid' : '' ?>">
                        <option value="">-- N/A --</option>
                        <?php foreach($apoyos as $apoyo) {
                            echo "<option value='{$apoyo['id_tipo_apoyo']}'>{$apoyo['tipo_apoyo_siglas']}</option>";
                        } ?>
                    </select>
                    <div class="invalid-feedback"><span>
                        <?php
                        if(isset($errores['id_tipo_apoyo']) && !empty($errores['id_tipo_apoyo'])){
                            foreach($errores['id_tipo_apoyo'] as $tipo => $mensaje) {
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
                    <label for="evento_transmision">Transmisión</label>
                    <input type="text" class="form-control <?= (isset($errores['evento_transmision'])) ? 'is-invalid' : '' ?>" name="evento_transmision" id="evento_transmision" placeholder="La forma de transmision de evento" value="<?php echo $evento_transmision; ?>">
                    <div class="invalid-feedback"><span>
                        <?php
                        if(isset($errores['evento_transmision']) && !empty($errores['evento_transmision'])){
                            foreach($errores['evento_transmision'] as $tipo => $mensaje) {
                            echo $mensaje;
                        }
                        }
                        ?>
                        </span>
                    </div>
                </div>
            </div>
            <input type="checkbox" id="opcion2"> <label for="opcion2">Segunda forma de transmisión</label>
            <!-- Segunda forma de transmisión opcional -->
            <div class="form-row" id="transmision2">
                <div class="form-group col-md-10">
                <label for="evento_transmision2">Transmisión 2</label>
                <input type="text" class="form-control <?= (isset($errores['evento_transmision2'])) ? 'is-invalid' : '' ?>" name="evento_transmision2" id="evento_transmision2" placeholder="Segunda forma de transmisión de evento" value="<?php echo $evento_transmision2; ?>">
                <div class="invalid-feedback"><span>
                        <?php
                        if(isset($errores['evento_transmision2']) && !empty($errores['evento_transmision2'])){
                            foreach($errores['evento_transmision2'] as $tipo => $mensaje) {
                            echo $mensaje;
                        }
                        }
                        ?>
                        </span>
                    </div>    
                </div>
            </div>
            <input type="checkbox" id="opcion3"> <label for="opcion">Tercera forma de transmisión</label>
            <!-- Segunda forma de transmisión opcional -->
            <div class="form-row" id="transmision3">
                <div class="form-group col-md-10">
                <label for="evento_transmision3">Transmisión3</label>
                <input type="text" class="form-control <?= (isset($errores['evento_transmision3'])) ? 'is-invalid' : '' ?>" name="evento_transmision3" id="evento_transmision3" placeholder="Tercera forma de transmisión de evento" value="<?php echo $evento_transmision3; ?>">
                <div class="invalid-feedback"><span>
                        <?php
                        if(isset($errores['evento_transmision3']) && !empty($errores['evento_transmision3'])){
                            foreach($errores['evento_transmision3'] as $tipo => $mensaje) {
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
                    <label for="evento_registro">Dirección url de registro</label>
                    <input type="url" class="form-control <?= (isset($errores['evento_registro'])) ? 'is-invalid' : '' ?>" name="evento_registro" id="evento_registro" placeholder="La dirección url de registro de evento" value="<?php echo $evento_registro; ?>">
                    <div class="invalid-feedback"><span>
                        <?php
                        if(isset($errores['evento_registro']) && !empty($errores['evento_registro'])){
                            foreach($errores['evento_registro'] as $tipo => $mensaje) {
                            echo $mensaje;
                        }
                        }
                        ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="evento_fecha_inicio">Fecha de inicio de evento </label>
                    <input type="date" class="form-control <?= (isset($errores['evento_fecha_inicio'])) ? 'is-invalid' : '' ?>" name="evento_fecha_inicio" id="evento_fecha_inicio" placeholder="La fecha de inicio de realización del evento" value="<?php echo $evento_fecha_inicio; ?>">
                    <div class="invalid-feedback"><span>
                        <?php
                        if(isset($errores['evento_fecha_inicio']) && !empty($errores['evento_fecha_inicio'])){
                            foreach($errores['evento_fecha_inicio'] as $tipo => $mensaje) {
                            echo $mensaje;
                        }
                        }
                        ?>
                        </span>  
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="evento_hora">Hora de inicio de evento </label>
                    <input type="time" class="form-control <?= (isset($errores['evento_hora'])) ? 'is-invalid' : '' ?>" name="evento_hora" id="evento_hora" placeholder="La hora de inicio del evento" value="<?php echo $evento_hora; ?>">
                    <div class="invalid-feedback"><span>
                        <?php
                        if(isset($errores['evento_hora']) && !empty($errores['evento_hora'])){
                            foreach($errores['evento_hora'] as $tipo => $mensaje) {
                            echo $mensaje;
                        }
                        }
                        ?>
                        </span>  
                    </div>
                </div>
            
                <div class="form-group col-md-4">
                    <label for="evento_fecha_fin">Fecha de termino de evento </label>
                    <input type="date" class="form-control <?= (isset($errores['evento_fecha_fin'])) ? 'is-invalid' : '' ?>" name="evento_fecha_fin" id="evento_fecha_fin" placeholder="La fecha de termino del evento" value="<?php echo $evento_fecha_fin; ?>">
                    <div class="invalid-feedback"><span>
                        <?php
                        if(isset($errores['evento_fecha_fin']) && !empty($errores['evento_fecha_fin'])){
                            foreach($errores['evento_fecha_fin'] as $tipo => $mensaje) {
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
                    <label for="lugar_evento_ubicacion">Lugar de realización</label>
                    <select name="lugar_evento_ubicacion" id="lugar_evento_ubicacion" class="form-control <?= (isset($errores['lugar_evento_ubicacion'])) ? 'is-invalid' : '' ?>">
                        <option value="">-- Todas --</option>
                        <?php foreach($instituciones as $institucion){
                             echo "<option value='{$institucion['lugar_evento_ubicacion']}'>{$institucion['lugar_evento_ubicacion']}</option>";
                        } ?>
                    </select>
                    <div class="invalid-feedback">
                        <?php
                        if(isset($errores['lugar_evento_ubicacion']) && !empty($errores['lugar_evento_ubicacion'])){
                            foreach($errores['lugar_evento_ubicacion'] as $tipo => $mensaje) {
                            echo $mensaje;
                        }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10">
                <label for="id_lugar_evento"><i id="id_lugar_eventoLoading" class="fas fa-spinner fa-spin d-none">&nbsp;</i>Sala del evento</label>
                    <select name="id_lugar_evento" id="id_lugar_evento" class="form-control <?= (isset($errores['id_lugar_evento'])) ? 'is-invalid' : '' ?>">
                        <option value="">-- Selecciona una opci&oacute;n --</option>
                        <?php foreach($salas as $sala){ ?>
                            <option value="<?= $sala['id_lugar_evento']?>"><?= $sala['lugar_evento_sala'] . ' (' . $sala['lugar_evento_piso'] . ')';?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback">
                        <?php
                        if(isset($errores['id_lugar_evento']) && !empty($errores['id_lugar_evento'])){
                            foreach($errores['id_lugar_evento'] as $tipo => $mensaje) {
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
                    <label for="evento_imagen">Cartel del evento</label>
                    <input type="file" class="form-control <?= (isset($errores['evento_imagen'])) ? 'is-invalid' : '' ?>" id="evento_imagen" name="evento_imagen" placeholder="Agregar cartel del evento">
                    <div class="invalid-feedback"><span>
                        <?php
                        if(isset($errores['evento_imagen']) && !empty($errores['evento_imagen'])){
                            foreach($errores['evento_imagen'] as $tipo => $mensaje) {
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
                    <label for="evento_programa">Programa del evento</label>
                    <input type="file" class="form-control <?= (isset($errores['evento_programa'])) ? 'is-invalid' : '' ?>" name="evento_programa" id="evento_programa" value="<?php echo $evento_programa; ?>">
                    <div class="invalid-feedback"><?php
                     if(isset($errores['evento_programa']) && !empty($errores['evento_programa'])){
                         foreach($errores['evento_programa'] as $tipo => $mensaje) {
                        echo $mensaje;
                       }
                     }
                     ?>
                    </div>
                </div><!--div class-->
            </div>
            <!--aqui inicia la insersion de datos de organizadores y participantes-->
                    
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="id_inst_org">Organizadores del evento</label>
                    <select name="id_inst_org[]" multiple id="id_inst_org" class="form-control <?= (isset($errores['id_inst_org'])) ? 'is-invalid' : '' ?>">
                        <option value="">-- Selecciona una o más --</option>
                        <?php foreach($organizadoras as $organizador){
                             echo "<option value='{$organizador['id_inst_org']}'>{$organizador['inst_org_nombre']}  ({$organizador['inst_org_siglas']})</option>";
                        } ?>
                    </select>
                    <div class="invalid-feedback">
                    <?php
                     if(isset($errores['id_inst_org']) && !empty($errores['id_inst_org'])){
                         foreach($errores['id_inst_org'] as $tipo => $mensaje) {
                        echo $mensaje;
                       }
                     }
                     ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-10">
                    <label for="id_participante">Participantes</label>
                        <select  name="langOpt[]" multiple id="langOpt" class="form-control <?= (isset($errores['id_participante'])) ? 'is-invalid' : '' ?>">
                        <option value="">-- Elige Opciones --</option>
                        <?php foreach($participantes as $participante){
                             echo "<option value='{$participante['id_participante']},{$participante['id_rol']}'>{$participante['rol_nombre']}: {$participante['nombre']} / {$participante['participante_cargo_inst']}</option>";
                        } ?>
                    </select>
                    <div class="invalid-feedback">
                    <?php
                     if(isset($errores['langOpt']) && !empty($errores['langOpt'])){
                         foreach($errores['langOpt'] as $tipo => $mensaje) {
                        echo $mensaje;
                       }
                     }
                     ?>
                    </div>
            </div>
            </div>
            <div class="mb-4">
            <button name="agregar" value="agregar" type="submit" class="btn btn-primary">Guardar</button>
            <input type="reset"  class="btn btn-secondary" value="Borrar información">
            <a href="cerrar.php" class="btn btn-primary">Salir</a>
            </div>
    </form>
</main>

<script type="text/javascript">
           document.getElementById('email2').style.display = 'none'; //.style.visibility = "hidden";
           document.querySelector('#evento_nombre').value=sessionStorage.getItem('evento_nombre'); 
           document.querySelector('#id_tevento').value=sessionStorage.getItem('id_tevento'); 
           document.querySelector('#evento_fecha_inicio').value=sessionStorage.getItem('evento_fecha_inicio'); 
           document.querySelector('#evento_fecha_fin').value=sessionStorage.getItem('evento_fecha_fin'); 
           document.querySelector('#evento_hora').value=sessionStorage.getItem('evento_hora'); 
           document.querySelector('#evento_descripcion').value=sessionStorage.getItem('evento_descripcion'); 
           document.querySelector('#evento_informes').value=sessionStorage.getItem('evento_informes'); 
           document.querySelector('#evento_informes2').value=sessionStorage.getItem('evento_informes2'); 
           document.querySelector('#evento_transmision').value=sessionStorage.getItem('evento_transmision'); 
           document.querySelector('#evento_transmision2').value=sessionStorage.getItem('evento_transmision2');
           document.querySelector('#evento_transmision3').value=sessionStorage.getItem('evento_transmision3');
           document.querySelector('#evento_registro').value=sessionStorage.getItem('evento_registro'); 
        //    document.querySelector('#evento_modalidad').value=sessionStorage.getItem('evento_modalidad'); 
           document.querySelector('#id_tipo_apoyo').value=sessionStorage.getItem('id_tipo_apoyo'); 
           document.querySelector('#id_lugar_evento').value=sessionStorage.getItem('id_lugar_evento'); 
           document.querySelector('#lugar_evento_ubicacion').value=sessionStorage.getItem('lugar_evento_ubicacion'); 

            var checkbox = document.getElementById('opcinal');
            var checkbox2 = document.getElementById('opcion2');
            var checkbox3 = document.getElementById('opcion3');

            checkbox.addEventListener("change", comprueba, false);
            checkbox2.addEventListener("change", comprueba, false);
            checkbox3.addEventListener("change", comprueba, false);

            function comprueba(){
              if(checkbox.checked){
                document.getElementById('email2').style.display = '';
              }else{
                document.getElementById('email2').style.display = 'none';
              }

              if(checkbox2.checked){
                document.getElementById('transmision2').style.display = '';
              }else{
                document.getElementById('transmision2').style.display = 'none';
              }

              if(checkbox3.checked && checkbox2.checked){
                document.getElementById('transmision3').style.display = '';
              }else{
                document.getElementById('transmision3').style.display = 'none';
              }
            }
</script>

<?php
require_once ("include/footer.php");