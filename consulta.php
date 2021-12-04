<?php
include_once("include/dbConexion.php");
include_once("include/header.php");

$dbc = conexion();

$sql ="SELECT e.*, t.NombreTipoEvento FROM evento e,TipoEvento t WHERE e.IdTipoevento = t.IdTipoEvento;";
$resultado = mysqli_query($dbc,$sql);
?>

 <div class="container">
        <div class="row">
            <h3 style="text-align:center">LISTA DE PARTICIPANTES REGISTRADOS POR EVENTO</h3>
	        <br>		
            <h4 style="text-align:center">Selecciona el Evento para obtener la lista de participantes</h4>
        </div><br><br>

 <form class="form-horizontal" method="POST" id="myform" action="reporte_evento.php" autocomplete="off">
 
<div class="col-sm-10">
        <label for="IdEvento" class="col-sm-6 control-label">Selecciona Evento:</label>
        <div class="col-sm-10">
             <select class="form-control" id="IdEvento" name="IdEvento">
                <option value="">Seleccionar Evento</option></label>
               <?php while($row = $resultado->fetch_assoc()) { ?>
                <option value="<?php echo $row['IdEvento']; ?>"><?php echo $row['NombreTipoEvento'].': '.$row['NombreEvento']; ?></option>
               <?php } ?>
             </select>
        </div>
</div>
<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
                <a href="inicio.php" class="btn btn-default">Regresar</a>
                <button type="submit" class="btn btn-primary">Exportar a Excel</button>
        </div>
</div>
</form>

</div>
