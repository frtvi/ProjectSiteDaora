<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Conecta ao banco de dados
    $servername = "https://154.49.246.96:8090";
    $username = "admin";
    $password = "Victor270377@";
    $dbname = "smurfarena";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Coleta os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $idade = $_POST["idade"];
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $idlol = $_POST["idlol"];
    $containte = $_POST["containte"];

    // Insere os dados no banco de dados
    $sql = "INSERT INTO tabela_contatos (nome, email, telefone, idade, endereco, cidade, idlol, containte) VALUES ('$nome', '$email', '$telefone', '$idade', '$endereco', '$cidade', '$idlol', '$containte')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
