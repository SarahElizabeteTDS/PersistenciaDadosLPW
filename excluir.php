<?php
require_once("util/Conexao.php");
$con = Conexao::getConexao();

$excluido = $_GET['id'];

$sql = "DELETE FROM livros WHERE id=".$excluido;
$stm = $con->prepare($sql);
$stm->execute();
header("location: index.php");
