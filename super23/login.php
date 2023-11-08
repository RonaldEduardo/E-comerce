<?php
include("conexao.php");

function autenticarUsuario($conexao, $login, $senha)
{
    $stmt = $conexao->prepare("SELECT * FROM clientes WHERE Login=? AND Senha=?");
    $stmt->bind_param("ss", $login, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();
    return $resultado->fetch_assoc();
}

session_start();

if ($_POST) {
    $LoginUsuario = $_POST["LoginUsuario"];
    $SenhaUsuario = $_POST["SenhaUsuario"];

    if (!$LoginUsuario || !$SenhaUsuario) {
        echo "É necessário digitar login e senha <br>";
    } else {
        $registro = autenticarUsuario($ConexaoId, $LoginUsuario, $SenhaUsuario);

        if ($registro && $registro['Login'] == $LoginUsuario && $registro['Senha'] == $SenhaUsuario) {
            $_SESSION['CodCliente'] = $registro['CodCliente'];
            $_SESSION['NomeCliente'] = $registro['Nome'];

            if ($registro["Login"] == "admin" && $registro["Senha"] == "123456") {
                header("Location: Adm/opcoes.html");
                exit();
            } else {
                header("Location: Cliente/ver_produto.php");
                exit();
            }
        } else {
            echo "<script> window.alert('SENHA OU LOGIN INCORRETOS')</script>";
            require_once("login.html");
        }
    }
}
?>

