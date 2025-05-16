<?php

require_once("Util/Conexao.php");
$con = Conexao::getConexao();

//print_r($con);

$sql = "SELECT * FROM livros";
$stm = $con->prepare($sql);
$stm->execute();
$livros = $stm->fetchAll();



if (isset($_POST["titulo"])) 
{

    //obter os valores digitados pelo usuário.
    $titulo = $_POST["titulo"];
    $genero = $_POST["genero"];
    $numPaginas = $_POST["paginas"];

    $sql = "INSERT INTO livros(titulo, genero, qtd_paginas) VALUES (?,?,?)";
    $stm = $con->prepare($sql);
    $stm->execute([$titulo,$genero,$numPaginas]);
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
</head>
<body>
    <h1>Listagem dos livros</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Gênero</th>
            <th>NumPáginas</th>
        </tr>
        <?php
        foreach ($livros as $l)
        {
            print <<<TEST
                <tr>
                    <td>{$l['id']}</td>
                    <td>{$l['titulo']}</td>
                    <td>{$l['genero']}</td>
                    <td>{$l['qtd_paginas']}</td>
                </tr>
            TEST;
        } 
        ?>
    </table>

    <h1>Formulário</h1>

    <form action="" method="post">
        <div style="margin-block-end: 15px;">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo">
        </div>
        <div style="margin-block-end: 15px;">
            <label for="genero">Gênero:</label>
            <select name="genero" id="genero">
                <option value="">--</option>
                <option value="D">Drama</option>
                <option value="F">Ficção</option>
                <option value="R">Romance</option>
                <option value="O">Outro</option>
            </select>
        </div>
        <div style="margin-block-end: 15px;">
            <label for="paginas">Num de Páginas:</label>
            <input type="number" name="paginas" id="paginas">
        </div>
        <div style="margin-block-end: 15px;">
            <button type="submit">Enviar</button>
        </div>
    </form>
</body>
</html>
