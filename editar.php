<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare('UPDATE tbagenda SET nome = ?, telefone = ?, celular = ?, endereco = ?, email = ? WHERE id = ?');
    $stmt->execute([$nome, $telefone, $celular, $endereco, $email, $id]);

    header('Location: acesso_completo.php');
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM tbagenda WHERE id = ?');
$stmt->execute([$id]);
$dados = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <h2>Editar</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $dados['nome']; ?>" required><br><br>

        <label for="telefone"> Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $dados['telefone']; ?>" required><br><br>

        <label for="celular"> Celular:</label>
        <input type="text" name="celular" value="<?php echo $dados['celular']; ?>" required><br><br>

        <label for="endereco"> Endereço:</label>
        <input type="text" name="endereco" value="<?php echo $dados['endereco']; ?>" required><br><br>

        <label for="email"> Email:</label>
        <input type="text" name="email" value="<?php echo $dados['email']; ?>" required><br><br>

        <input type="submit" value="Editar">

    </form>
</body>

</html>