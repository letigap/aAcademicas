<?php

$datos = $_POST;
 // print_r($datos);

//SECCION DEL CODIGO PARA PROCESAR EL FORMULARIO
if (isset($_POST['agregar']) && !empty($_POST['agregar'])) {
            
    $id_rol = $_POST['id_rol'];
    $participante_nombre = trim($_POST['participante_nombre']);
    $participante_apellidop = trim($_POST['participante_apellidop']);
    $participante_apellidom = trim($_POST['participante_apellidom']);
    $participante_email = trim($_POST['participante_email']);
    $participante_cargo_inst = trim($_POST['participante_cargo_inst']);
    
    
    $errores = [];
   // var_dump(vacio($id_tevento));
   // $errores = [];
    if( vacio($id_rol) ) {
        $errores['id_rol']['obligatorio'] = "El rol es obligatorio";
    }

    if( vacio($participante_nombre) ) {
        $errores['participante_nombre']['obligatorio'] = "El Nombre es obligatorio";
    } elseif(!filter_var($participante_nombre, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => "/^[a-z0-9áéíóúAÉÍÓÚÑñ'-.\s ]+$/i"]])) {
       //evento_nombre puede tener letras . ' (espacios) - 
       $errores['participante_nombre'][] = "El nombre de participante_nombre no es válido";
    }elseif (strlen($participante_nombre) > 80) {
        $errores['participante_nombre'][] = "El nombre de participante_nombre puede tener máximo 80 caracteres";
    }
    if( vacio($participante_apellidop) ) {
        $errores['participante_apellidop']['obligatorio'] = "El Apellido Paterno es obligatorio";
    } elseif(!filter_var($participante_apellidop, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => "/^[a-zA-ZáéíóúAÉÍÓÚÑñ'-.\s ]+$/i"]])) {
       //evento_nombre puede tener letras . ' (espacios) - 
       $errores['participante_apellidop'][] = "El Apellido de participante no es válido";
    }elseif (strlen($participante_apellidop) > 80) {
        $errores['participante_apellidop'][] = "El Apellido de participante puede tener máximo 80 caracteres";
    }

    if(!filter_var($participante_apellidom, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => "/^[a-zA-ZáéíóúAÉÍÓÚÑñ'-.\s ]+$/i"]])) {
       //evento_nombre puede tener letras . ' (espacios) - 
       $errores['participante_apellidom'][] = "El Apellido de participante no es válido";
    }elseif (strlen($participante_apellidom) > 80) {
        $errores['participante_apellidom'][] = "El Apellido de participante puede tener máximo 80 caracteres";
    }


    if(!filter_var($participante_email, FILTER_VALIDATE_EMAIL)) {
        $errores['participante_email']['formato'] = "El email no es válido";
    }elseif (strlen($participante_email) > 100) {
        $errores['participante_email'][] = "La dirección de correo puede tener máximo 100 caracteres";
    }

    if( vacio($participante_cargo_inst) ) {
        $errores['participante_cargo_inst']['obligatorio'] = "El cargo es obligatorio";
    } elseif(!filter_var($participante_cargo_inst, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => "/^[a-zA-ZáéíóúAÉ'-.\s ]+$/i"]])) {
       //evento_nombre puede tener letras . ' (espacios) - 
       $errores['participante_cargo_inst'][] = "El cargo de participante_nombre no es válido";
    }elseif (strlen($participante_cargo_inst) > 100) {
        $errores['participante_cargo_inst'][] = "El cargo puede tener máximo 100 caracteres";
    }


    if (empty($errores)) {

        $dbc = conexion();
        $sql = "SELECT * FROM participante WHERE participante_email = '$participante_email' and id_rol = '$id_rol';";
        $resultado = $dbc->query($sql);  
        $numfilas = $resultado->num_rows;
        if($numfilas==0){
            // echo "<script>alert ('insertado');</script>";
                            $query = 'INSERT INTO participante (id_rol, participante_nombre, participante_apellidop, participante_apellidom, participante_email, participante_cargo_inst) VALUES (?, ?, ?, ?, ?, ?)';

                            $stmt = mysqli_prepare($dbc, $query);

                            mysqli_stmt_bind_param($stmt, 'isssss',$id_rol, $participante_nombre, $participante_apellidop, $participante_apellidom, $participante_email, $participante_cargo_inst);

       
                            if (mysqli_stmt_execute($stmt)) {
                            echo "<script> var z = confirm('Participante registrado con exito ¿Agregar otro?'); 
                                if (z == true) {
                                   location.href='AgregarParticipante.php'
                                 } else {
                                   location.href='AgregarEvento.php'
                                }
                                </script>";
                            }else{
                                echo "<script>alert ('El participante no se pudo registrar');</script>";
             
                        }

        }else{
            echo "<script> var z = confirm('El Participante ya esta registrado con el rol elegido ¿Agregar otro?'); 
            if (z == true) {
               location.href='AgregarParticipante.php'
             } else {
               location.href='AgregarEvento.php'
            }
            </script>";
        }
    }

}


