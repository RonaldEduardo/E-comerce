<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exclusão de Clientes</title>
</head>
<body>
<?php
include("../conexao.php");

if (isset($_GET['CodCliente'])) {
    $CodCliente = $_GET['CodCliente'];
    $Query = "SELECT * FROM CLIENTES WHERE CodCliente='$CodCliente'";
    $Resultado = mysqli_query($ConexaoId, $Query);
    $Registro = mysqli_fetch_array($Resultado);
} else {
    die("Código do cliente não fornecido.");
}

if (isset($_POST['Excluir'])) {
    $CodClienteExcluir = $_POST['CodCliente'];

    $QueryExcluir = "DELETE FROM CLIENTES WHERE CodCliente='$CodClienteExcluir'";
    $ResultadoExcluir = mysqli_query($ConexaoId, $QueryExcluir);

    if ($ResultadoExcluir) {
        echo "Cliente excluído com sucesso.";
    } else {
        echo "Erro ao excluir o cliente.";
    }
}
?>

<form name="form1" method="POST" action="del_cliente1.php">
    <table width="75%" border="0" align="center" cellpadding="1" cellspacing="3">
        <tr>
            <td colspan="2">
                <div align="center">Exclusão de Clientes</div>
            </td>
        </tr>
        <tr>
            <td width="50%" align="right">Código:</td>
            <td width="50%"><input name="CodCliente" type="text" id="CodCliente"
                                    value="<?php echo $CodCliente; ?>" readonly="true"></td>
        </tr>
        <tr>
            <td width="50%" align="right">Nome:</td>
            <td width="50%"><input name="Nome" type="text" id="Nome"
                                    value="<?php echo $Registro['Nome']; ?>"></td>
        </tr>
        <tr>
            <td width="50%" align="right">Ação:</td>
            <td width="50%">
                <input name="Excluir" type="submit" id="excluir" value="Excluir">
                <input type="button" value="Voltar" onclick="window.location='lista_cliente.php'">
            </td>
        </tr>
    </table>
</form>
<a href="./lista_cliente.php"><-Voltar</a>
</body>
</html>
