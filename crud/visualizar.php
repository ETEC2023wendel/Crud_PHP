<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Usuários</title>
    <link rel="stylesheet" type="text/css" href="css/visualizar.css">
</head>
<body>
    <h1>Lista de Usuários</h1>
    
    <!-- Mensagem de sucesso após ação -->
    <?php if (isset($_GET['success'])) { ?>
        <p class="success-message"><?php echo $_GET['success']; ?></p>
    <?php } ?>

    <!-- Tabela de Usuários -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "config.php";

            $sql = "SELECT * FROM usuarios";
            $result = $mysqli->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['telefone'] . "</td>";
                echo "<td><a href='editar.php?id=" . $row['id'] . "'>Editar</a> | <a href='excluir.php?id=" . $row['id'] . "'>Excluir</a></td>";
                echo "</tr>";
            }

            $mysqli->close();
            ?>
        </tbody>
    </table>
    
    <a href="index.php">Voltar</a>
</body>
</html>
