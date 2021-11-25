<?php
$datos = $_POST;
    print_r($datos);

//SECCION DEL CODIGO PARA PROCESAR EL FORMULARIO 
if (isset($_POST['agregar']) && !empty($_POST['agregar'])) {
    echo "<script> alert('entro'); </script>";
    
    if(isset($_POST['id_tevento'])){
        $id_tevento = $_POST['id_tevento'];
    }else{
        $id_tevento = null;
    }
    $evento_nombre = trim($_POST['evento_nombre']);
    $evento_fecha_inicio = $_POST['evento_fecha_inicio'];
    $evento_hora = trim($_POST['evento_hora']);
    $evento_fecha_fin = trim($_POST['evento_fecha_fin']);
    $evento_descripcion = trim($_POST['evento_descripcion']);
    $evento_informes = trim($_POST['evento_informes']);
    $evento_informes2 = trim($_POST['evento_informes2']);
    if (isset($_POST['evento_modalidad'])){
        $evento_modalidad = implode(",", $_POST['evento_modalidad']);
        echo $evento_modalidad;
    }else{
        $evento_modalidad = null;
    }
    
    $evento_transmision = trim($_POST['evento_transmision']);
    $evento_transmision2 = trim($_POST['evento_transmision2']);
    $evento_transmision3 = trim($_POST['evento_transmision3']);
    $evento_registro = trim($_POST['evento_registro']);
    

    if(isset($_POST['id_tipo_apoyo'])){
        $id_tipo_apoyo = trim($_POST['id_tipo_apoyo']);
    }else{
        $id_tipo_apoyo=null;
    }

    if(isset($_POST['id_lugar_evento'])){
        $id_lugar_evento = $_POST['id_lugar_evento'];
    }else{
        $id_lugar_evento = 18;
    }

    if(isset($_POST['lugar_evento_ubicacion'])){
        $lugar_evento_ubicacion = $_POST['lugar_evento_ubicacion'];
    }else{
        $lugar_evento_ubicacion = 'No Aplica';
    }

    if(isset($_POST['evento_informes2'])){
        $evento_informes2 = trim($_POST['evento_informes2']);
    }else{
         $evento_informes2 = "";
    }

    if(isset($_POST['id_inst_org'])){        
    $id_inst_org = $_POST['id_inst_org'];
    }else{
    $id_inst_org = null;
    }

    if(isset($_POST['langOpt'])){;
          $id_participante = $_POST['langOpt'];  
    }

//    echo "<script> alert('v1: ".$id_lugar_evento." v2: ".$lugar_evento_ubicacion." v3: ".$evento_informes2."'); </script>";


    echo "<script>
        sessionStorage.setItem('evento_nombre','".$evento_nombre."'); 
        sessionStorage.setItem('id_tevento',".$id_tevento.");
        sessionStorage.setItem('evento_fecha_inicio','".$evento_fecha_inicio."');
        sessionStorage.setItem('evento_fecha_fin','".$evento_fecha_fin."');
        sessionStorage.setItem('evento_hora','".$evento_hora."'); 
        sessionStorage.setItem('evento_descripcion','".$evento_descripcion."');  
        sessionStorage.setItem('evento_informes','".$evento_informes."');
        sessionStorage.setItem('evento_informes2','".$evento_informes2."');
        sessionStorage.setItem('evento_transmision','".$evento_transmision."');
        sessionStorage.setItem('evento_transmision2','".$evento_transmision2."');
        sessionStorage.setItem('evento_transmision3','".$evento_transmision3."');
        sessionStorage.setItem('evento_registro','".$evento_registro."'); 
        sessionStorage.setItem('id_tipo_apoyo',".$id_tipo_apoyo."); 
        sessionStorage.setItem('id_lugar_evento','".$id_lugar_evento."');
        sessionStorage.setItem('lugar_evento_ubicacion','".$lugar_evento_ubicacion."');
                                        
     </script>";

  


    $errores = [];
    if( vacio($id_tevento) ) {
        $errores['id_tevento']['obligatorio'] = "El tipo de evento es obligatorio";
    } 
     
   
   // var_dump(vacio($id_tevento));
   // $errores = [];
    if( vacio($evento_nombre) ) {
        $errores['evento_nombre']['obligatorio'] = "El Nombre es obligatorio";
    } elseif(!filter_var($evento_nombre, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => "/^[a-zA-ZáéíóúAÉÍÓÚÑñ0-9:&\(\)-.\s ]+$/i"]])) {
       //evento_nombre puede tener letras . ' (espacios) - 
       $errores['evento_nombre'][] = "El nombre de evento no es válido";
    }elseif (strlen($evento_nombre) > 500) {
        $errores['evento_nombre'][] = "El nombre de evento puede tener máximo 500 caracteres";
    }

    if( vacio($evento_fecha_inicio) ) {
        $errores['evento_fecha_inicio']['obligatorio'] = "La fecha inicio del evento es obligatorio";
    } 

    if( vacio($evento_hora) ) {
        $errores['evento_hora']['obligatorio'] = "La hora inicio del evento es obligatorio";
    }

    if( vacio($evento_fecha_fin) ) {
        $errores['evento_fecha_fin']['obligatorio'] = "La fecha de termino del evento es obligatorio";
    } 
    
    if( !vacio($evento_descripcion) && (!filter_var($evento_descripcion, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => "/^[a-zA-ZáéíóúAÉÍÓÚÑñ0-9'-.:(),;\s ]+$/i"]]))) {
       //evento_descripcion puede tener letras . ' (espacios) -  números
       $errores['evento_descripcion'][] = "La descripción no es válida";
    }elseif (strlen($evento_descripcion) > 500) {
        $errores['evento_descripcion'][] = "La descripción puede tener máximo 500 caracteres";
    }

    if( vacio($evento_informes) ) {
        $errores['evento_informes']['obligatorio'] = "La dirección para informes del evento es obligatorio";
    }elseif(!filter_var($evento_informes, FILTER_VALIDATE_EMAIL)) {
        $errores['evento_informes']['formato'] = "El email no es válido";
    }elseif (strlen($evento_informes) > 100) {
        $errores['evento_informes'][] = "La dirección de informes puede tener máximo 100 caracteres";
    }

    if( (!vacio($evento_informes2) ) && ( !filter_var($evento_informes2, FILTER_VALIDATE_EMAIL) ) ) {
        $errores['evento_informes2']['formato'] = "El email no es válido";
    }elseif (strlen($evento_informes2) > 100) {
        $errores['evento_informes2'][] = "La dirección de informes puede tener máximo 100 caracteres";
    }
    
    if( vacio($evento_transmision) ) {
        $errores['evento_transmision']['obligatorio'] = "La transmisión de evento es obligatorio";
    } elseif(!filter_var($evento_transmision, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => "/^[a-zA-ZáéíóúAÉÍÓÚÑñ0-9'-.:@\s\/ ]+$/i"]])) {
       //evento_transmision puede tener letras . ' (espacios) -  y numeros
       $errores['evento_transmision'][] = "La transmisión no es válida";
    }elseif (strlen($evento_transmision) > 100) {
        $errores['evento_transmision'][] = "La transmision puede tener máximo 100 caracteres";
    }
    if( !vacio($evento_transmision2) && (!filter_var($evento_transmision2, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => "/^[a-zA-ZáéíóúAÉÍÓÚÑñ0-9'-.:@\s\/ ]+$/i"]])) ) {
       $errores['evento_transmision2'][] = "La transmisión no es válida";
    }elseif (strlen($evento_transmision2) > 100) {
        $errores['evento_transmision2'][] = "La transmision puede tener máximo 100 caracteres";
    }

    if( !vacio($evento_transmision3) && (!filter_var($evento_transmision3, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => "/^[a-zA-ZáéíóúAÉÍÓÚÑñ0-9'-.:@\s\/ ]+$/i"]])) ) {
       $errores['evento_transmision3'][] = "La transmisión no es válida";
    }elseif (strlen($evento_transmision3) > 100) {
        $errores['evento_transmision3'][] = "La transmision puede tener máximo 100 caracteres";
    }

    if( !vacio($evento_registro) && (!filter_var($evento_registro, FILTER_VALIDATE_URL)) ) {
       //evento_registro puede tener letras . ' (espacios) -  y numeros
       $errores['evento_registro'][] = "El campo registro no es válido";
    }elseif (strlen($evento_registro) > 100) {
        $errores['evento_registro'][] = "El registro puede tener máximo 100 caracteres";
    }

    
    if( vacio($evento_modalidad)) {
        //$errores['evento_modalidad']['obligatorio'] = "Es obligatorio seleccionar una opción";
        echo "<p><b>Por favor seleccione al menos una opción de Modalidad.</b></p>";   
    }
    // else{
    //   // Contando el numero de input seleccionados "checked" checkboxes.
    //     $checked_contador = count($_POST['evento_modalidad']);
    //     echo "<p>Has seleccionado los siguientes ".$checked_contador." opcione(s):</p>";
    //     // Bucle para almacenar y visualizar valores activados checkbox.
    //     foreach($_POST['evento_modalidad'] as $seleccion) {
    //         echo $seleccion .", ";
    //     }  
    // }

    if( vacio($id_tipo_apoyo) ) {
        $errores['id_tipo_apoyo']['obligatorio'] = "El tipo de apoyo es obligatorio";
    }
    if( vacio($id_lugar_evento) ) {
        $errores['id_lugar_evento']['obligatorio'] = "El lugar del evento es obligatorio";
    }

        //Validar campo de organizaciones
    if( vacio($id_inst_org) ) {
        $errores['id_inst_org']['obligatorio'] = "El organizador es obligatorio";
    } 

    // if( vacio($id_participante) ) {
    //     $errores['id_participante']['obligatorio'] = "El participante es obligatorio";
    // } 

    
    //VALIDACION DEL ARCHIVO DE IMAGEN A SUBIR
   // if (isset($_FILES['evento_imagen'])) {     

         $target_path = "assets/img/";
         $target_path = $target_path . basename($_FILES['evento_imagen']['name']);

          
        if (is_uploaded_file ($_FILES['evento_imagen']['tmp_name'])) {
        //Validar el tamaño del archivo
        if ($_FILES['evento_imagen']['size'] >  3145728 ){
            $errores['evento_imagen'] = "El tamaño del archivo es mayor al permitido.";
            
        }
    
        //Validar el tipo de archivo
        $tiposValidos = [
            'image/gif', 'image/png', 'image/jpg', 'image/jpeg'
                        ];
        $mimeTypeArchivo = mime_content_type($_FILES['evento_imagen']['tmp_name']);

        if (!in_array($mimeTypeArchivo, $tiposValidos) || !in_array($_FILES['evento_imagen']['type'], $tiposValidos)) {
            echo '<br>';
            $errores['evento_imagen'][] = '<br/>"El archivo solo puede ser .gif, .png, o .jpg"';
        }

        if(empty($errores)) {
             if(!move_uploaded_file($_FILES['evento_imagen']['tmp_name'], $target_path)) {
                $errores['evento_imagen'][] = "No se pudo mover";
            }
        }  
          
        } else {
             $errores['evento_imagen'][] = "No se subió el archivo";
         }
  //  }  
  
  //VALIDACION DEL ARCHIVO DEL PROGRAMA DEL EVENTO
  $target_path2 = "assets/archivos/";
  $target_path2 = $target_path2 . basename($_FILES['evento_programa']['name']);

   // $errores = [];
 if (is_uploaded_file ($_FILES['evento_programa']['tmp_name'])) {
 //Validar el tamaño del archivo
 if ($_FILES['evento_programa']['size'] >  3145728 ){
     $errores['evento_programa'] = "El tamaño del archivo es mayor al permitido.";
     
 }


 //Validar el tipo de archivo
 $tiposValidos = [
    'application/pdf'
                 ];
 $mimeTypeArchivo = mime_content_type($_FILES['evento_programa']['tmp_name']);

 if (!in_array($mimeTypeArchivo, $tiposValidos) || !in_array($_FILES['evento_programa']['type'], $tiposValidos)) {
     echo '<br>';
     $errores['evento_programa'][] = '<br/>"El archivo solo puede ser .pdf"';
 }

 if(empty($errores)) {
      if(!move_uploaded_file($_FILES['evento_programa']['tmp_name'], $target_path2)) {
         $errores['evento_programa'][] = "No se pudo mover";
     }
 }  
   
 } else {
      $errores['evento_programa'][] = "No se subió el archivo";
  }

    //Si no hay errores, guardamos el registro en la base de datos
    if (empty($errores)) {

        $dbc = conexion();
         echo "<script> alert('hola comienzo'); </script>";

        $query = 'INSERT INTO evento (id_tipo_apoyo, id_tevento, id_lugar_evento, evento_registro, evento_nombre, evento_fecha_inicio, evento_fecha_fin, evento_hora, evento_descripcion, evento_informes, evento_informes2, evento_transmision, evento_transmision2, evento_transmision3, evento_imagen, evento_programa, evento_modalidad) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

            $stmt = mysqli_prepare($dbc, $query);


            mysqli_stmt_bind_param($stmt, 'iiissssssssssssss',$id_tipo_apoyo, $id_tevento, $id_lugar_evento, $evento_registro, $evento_nombre, $evento_fecha_inicio, $evento_fecha_fin, $evento_hora, $evento_descripcion, $evento_informes, $evento_informes2, $evento_transmision, $evento_transmision2, $evento_transmision3, $target_path, $target_path2, $evento_modalidad);

            if (mysqli_stmt_execute($stmt)){
               echo "<script> alert('hola se inserto 1'); </script>";

                $rs = mysqli_query($dbc, "SELECT MAX(id_evento) AS id FROM evento");
                if ($row = mysqli_fetch_row($rs)) {
                $id = trim($row[0]);
                }
                         echo "<script> alert('el id ".$id."'); </script>";
 
                // echo "<script> alert('".$id."'); </script>";
                 $array_ind = count($id_inst_org);

                for ($i=0; $i < $array_ind ; $i++) { 
                    
                    $query2 = 'INSERT INTO institucion_organizadora_evento (id_inst_org,id_evento) VALUES (?,?)';

                    $stmt2 = mysqli_prepare($dbc, $query2);

                    mysqli_stmt_bind_param($stmt2, 'ii',$id_inst_org[$i],$id);

                     echo "<script> alert('segunda insercion ".$i."'); </script>";

                    $exito=mysqli_stmt_execute($stmt2);
                }
                    if ($exito==1){
                    //    echo "<script> alert('hola se inserto 2'); </script>";
                       
                        // $array_num = count($id_inst_org);
                        $array_parti = count($id_participante);   
                        for ($i=0; $i <$array_parti ; $i++) { 
                            $nombres = explode(",", $id_participante[$i]);
                            $array_num = count($nombres);
                            // $j=[0];
                            for ($j=0; $j <$array_num ; $j++) { 
                            // echo "<script> alert('".$nombres[$j]."'); </script>";
                            $query3 = 'INSERT INTO evento_academico (id_evento,id_participante,id_rol) VALUES (?,?,?)';

                            $stmt3 = mysqli_prepare($dbc, $query3);
                            
                            mysqli_stmt_bind_param($stmt3, 'iii',$id, $nombres[$j],$nombres[$j+1]);

                            $j+=2;
                            $ver=mysqli_stmt_execute($stmt3);
                            
                         } //for 2
                        }//for 1    
                            if ($ver==1){
                                echo "<script> alert('Se insertó el evento exitosamente'); </script>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                echo "<script> sessionStorage.clear();</script>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                //         $stmt = mysqli_prepare($dbc, $query);
                            }else{
                                echo "<script> alert('No se pudo insertar el evento'); </script>";
                            }//else tercer insert
                        }// fin segunda insert
                        else{
                                echo "<script> alert('No se pudo insertar el evento'); </script>";
                            }//else segunda insert
                    }//primera insert
                    else{
                                echo "<script> alert('No se pudo insertar el evento'); </script>";
                }//else primer insert


    }// fin if primer insercion


}
