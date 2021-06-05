<?php
if (key_exists('HTTP_X_REQUESTED_WITH', $_SERVER) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    $search = $_POST['city'];
    include_once("include/dbConexion.php");
    $sql = "select officeCode, city, country from offices where country = '$search' order by country";
    $oficinas = getDatos($sql);
    $html = "<option value=\"\">-- Selecciona una opción --</option>";
    foreach($oficinas as $oficina){
        $html .= "<option value='{$oficina['officeCode']}'>{$oficina['city']} ({$oficina['country']})</option>";
    }
    print $html;

    
} else {
    echo 'No es una peticion AJAX';
}