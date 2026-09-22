
<?php

require "config.php";

header("Content-Type: text/plain; charset=UTF-8");

function create($con) {

    $dados = json_decode(file_get_contents("php://input"), true);

    $autorLivro = $dados["autorLivro"] ?? "";
    $descricaoLivro = $dados["descricaoLivro"] ?? "";
    $anoPublicacao = $dados["anoPublicacao"] ?? null;

    if ($autorLivro == "" || $descricaoLivro == "") {

        echo "Preencha todos os campos obrigatórios.";

        return;

    }

    $sql = "INSERT INTO Livros
            (autorLivro, descricaoLivro, anoPublicacao)
            VALUES
            (:autorLivro, :descricaoLivro, :anoPublicacao)";

    $stmt = $con->prepare($sql);

    $stmt->bindValue(":autorLivro", $autorLivro);
    $stmt->bindValue(":descricaoLivro", $descricaoLivro);
    $stmt->bindValue(":anoPublicacao", $anoPublicacao);

    if ($stmt->execute()) {

        echo "Livro cadastrado com sucesso!";

    } else {

        echo "Erro ao cadastrar livro.";

    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    create($con);

}

?>