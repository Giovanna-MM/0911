<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION))
    session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['login'])) {
    //Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta para o login
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso</title>
</head>

<body>
    <h1>Acesso Restrito</h1><br>
    <h1>Consulta de Usuários</h1><br>

    <table>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Endereço</th>
            <th>E-mail</th>
        </tr>

        <?php
        include('conn.php');

        $stmt = $pdo->query('SELECT * FROM tbagenda');

        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>{$row['nome']}</td>";
            echo "<td>{$row['telefone']}</td>";
            echo "<td>{$row['celular']}</td>";
            echo "<td>{$row['endereco']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br><br>
    <form method="POST" action="consultar.php">
        <label for="consultar">Consultar pelo Nome:</label>
        <input type="text" name="consultar" id="consultar" required>

        <button type="submit">Consultar</button><br><br>
    </form>

</body>

</html>