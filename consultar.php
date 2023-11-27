<?php
$dsn = 'mysql:host=localhost;dbname=bdlogin0911';
$usuario = 'root';
$senha = '';

try {
    $pdo = new PDO($dsn, $usuario, $senha);
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['consultar'];
    $stmt = $pdo->prepare('SELECT * FROM tbagenda WHERE nome LIKE :nome');
    $stmt->bindValue(':nome', "%$nome%");
    $stmt->execute();

    while ($pessoa = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Nome: {$pessoa['nome']}<br>";
        echo "Telefone: {$pessoa['telefone']}<br>";
        echo "Celular: {$pessoa['celular']}<br>";
        echo "Endereço: {$pessoa['endereco']}<br>";
        echo "Email: {$pessoa['email']}<br>";
        echo "<hr>";
    }

    if (!$stmt->rowCount()) {
        echo "Usuário não encontrado.";
    }
}
?>