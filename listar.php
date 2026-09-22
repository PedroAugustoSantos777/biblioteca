
<?php

require "config.php";

$sql = "SELECT * FROM Livros
        ORDER BY anoPublicacao DESC";

$stmt = $con->query($sql);

$livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Lista de Livros</title>

    <style>

        body {

            font-family: Arial, sans-serif;

            margin: 30px;

        }

        h1 {

            text-align: center;

        }

        table {

            width: 100%;

            border-collapse: collapse;

        }

        th, td {

            border: 1px solid black;

            padding: 10px;

            text-align: left;

        }

        th {

            background-color: lightgray;

        }

        tr:nth-child(even) {

            background-color: #f2f2f2;

        }

    </style>

</head>

<body>

    <h1>Livros Cadastrados</h1>

    <table>

        <tr>

            <th>ID</th>

            <th>Autor</th>

            <th>Descrição</th>

            <th>Ano de Publicação</th>

        </tr>

        <?php foreach ($livros as $livro): ?>

        <tr>

            <td>
                <?php echo $livro["id"]; ?>
            </td>

            <td>
                <?php echo htmlspecialchars($livro["autorLivro"]); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($livro["descricaoLivro"]); ?>
            </td>

            <td>
                <?php echo $livro["anoPublicacao"] ?? "Não informado"; ?>
            </td>

        </tr>

        <?php endforeach; ?>

    </table>

    <br>

    <a href="../front/index.html">
        Voltar para cadastro
    </a>

</body>

</html>