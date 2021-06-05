<?php
 include_once("include/header.php");
 include_once("include/dbConexion.php");

 ///////comienza busqueda por parametro

 if (isset($_POST['valor'])!= null) { 

 $valor = $_POST['valor'];
 $valor= "%".$valor."%";
        // echo "<script> alert('".$valor."'); </script>";
$dbc = conexion();

$query = "SELECT `evento`.*, `lugar_evento`.*, `tipo_apoyo_evento`.`tipo_apoyo_siglas`, `tipo_evento`.`tipo_evento_nombre`
FROM `evento` 
  INNER JOIN `lugar_evento` ON `evento`.`id_lugar_evento` = `lugar_evento`.`id_lugar_evento` 
  INNER JOIN `tipo_apoyo_evento` ON `evento`.`id_tipo_apoyo` = `tipo_apoyo_evento`.`id_tipo_apoyo`
  INNER JOIN `tipo_evento` ON `evento`.`id_tevento` = `tipo_evento`.`id_tevento`
  WHERE evento_fecha LIKE '$valor' or evento_nombre LIKE '$valor'
ORDER BY evento_nombre";

$result = mysqli_query ($dbc, $query);

    if ($result) { 
    
    //Si no son muchos registros pueden obtenerse todos los registros en un solo paso:
    $eventos = mysqli_fetch_all($result, MYSQLI_ASSOC);    
    }
}else{

///hasta aqui inserte

 $sql = 'SELECT `evento`.*, `lugar_evento`.*, `tipo_apoyo_evento`.`tipo_apoyo_siglas`, `tipo_evento`.`tipo_evento_nombre`
 FROM `evento` 
   INNER JOIN `lugar_evento` ON `evento`.`id_lugar_evento` = `lugar_evento`.`id_lugar_evento` 
   INNER JOIN `tipo_apoyo_evento` ON `evento`.`id_tipo_apoyo` = `tipo_apoyo_evento`.`id_tipo_apoyo`
   INNER JOIN `tipo_evento` ON `evento`.`id_tevento` = `tipo_evento`.`id_tevento`
 ';
 $eventos = getDatos($sql);

}
?>

<!-- Comienza la vista -->
<div class="container mt-4">
  <div class="row justify-content-center">
  <form class="form-inline my-2 my-lg-0" action="eventos.php" method="POST">
      <input class="form-control mr-sm-2" type="search" name="valor" size="30" maxlength="500" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="1" name="enviar">Buscar Evento</button>
    </form>
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
           <p class="mt-2"><a href="<?= $evento['evento_programa'] ?>">Programa en pfd</a></p>
         </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title resaltado"><?= $evento['tipo_evento_nombre'] ?>: <?= $evento['evento_nombre'] ?></h5>
            <div class="card-text"><?= $evento['evento_descripcion'] ?>
               <p class="card-text m-0"> Fecha: <?= $evento['evento_fecha'] ?></p>
               <p class="card-text m-0">Transmision: <?= $evento['evento_transmision'] ?></p>
               <p class="card-text m-0"><b>Informes:</b> <?= $evento['evento_informes'] ?></p>
               <p class="m-0">Modalidad: <?= $evento['evento_modalidad'] ?></p>
               <p class="mb-0">Apoyo: <?= $evento['tipo_apoyo_siglas'] ?></p>
              <p><b>Lugar: </b><?= $evento['lugar_evento_sala'] ?>, <?= $evento['lugar_evento_piso'] ?> <?= $evento['lugar_evento_ubicacion'] ?> <?= $evento['lugar_evento_direccion'] ?></p>
           <!--  </div> -->

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
