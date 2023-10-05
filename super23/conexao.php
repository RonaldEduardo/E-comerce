<?php
$Host = "localhost";
$Usuario = "root";
$Senha = "";
$Banco = "banco";

// Conectar usando MySQLi
$ConexaoId = mysqli_connect($Host, $Usuario, $Senha, $Banco);

// Verificar a conexão
if (!$ConexaoId) {
    die("Não foi possível conectar ao SGBDR: " . mysqli_connect_error());
}

// Selecionar o banco de dados
$BancoDados = mysqli_select_db($ConexaoId, $Banco);
if (!$BancoDados) {
    die("Não foi possível selecionar o banco de dados: " . mysqli_error($ConexaoId));
}
?>
