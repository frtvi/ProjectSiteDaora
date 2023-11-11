<?php
// Arquivo processa_formulario.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $idade = $_POST["idade"];
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $idlol = $_POST["idlol"];
    $containte = $_POST["containte"];

    // Conecte-se ao banco de dados Azure
    try {
        $conn = new PDO("sqlsrv:server = tcp:smurfarena22.database.windows.net,1433; Database = smurfarena", "viktro", "{victor270377@}");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insira os dados no banco de dados
        $stmt = $conn->prepare("INSERT INTO tabela (nome, email, telefone, idade, endereco, cidade, idlol, containte) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $email, $telefone, $idade, $endereco, $cidade, $idlol, $containte]);

        echo "Dados inseridos com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao conectar ao SQL Server: " . $e->getMessage();
    }
} else {
    echo "Método de requisição inválido.";
}
?>
