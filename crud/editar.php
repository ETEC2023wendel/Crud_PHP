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
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    $sql = "UPDATE usuarios SET nome=?, email=?, telefone=? WHERE id=?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("sssi", $nome, $email, $telefone, $userId);
        if ($stmt->execute()) {
            header("Location: visualizar.php?success=Usuário atualizado com sucesso!");
            exit();
        } else {
            echo "Erro ao atualizar o usuário: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuário</title>
    <link rel="stylesheet" type="text/css" href="css/editar.css">
</head>
<body>
    <h1>Editar Usuário</h1>
    
    <form method="post" action="">
        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?php echo $telefone; ?>" required>
        <button type="submit">Salvar</button>
    </form>
    
    <a href="visualizar.php">Cancelar</a>
</body>
</html>
