<?php
include("../conexao.php");

if (isset($_POST["Salvar"])) {
    $Nome = $_POST["Nome"];
    $Cidade = $_POST["Cidade"];
    $Estado = $_POST["Estado"];
    $Email = $_POST["Email"];
    $LoginUsuario = $_POST["LoginUsuario"];
    $SenhaUsuario = $_POST["SenhaUsuario"];

    $Query = "INSERT INTO clientes (Nome, Cidade, Estado, Email, Login, Senha) ";
    $Query .= "VALUES ('$Nome', '$Cidade', '$Estado', '$Email', '$LoginUsuario', '$SenhaUsuario')";

    $Resultado = mysqli_query($ConexaoId, $Query);

    if ($Resultado) {
        echo "Cliente adicionado com sucesso!";
    } else {
        echo "Não foi possível cadastrar o cliente: " . mysqli_error($ConexaoId);
    }
}

echo "<br><button onclick=window.location.href='./lista_cliente.php'>Login</button>
";
?>
