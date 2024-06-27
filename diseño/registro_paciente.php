<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<pre>";
print_r($_POST);
echo "</pre>";
// Parámetros de conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'farmacia');

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Recibir los datos del formulario
$nombre = $_POST['nombre'];
$primerApellido = $_POST['apellido1'];
$segundoApellido = $_POST['apellido2'];
$codigo = $_POST['codigo'];
$genero = $_POST['sexo'];
$edad = $_POST['edad'];
$fechaNacimiento = $_POST['fecha'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];

// Preparar la sentencia SQL para insertar los datos
$sql = "INSERT INTO paciente (ID_Paciente, Nombre_paciente, Primer_apellido_paciente, Segundo_apellido_paciente, Genero_paciente, Edad_paciente, Fecha_nacimiento_paciente, Correo_paciente, Dirección_paciente) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
// Asegúrate de que el tipo de datos (i para int, s para string, etc.) coincida con tus datos.
$stmt->bind_param("sssssisss", $codigo, $nombre, $primerApellido, $segundoApellido, $genero, $edad, $fechaNacimiento, $correo, $direccion);

// Ejecutar la sentencia
if ($stmt->execute()) {
    echo "Registro exitoso";
    echo '<br><a href="index.html"><button>Regresar</button></a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>