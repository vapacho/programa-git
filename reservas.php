<?php  
// Primera parte: conexión a la base de datos  
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
?>  

<!DOCTYPE html>  
<html lang="es">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Página de Inicio</title>  
    <link rel="stylesheet" href="style.css"> <!-- Enlace a CSS -->  
</head>  
<body>  
    <header>  
        <h1>Bienvenido a Nuestros Servicios</h1>  
        <nav>  
            <ul>  
                <li><a href="index.php">Inicio</a></li>  
                <li><a href="agregar_reserva.php">Agregar Reserva</a></li>  
            </ul>  
        </nav>  
    </header>  
    <main>  
        <h2>Descubre nuestro hotel</h2>  
        <p>Ofrecemos las mejores comodidades y servicios para que disfrutes de tu estancia.</p>  
        
        <h3>Realiza tu Reserva</h3>  
        <p>Para reservar una habitación en nuestro hotel, visita la página de <a href="agregar_reserva.php">reservas</a>.</p>  
    </main>  
</body>  
</html>
    <figure>  
        <img src="./img/logo8.png" alt="Logo" class="imagen-logo" />  
        <figcaption>  
            <h1 id="titulo">Un Descanso como Todo un  de Rey de Selva</h1>  
            <p id="descripcionweb">Descanso dentro de la selva con sonidos naturales, expediciones nocturnas, algo muy fuera de convencional.</p>  
        </figcaption>  
    </figure>  
</main>  

<?php  
// Verificar si se ha enviado el formulario  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
    // Obtener datos del formulario  
    $num_habitacion = $_POST['num_habitacion'];  
    $fecha_entrada = $_POST['fecha_entrada'];  
    $fecha_salida = $_POST['fecha_salida'];  
    $precio = $_POST['precio'];  
    $observacion = $_POST['observacion'];  

    // Preparar y ejecutar la consulta  
    $sql = "INSERT INTO reservas (num_habitacion, fecha_entrada, fecha_salida, precio, observacion) VALUES (?, ?, ?, ?, ?)";  
    $stmt = mysqli_prepare($conn, $sql);  

    if ($stmt) {  
        // Vincular parámetros y ejecutar la consulta  
        mysqli_stmt_bind_param($stmt, "sssss", $num_habitacion, $fecha_entrada, $fecha_salida, $precio, $observacion);  

        // Ejecutar la consulta y verificar el resultado  
        if (mysqli_stmt_execute($stmt)) {  
            echo "<p>Reserva agregada exitosamente.</p>";  
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
    <title>Agregar Reserva</title>  
    <style>  
        body {  
            background-color: #f3f3f3;  
            margin: 0;  
            padding: 0;  
        }  

        main {  
            max-width: 600px;  
            margin: 20px auto;  
            padding: 20px;  
            background-color: #e6ffe6; /* Fondo verde claro para el formulario */  
            border-radius: 10px;  
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Sombra */  
        }  

        h2 {  
            text-align: center; /* Centrar el título */  
            color: #004d00; /* Color verde oscuro */  
        }  

        form {  
            display: flex;  
            flex-direction: column; /* Disposición en columna */  
        }  

        label {  
            margin: 5px 0; /* Espaciado entre etiquetas y campos */  
            font-weight: bold; /* Texto en negrita */  
        }  

        input[type="text"], input[type="date"], input[type="number"], textarea, input[type="submit"] {  
            width: 100%;  
            padding: 15px; /* Aumentar el tamaño de los campos */  
            margin-bottom: 10px;  
            border-radius: 5px;  
            border: 1px solid #A5D6A7; /* Color de borde verde claro */  
            box-sizing: border-box; /* Para incluir padding y border en el ancho total */  
        }  

        input[type="submit"] {  
            background-color: #388E3C; /* Verde más oscuro para el botón */  
            color: white;  
            cursor: pointer;  
            border: none; /* Para quitar borde */  
            font-size: 16px; /* Aumentar el tamaño de la fuente */  
            transition: background-color 0.3s; /* Efecto de transición */  
        }  

        input[type="submit"]:hover {  
            background-color: #2E7D32; /* Cambio de color al pasar el mouse */  
        }  

        textarea {  
            height: 100px; /* Aumentar tamaño de textarea */  
        }  

        .imagen-logo {  
            display: block;  
            margin: 20px auto; /* Centrado automático */  
            width: 100%; /* Hacer que la imagen ocupe el 100% del ancho */  
            max-width: 1900px; /* Ancho máximo para no sobresalir */  
            height: auto; /* Mantener proporciones */  
        }  

        figcaption {  
            text-align: center; /* Centrar el texto de la figura */  
        }  

        #titulo {  
            color: #004d00; /* Color verde oscuro */  
            font-size: 1.5em; /* Aumentar tamaño del título */  
        }  

        #descripcionweb {  
            color: #3D9970; /* Color verde más suave para la descripción */  
            font-size: 1.2em; /* Tamaño de fuente de la descripción */  
        }  
    </style>  
</head>  
<body>  


