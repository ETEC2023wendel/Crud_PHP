<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    $sql = "INSERT INTO usuarios (nome, email, telefone) VALUES (?, ?, ?)";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("sss", $nome, $email, $telefone);
        if ($stmt->execute()) {
            header("Location: index.php?success=Usuário cadastrado com sucesso!");
            exit();
        } else {
            echo "Erro ao cadastrar o usuário: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>