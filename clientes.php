<?php  
$servername = "localhost";  
$username = "root";  
$password = "";  
$dbname = "hotel_db";  

// Crear conexión  
$conn = mysqli_connect($servername, $username, $password, $dbname);  

// Verificar la conexión  
if (!$conn) {  
    die("Conexión fallida: " . mysqli_connect_error());  
}  

// Verificar si se ha enviado el formulario  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
    // Obtener datos del formulario y limpiar  
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);  
    $apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);  
    $dni = mysqli_real_escape_string($conn, $_POST['dni']);  
    $sexo = mysqli_real_escape_string($conn, $_POST['sexo']);  
    $fecha_nacimiento = mysqli_real_escape_string($conn, $_POST['fecha_nacimiento']);  
    $pais = mysqli_real_escape_string($conn, $_POST['pais']);  
    $provincia = mysqli_real_escape_string($conn, $_POST['provincia']);  
    $ciudad = mysqli_real_escape_string($conn, $_POST['ciudad']);  
    $codigo_postal = mysqli_real_escape_string($conn, $_POST['codigo_postal']);  
    $direccion = mysqli_real_escape_string($conn, $_POST['direccion']);  
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);  
    $observacion = mysqli_real_escape_string($conn, $_POST['observacion']);  

    // Preparar y ejecutar la consulta  
    $sql = "INSERT INTO clientes (nombre, apellidos, dni, sexo, fecha_nacimiento, pais, provincia, ciudad, codigo_postal, direccion, telefono, observacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";  
    $stmt = mysqli_prepare($conn, $sql);  

    if ($stmt) {  
        // Vincular parámetros y ejecutar la consulta  
        mysqli_stmt_bind_param($stmt, "ssssssssssss", $nombre, $apellidos, $dni, $sexo, $fecha_nacimiento, $pais, $provincia, $ciudad, $codigo_postal, $direccion, $telefono, $observacion);  

        // Ejecutar la consulta y verificar el resultado  
        if (mysqli_stmt_execute($stmt)) {  
            echo "<p>Cliente agregado exitosamente.</p>";  
        } else {  
            echo "<p>Error: " . mysqli_stmt_error($stmt) . "</p>";  
        }  

        // Cerrar la declaración  
        mysqli_stmt_close($stmt);  
    } else {  
        echo "<p>Error al preparar la consulta: " . mysqli_error($conn) . "</p>";  
    }  

    // Cerrar la conexión  
    mysqli_close($conn);  
}  
?>  

<!DOCTYPE html>  
<html lang="es">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Agregar Cliente</title>  
    <style>  
        body {  
            background-color: #f3f3f3;  
        }  
        main {  
            max-width: 600px;  
            margin: 20px auto;  
            padding: 20px;  
            background-color: #e6ffe6;  
            border-radius: 10px;  
        }  
        input[type="text"], input[type="date"], textarea, input[type="submit"] {  
            width: 100%;  
            padding: 10px;  
            margin-bottom: 10px;  
            border-radius: 5px;  
            border: 1px solid #ccc;  
        }  
        input[type="submit"] {  
            background-color: #4CAF50;  
            color: white;  
            cursor: pointer;  
        }  
    </style>  
</head>  
<body>  
<main>  
    <h2>Agregar Cliente</h2>  
    <form action="" method="post">  
        <label for="nombre">Nombre:</label>   
        <input type="text" name="nombre" required><br>  

        <label for="apellidos">Apellidos:</label>   
        <input type="text" name="apellidos" required><br>  

        <label for="dni">DNI:</label>   
        <input type="text" name="dni" required><br>  

        <label for="sexo">Sexo:</label>   
        <input type="text" name="sexo"><br>  

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>   
        <input type="date" name="fecha_nacimiento"><br>  

        <label for="pais">País:</label>   
        <input type="text" name="pais"><br>  

        <label for="provincia">Provincia:</label>   
        <input type="text" name="provincia"><br>  

        <label for="ciudad">Ciudad:</label>  
        <input type="text" id="ciudad" name="ciudad"><br>  

        <label for="codigo_postal">Código Postal:</label>  
        <input type="text" id="codigo_postal" name="codigo_postal"><br>  

        <label for="direccion">Dirección:</label>  
        <input type="text" id="direccion" name="direccion"><br>  

        <label for="telefono">Teléfono:</label>  
        <input type="text" id="telefono" name="telefono"><br>  

        <label for="observacion">Observación:</label>  
        <textarea id="observacion" name="observacion"></textarea><br>  

        <input type="submit" value="Agregar Cliente">  
    </form>
    <img src="./img/logo1.png" alt="" width="500px"; height="350px"; />
</main>  
</body>  
</html>
