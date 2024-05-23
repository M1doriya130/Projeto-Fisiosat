<?php 
$hostname = 'localhost';
$bancodedados = 'fisiosat';
$usuario = 'root';
$senha = '';

$conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);

if ($conexao->connect_errno)
{
    echo "Não foi possível conectar";
}

?>