<?php
 include_once("include/header.php");
 include_once("include/dbConexion.php");
 $dbc = conexion();

 ///////comienza busqueda por parametro
 // echo "<script> alert('recientes'); </script>";
   $sql = 'SELECT `evento`.*, `lugar_evento`.*, `tipo_apoyo_evento`.`tipo_apoyo_siglas`, `tipo_evento`.`tipo_evento_nombre`
   FROM `evento` 
     INNER JOIN `lugar_evento` ON `evento`.`id_lugar_evento` = `lugar_evento`.`id_lugar_evento` 
     INNER JOIN `tipo_apoyo_evento` ON `evento`.`id_tipo_apoyo` = `tipo_apoyo_evento`.`id_tipo_apoyo`
     INNER JOIN `tipo_evento` ON `evento`.`id_tevento` = `tipo_evento`.`id_tevento` ORDER BY `evento_fecha_inicio` DESC
   ';
   $eventos = getDatos($sql);
 /////////////////////////////////////

 if (isset($_POST['valor'])!= null) { 
 echo "<script> alert('entrando'); </script>";
 $valor = $_POST['valor'];
 $valor= "%".$valor."%";
 $datemin = $_POST['datemin'];
 $datemax = $_POST['datemax'];
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
        if ($valor != null && $valor != "%%") { // if busquedas
         // echo "<script> alert('busqueda por like ".$valor."'); </script>";
        $query = "SELECT `evento`.*, `lugar_evento`.*, `tipo_apoyo_evento`.`tipo_apoyo_siglas`, `tipo_evento`.`tipo_evento_nombre`
                  FROM `evento` 
                    INNER JOIN `lugar_evento` ON `evento`.`id_lugar_evento` = `lugar_evento`.`id_lugar_evento` 
                    INNER JOIN `tipo_apoyo_evento` ON `evento`.`id_tipo_apoyo` = `tipo_apoyo_evento`.`id_tipo_apoyo`
                    INNER JOIN `tipo_evento` ON `evento`.`id_tevento` = `tipo_evento`.`id_tevento`
                    WHERE evento_nombre LIKE '$valor'
                  ORDER BY evento_nombre";

                  $result = mysqli_query ($dbc, $query);

                      if ($result) { 
                      
                      //Si no son muchos registros pueden obtenerse todos los registros en un solo paso:
                      $eventos = mysqli_fetch_all($result, MYSQLI_ASSOC);    
                      }//if  result

                    }else if($datemin != null && $datemax != null){
                          //  echo "<script> alert('fechas'); </script>";

          $query = "SELECT `evento`.*, `lugar_evento`.*, `tipo_apoyo_evento`.`tipo_apoyo_siglas`, `tipo_evento`.`tipo_evento_nombre` FROM `evento` INNER JOIN `lugar_evento` ON `evento`.`id_lugar_evento` = `lugar_evento`.`id_lugar_evento` INNER JOIN `tipo_apoyo_evento` ON `evento`.`id_tipo_apoyo` = `tipo_apoyo_evento`.`id_tipo_apoyo` INNER JOIN `tipo_evento` ON `evento`.`id_tevento` = `tipo_evento`.`id_tevento` WHERE evento_fecha_inicio BETWEEN '$datemin' AND '$datemax' ORDER BY evento_fecha_inicio";

                  $result = mysqli_query ($dbc, $query);

                      if ($result) { 
                      //Si no son muchos registros pueden obtenerse todos los registros en un solo paso:
                      $eventos = mysqli_fetch_all($result, MYSQLI_ASSOC);    
                      }//if result

                      }

}

?>

<!-- Comienza la vista -->
<div class="container">
<form class="row g-3 pt-5" action="eventos.php" method="POST">
  <div class="col-md-6">
      <label for="datemin">Busqueda por rango: De fecha</label>
      <input type="date" id="datemin" name="datemin" min="<?= date("d") . " del " . date("m") . " de " . date("Y");?>">
  </div>
  <div class="col-md-6">
      <label for="datemax">a fecha</label>
      <input type="date" id="datemax" name="datemax" max="<?= date("d") . " del " . date("m") . " de " . date("Y");?>">
  </div>
  <div class="col-md-2">
    <label for="datemin">Busqueda por nombre:</label>   
  </div>
  <div class="col-md-4">
  <input class="form-control mr-sm-2" type="buscar" name="valor" maxlength="50" aria-label="Buscar">
</div>
  <div class="col-md-6">
      <button class="btn btn-outline-success" type="submit" value="1" name="enviar">Buscar Evento</button>
  </div>
</form> 
</div>
<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
  
  </div>
<br>

<div class="row">
<?php
 foreach ($eventos as $evento) {
  $id = $evento['id_evento'];  
?>

 <div class="card border-light mt-4">
        <div class="row no-gutters">
          <div class="col-md-4">
           <img src="<?=$evento['evento_imagen']?>" alt="<?=$evento['evento_imagen']?>"></br>
           <p class="mt-2"><a href="<?= $evento['evento_programa'] ?>" target="_blank">Programa en pfd</a></p>
         </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title resaltado"><?= $evento['tipo_evento_nombre'] ?>: <?= $evento['evento_nombre'] ?></h5>
            <div class="card-text"><?= $evento['evento_descripcion'] ?>
               
                  <?php 
                  $sql = "SELECT `evento_academico`.*, `participante`.*, `rol`.*
                          FROM `evento_academico` 
                          LEFT JOIN `participante` ON `evento_academico`.`id_participante` = `participante`.`id_participante` 
                          LEFT JOIN `rol` ON `evento_academico`.`id_rol` = `rol`.`id_rol` WHERE `evento_academico`.`id_evento` ='$id'";

                          $participantes = getDatos($sql);

                  foreach ($participantes as $participante) {

                  ?>
                    <p class="mb-0"><b><?= $participante ['rol_nombre'] ?>:</b> <?= $participante['participante_nombre'].' '.$participante ['participante_apellidop'].' '.$participante ['participante_apellidom'].','.' '.$participante ['participante_cargo_inst']?></p> 
                    <!-- <p class="m-0"><?= $participante ['participante_email'] ?></p> -->
                    
                 <?php } ?>
                 <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">Fecha inicio</th>
                          <th scope="col">Hora de inicio:</th>
                          <th scope="col">Fecha termino</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><?php echo "<script>transformarFecha('".$evento['evento_fecha_inicio']."'); </script>"; ?></th>
                        <td><?= $evento['evento_hora'] ?></td>
                        <td><?php echo "<script>transformarFecha('".$evento['evento_fecha_fin']."'); </script>"; ?></td>
                      </tr>
                    </tbody>
                  </table>
                 <!-- <p class="card-text m-0"><b> Fecha inicio:</b> <?php echo "<script>transformarFecha('".$evento['evento_fecha_inicio']."'); </script>"; ?>  <p><b>Hora:</b> <?= $evento['evento_hora'] ?></p> <b>Fecha termino:</b> <?php echo "<script>transformarFecha('".$evento['evento_fecha_fin']."'); </script>"; ?></p>
                 <p><b>Lugar: </b><?= $evento['lugar_evento_sala'] ?>, <?= $evento['lugar_evento_piso'] ?> <?= $evento['lugar_evento_ubicacion'] ?> <?= $evento['lugar_evento_direccion'] ?></p> -->
               <p class="card-text m-0">Transmision: <?= $evento['evento_transmision'] ?></p>
               <p class="card-text m-0"><?= $evento['evento_transmision2'] ?></p>
               <p class="card-text m-0"><?= $evento['evento_transmision3'] ?></p>
               <?php if ( $evento['evento_registro'] == NULL ): ?>
                <?php else: ?><p class="card-text m-0"><b>Registro:</b> <?= $evento['evento_registro'] ?></p>
                <?php endif; ?>

               <p class="card-text m-0"><b>Informes:</b> <?= $evento['evento_informes'] ?></br><?= $evento['evento_informes2'] ?></p>
               <p class="m-0">Modalidad: <?= $evento['evento_modalidad'] ?></p>
               <?php if ( $evento['tipo_apoyo_siglas'] == 'Ninguno' ): ?>
               <p></p>
               <?php else: ?>
               <p class="mb-0">Apoyo: <?= $evento['tipo_apoyo_siglas'] ?></p>
               <?php endif; ?>
                 <?php
                  $sql = "SELECT `institucion_organizadora_evento`.*, `institucion_organizadora`.*
                          FROM `institucion_organizadora_evento` 
                          LEFT JOIN `institucion_organizadora` ON `institucion_organizadora_evento`.`id_inst_org` = `institucion_organizadora`.`id_inst_org` WHERE `institucion_organizadora_evento`.`id_evento` = '$id'";

                          $instituciones = getDatos($sql);
                  ?>

                        <p class="mb-0"><b>Organizadores:</b>
                   <?php foreach ($instituciones as $institucion) { ?>
                    
                    
                     <?= $institucion ['inst_org_nombre'].'('.$institucion['inst_org_siglas'].')'.'.' ?></p>
                    
                 <?php } ?>
            <!-- <a href="#" class="text-primary">Ver más</a> -->
          </div>
          </div>
        </div>
      </div>
  </div>
<?php  } ?>
    </div>
</div>
<?php
include ("include/footer.php");
?>
