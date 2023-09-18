<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $userId = $_GET["id"];
    $sql = "SELECT * FROM usuarios WHERE id = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $nome = $row['nome'];
            $email = $row['email'];
            $telefone = $row['telefone'];
        }
        $stmt->close();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["userId"];

    $sql = "DELETE FROM usuarios WHERE id=?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            header("Location: visualizar.php?success=Usuário excluído com sucesso!");
            exit();
        } else {
            echo "Erro ao excluir o usuário: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Excluir Usuário</title>
    <link rel="stylesheet" type="text/css" href="css/excluir.css">
</head>
<body>
    <h1>Excluir Usuário</h1>
    
    <form method="post" action="">
        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
        <p>Tem certeza de que deseja excluir o usuário:</p>
        <p><strong>Nome:</strong> <?php echo $nome; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Telefone:</strong> <?php echo $telefone; ?></p>
        <button type="submit">Confirmar Exclusão</button>
    </form>
    
    <a href="visualizar.php">Cancelar</a>
</body>
</html>