<?php
//padrão factory, onde tem somente um objeto conexao, não é necessário criar vários <- por isso usa o static.

class Conexao
{
    private static $conn = NULL;

    public static function getConexao()
    {
        if (self::$conn == null) 
        {
            $opcoes = array
            (
                //Define o charset da conexão 
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                //Define o tipo do erro como exceção
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                //Define o tipo do retorno das consultas
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );
            self::$conn = new PDO("mysql:host=localhost:3306;dbname=Livros","root", "bancodedados", $opcoes);//3306 é a porta do MySQL.
        }

        return self::$conn; //porque ele é um atributo da classe, não do objeto, por isso usa o self:: e não o $this.
    }
}