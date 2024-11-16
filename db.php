<?php
// db.php - Conexão com o banco de dados
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'fichas_medicas';

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>