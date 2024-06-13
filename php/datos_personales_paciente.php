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

//Comprobación de registro hecho, en window salta a donde manda luego de ingresarlo en la bd
if ($ejecutar) {
    echo '
        <script>
            alert("Registro Datos Paciente realizado de forma exitosa");
            window.location = "../perfilpaciente.html";
    </script>
    ';
}else{
    echo '
    <script>
        alert("Registro NO realizado, inténtelo mas tarde");
        window.location = "../perfilpaciente.html";
</script>
';
}

mysqli_close($conexion);
