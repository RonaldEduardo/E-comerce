<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Validação do Cliente</title>
</head>
<body>
    <?php
    include("../conexao.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Validado = $_POST["Validado"];
        $CodCliente = $_POST["CodCliente"];
    } else {
        $CodCliente = htmlspecialchars($_GET["CodCliente"]);
    }

    $Query = "SELECT * FROM Clientes WHERE CodCliente='$CodCliente'";
    $Resultado = mysqli_query($ConexaoId, $Query) or die("Não foi possível selecionar o usuário");
    $Registro = mysqli_fetch_array($Resultado);
    print("O Email é $Registro[Email]");
    ?>

    <form name="form1" method="post" action="validar_clientes.php">
        <table width="75%" border="0" align="center" cellpadding="1" cellspacing="3">
            <tr>
                <td width="50%" align="right">Código:</td>
                <td width="50%">
                    <input name="CodCliente" id="CodCliente" readonly="true"
                        value="<?php echo $Registro["CodCliente"]; ?>">
                </td>
            </tr>
            <tr>
                <td width="50%" align="right">Nome:</td>
                <td width="50%">
                    <input name="Nome" type="text" id="Nome" readonly="true" value="<?php echo $Registro["Nome"]; ?>">
                </td>
            </tr>
            <tr>
                <td width="50%" align="right">Cidade:</td>
                <td>
                    <input name="Cidade" type="text" id="Cidade" readonly="true"
                        value="<?php echo $Registro["Cidade"]; ?>">
                </td>
            </tr>
            <tr>
                <td width="50%" align="right">Estado:</td>
                <td>
                    <select name="Estado" id="Estado">
                        <option value="SC" <?php echo ($Registro["Estado"] == 'SC') ? 'selected' : ''; ?>>SC</option>
                        <option value="PR" <?php echo ($Registro["Estado"] == 'PR') ? 'selected' : ''; ?>>PR</option>
                        <option value="RS" <?php echo ($Registro["Estado"] == 'RS') ? 'selected' : ''; ?>>RS</option>
                        <option value="SP" <?php echo ($Registro["Estado"] == 'SP') ? 'selected' : ''; ?>>SP</option>
                        <option value="RJ" <?php echo ($Registro["Estado"] == 'RJ') ? 'selected' : ''; ?>>RJ</option>
                        <option value="MG" <?php echo ($Registro["Estado"] == 'MG') ? 'selected' : ''; ?>>MG</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="50%" align="right">E-mail:</td>
                <td>
                    <input name="Email" type="text" id="Email" readonly="true"
                        value="<?php echo $Registro["Email"]; ?>">
                </td>
            </tr>
            <tr>
                <td width="50%" align="right">Login:</td>
                <td>
                    <input name="LoginUsuario" type="text" id="Login" readonly="true"
                        value="<?php echo $Registro["Login"]; ?>">
                </td>
            </tr>
            <tr>
                <td width="50%" align="right">Senha:</td>
                <td>
                    <input name="SenhaUsuario" type="text" id="Senha" readonly="true"
                        value="<?php echo $Registro["Senha"]; ?>">
                </td>
            </tr>
            <tr>
                <td width="50%" align="right">Validar(Sim)/Desvalidar(Não):</td>
                <td>
                    <select Name="Validado" ID="Validado">
                        <?php
                        $ValAux = $Registro["Validado"];
                        if ($ValAux == 0) {
                            print("<option Value='S' CHECKED> Sim </option>");
                            print("<option Value='N'>Não</option>");
                        } else if ($ValAux == 1) {
                            print("<option Value='N' CHECKED>Não</option>");
                            print("<option Value='S'>Sim</option>");
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">&nbsp;</td>
                <td>
                    <input name="Validar" type="submit" id="Validar" value="Validar">
                    <input name="Limpar" type="reset" id="Limpar" value="Limpar">
                </td>
            </tr>
        </table>
    </form>
    <?php
    function validado($Valor)
    {
        if ($Valor == 0) {
            return ('n');
        } else {
            return ('s');
        }
    }

    // isset testa se o elemento é nulo, aqui usado para testar qual
    // submit foi clicado
    if (isset($_POST["Validar"])) {
        $Validado = $_POST["Validado"];
        if ($Validado == 's' || $Validado == 'S') {
            $Query = "UPDATE Clientes SET Validado='1' WHERE CodCliente='$CodCliente'";
        } else if ($Validado == 'n' || $Validado == 'N') {
            $Query = "UPDATE Clientes SET Validado='0' WHERE CodCliente='$CodCliente'";
        }
        $Resultado = mysqli_query($ConexaoId, $Query) or die("Não foi possível atualizar os dados");

        if ($Resultado) {
            if ($Validado == 'S') {
                echo "<BR>Cliente Validado<br>";
            } else {
                echo "<BR>Cliente Desabilitado<br>";
            }
        }
    }
    ?>
    <button onclick="window.location.href='lista_cliente.php'"><-Voltar</button>
</body>
</html>
