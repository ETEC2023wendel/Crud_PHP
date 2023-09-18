<!DOCTYPE html>
<html>
<head>
    <title>CRUD em PHP</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Tela de Cadastro </h1>
    <h2>Vai Corinthians!!!!</h2>
    
    <!-- Link para a página de visualização -->
    <a href="visualizar.php">Ver Usuários Cadastrados</a>
    
    <!-- Formulário de Cadastro e Atualização -->
    <form id="userForm" action="cadastrar.php" method="POST">
        <input type="hidden" id="userId" name="userId">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required>
        <button type="submit">Salvar</button>
    </form>
    
    <!-- JavaScript -->
    <script src="js/script.js"></script>
</body>
</html>
