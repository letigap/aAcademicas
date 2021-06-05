<?php
if (key_exists('HTTP_X_REQUESTED_WITH', $_SERVER) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    $search = $_POST['lugar_evento_ubicacion'];
    include_once("include/dbConexion.php");
    $sql = "select id_lugar_evento, lugar_evento_sala, lugar_evento_piso from lugar_evento where lugar_evento_ubicacion = '$search' order by lugar_evento_ubicacion";
    $salas = getDatos($sql);
    $html = "<option value=\"\">-- Selecciona una opción --</option>";
    foreach($salas as $sala){
        $html .= "<option value='{$sala['id_lugar_evento']}'>{$sala['lugar_evento_sala']} ({$sala['lugar_evento_piso']})</option>";
    }
    print $html;

    
} else {
    echo 'No es una peticion AJAX';
}