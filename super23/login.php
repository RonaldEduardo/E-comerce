<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listas</title>
</head>
<body>
    <font size="5">
    <?php
    include("conexao.php");

    if ($_POST) {
        $LoginUsuario = $_POST["LoginUsuario"];
        $SenhaUsuario = $_POST["SenhaUsuario"];

        if (!$LoginUsuario || !$SenhaUsuario) {
            echo "É necessário digitar login e senha <br>";
        } else {
            $Query = "SELECT * FROM clientes WHERE ";
            $Query .= " Login='$LoginUsuario' AND ";
            $Query .= " Senha='$SenhaUsuario'";

            $Resultado = mysqli_query($ConexaoId, $Query);

            if ($Resultado) {
                $Registro = mysqli_fetch_array($Resultado);

                if (
                    $Registro['Login'] == $LoginUsuario &&
                    $Registro['Senha'] == $SenhaUsuario
                ) {
                    if ($Registro["Login"] == "admin" && $Registro["Senha"] == "123456") {
                        echo ("<type=text/java>");
                        echo "<br><a href='Adm/opcoes.html'> ~> Opções</a>";
                        echo ("</>");
                    } else {
                        echo "<br><a href='ver_produto.php'> ~> Produtos</a>";
                    }
                } else {
                    echo "<script> window.alert('SENHA OU LOGIN INCORRETOS')</script>";
                    require_once("login.html");
                }
            } else {
                echo "Erro na consulta: " . mysqli_error($ConexaoId);
            }
        }
    }
    ?>
    </font>
</body>
</html>
