<?php
$host = 'localhost';
$username = 'root'; // Substitua pelo seu nome de usuário do MySQL
$password ='' ; // Substitua pela sua senha do MySQL
$database = 'attcrud'; // Substitua pelo nome do seu banco de dados

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}
?>