<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}


$servername = "MYSQL5048.site4now.net";
$username = "a47d48_uaa";
$password = "Abc.123**";
$dbname = "db_a47d48_uaa";
$nombre = $_POST['nombre'];
 $imagen_base64 = $_POST['imagen_base64'];
//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO imagenes (nombre, imagen) VALUES  ('$nombre', '$imagen_base64')";

if ($conn->query($sql) === TRUE) {
  $data = array(
    'imagen' => $imagen_base64,
    'mensaje' => '¡Imagen subida con éxito!'
);
echo json_encode($data);
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
