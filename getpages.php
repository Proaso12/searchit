<?php
// Habilitar la visualización de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'sql10.freemysqlhosting.net:3306'; // Cambia si tu base de datos está en otro host
$db = 'sql10734411'; // Reemplaza con el nombre de tu base de datos
$user = 'sql10734411'; // Reemplaza con tu usuario de la base de datos
$pass = 'aHisv6gLAY'; // Reemplaza con tu contraseña de la base de datos

// Conexión a la base de datos
$conn = new mysqli($host, $user, $pass, $db);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los datos
$sql = "SELECT Name, URL FROM searcher"; // Asegúrate de que la tabla y columnas existen
$result = $conn->query($sql);

$pages = array();
if ($result->num_rows > 0) {
    // Almacenar los resultados en un array
    while ($row = $result->fetch_assoc()) {
        $pages[] = [
            'title' => $row['Name'],  // Cambia 'Name' al nombre de tu columna
            'url' => $row['URL']       // Cambia 'URL' al nombre de tu columna
        ];
    }
}

// Cerrar conexión
$conn->close();

// Devolver datos en formato JSON
header('Content-Type: application/json');
echo json_encode($pages);
?>