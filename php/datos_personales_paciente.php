<?php

    include 'conexion_bd.php';


    var_dump($_POST); // Linea para verificar a donde va cada dato 

    $nombres = $_POST['nombre'];
    $apellido_materno = $_POST['apellido1'];
    $apellido_paterno = $_POST['apellido2'];
    $dni = $_POST['codigo'];
    $fecha = $_POST['fecha']; // Verificación de la clave 'fecha'
    $genero  = $_POST['sexo'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['contacto'];
    $correo = $_POST['correo'];


    $query = "INSERT INTO registro_paciente_usuario(nombre, apellido_materno, apellido_paterno, dni, fecha, genero, direccion, telefono, correo)
             VALUES('$nombres', '$apellido_materno', '$apellido_paterno', '$dni', '$fecha', '$genero', '$direccion', '$telefono', '$correo')";
    

    $ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conexion);
}

    
?>  