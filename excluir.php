<?php
require_once("Util/Conexao.php");
$con = Conexao::getConexao();

$excluido = $_GET['excluir'];

$sql = "DELETE FROM livros WHERE id=".$excluido;
$stm = $con->prepare($sql);
$stm->execute();
header("location: index.php");
