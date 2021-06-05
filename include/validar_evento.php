<?php

$datos = $_POST;
  // print_r($datos);


//SECCION DEL CODIGO PARA PROCESAR EL FORMULARIO 
if (isset($_POST['agregar']) && !empty($_POST['agregar'])) {
            if (isset($_POST['id_inst_org']) && isset($_POST['langOpt'])) {
    $id_tevento = $_POST['id_tevento'];
    $evento_nombre = trim($_POST['evento_nombre']);
    $evento_fecha = trim($_POST['evento_fecha']);
    $evento_descripcion = trim($_POST['evento_descripcion']);
    $evento_informes = trim($_POST['evento_informes']);
    $evento_transmision = trim($_POST['evento_transmision']);
    $evento_modalidad = trim($_POST['evento_modalidad']);
    $id_tipo_apoyo = $_POST['id_tipo_apoyo'];
    $id_lugar_evento = $_POST['id_lugar_evento'];
    $lugar_evento_ubicacion = $_POST['lugar_evento_ubicacion'];
    $id_inst_org = $_POST['id_inst_org'];
    $id_participante = $_POST['langOpt'];
    
    $errores = [];
    if( vacio($id_tevento) ) {
        $errores['id_tevento']['obligatorio'] = "El tipo de evento es obligatorio";
    } 
    if( vacio($lugar_evento_ubicacion) ) {
        $errores['lugar_evento_ubicacion']['obligatorio'] = "El lugar de ubicacion es obligatorio";
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

    if( vacio($evento_fecha) ) {
        $errores['evento_fecha']['obligatorio'] = "La fecha del evento es obligatorio";
    } elseif(!filter_var($evento_fecha, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => "/^[a-zA-Záéíóú0-9':,-.\s ]+$/i"]])) {
       //evento_fecha puede tener letras . ' (espacios) - números
       $errores['evento_fecha'][] = "La fecha no es válida";
    }elseif (strlen($evento_fecha) > 80) {
        $errores['evento_fecha'][] = "La fecha puede tener máximo 80 caracteres";
    }

    if( vacio($evento_descripcion) ) {
        $errores['evento_descripcion']['obligatorio'] = "La descripcion de evento es obligatorio";
    } elseif(!filter_var($evento_descripcion, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => "/^[a-zA-ZáéíóúAÉÍÓÚÑñ0-9'-.\s ]+$/i"]])) {
       //evento_descripcion puede tener letras . ' (espacios) -  números
       $errores['evento_descripcion'][] = "La descripción no es válida";
    }elseif (strlen($evento_nombre) > 500) {
        $errores['evento_descripcion'][] = "La descripción puede tener máximo 500 caracteres";
    }

    if( vacio($evento_informes) ) {
        $errores['evento_informes']['obligatorio'] = "La dirección para informes del evento es obligatorio";
    }elseif(!filter_var($evento_informes, FILTER_VALIDATE_EMAIL)) {
        $errores['evento_informes']['formato'] = "El email no es válido";
    }elseif (strlen($evento_informes) > 100) {
        $errores['evento_informes'][] = "La dirección de informes puede tener máximo 100 caracteres";
    }
    

    if( vacio($evento_transmision) ) {
        $errores['evento_transmision']['obligatorio'] = "La transmisión de evento es obligatorio";
    } elseif(!filter_var($evento_transmision, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => "/^[a-zA-Z0-9'-.:\s ]+$/i"]])) {
       //evento_transmision puede tener letras . ' (espacios) -  y numeros
       $errores['evento_transmision'][] = "La transmisión no es válida";
    }elseif (strlen($evento_transmision) > 100) {
        $errores['evento_transmision'][] = "La transmision puede tener máximo 100 caracteres";
    }

    if( vacio($evento_modalidad) ) {
        $errores['evento_modalidad']['obligatorio'] = "La modalidad de evento es obligatorio";
    } elseif(!filter_var($evento_modalidad, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => "/^[a-zA-Z0-9'-.:\s ]+$/i"]])) {
       //evento_transmision puede tener letras . ' (espacios) -  y numeros
       $errores['evento_modalidad'][] = "La modalidad no es válida";
    }elseif (strlen($evento_modalidad) > 100) {
        $errores['evento_modalidad'][] = "La modalidad puede tener máximo 100 caracteres";
    }
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

    if( vacio($id_participante) ) {
        $errores['id_participante']['obligatorio'] = "El participante es obligatorio";
    } 

    
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


        $query = 'INSERT INTO evento (id_tipo_apoyo,id_tevento,id_lugar_evento, evento_nombre,evento_fecha,evento_descripcion, evento_informes,evento_transmision, evento_imagen,evento_programa,evento_modalidad) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

            $stmt = mysqli_prepare($dbc, $query);


            mysqli_stmt_bind_param($stmt, 'iiissssssss',$id_tipo_apoyo, $id_tevento, $id_lugar_evento, $evento_nombre, $evento_fecha, $evento_descripcion, $evento_informes, $evento_transmision, $target_path, $target_path2, $evento_modalidad);

            if (mysqli_stmt_execute($stmt)){
               echo "<script> alert('hola se inserto 1'); </script>";

                $rs = mysqli_query($dbc, "SELECT MAX(id_evento) AS id FROM evento");
                if ($row = mysqli_fetch_row($rs)) {
                $id = trim($row[0]);
                }
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
                       echo "<script> alert('hola se inserto 2'); </script>";
                        // ///insercion participantes
                        // $rs = mysqli_query($dbc, "SELECT MAX(id_evento) AS id FROM evento");
                        // if ($row = mysqli_fetch_row($rs)) {
                        // $id = trim($row[0]);
                        // }
                        echo "<script> alert('hola'); </script>";
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
}
        
         


   

