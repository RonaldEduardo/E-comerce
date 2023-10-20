<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Clientes</title>
</head>
<body>
<?php
     include("../conexao.php");
     $CodCliente = $_GET['CodCliente'];
     $Query = "SELECT * FROM CLIENTES WHERE
               CodCliente = '$CodCliente'";
     $Resultado = mysqli_query($ConexaoId, $Query)
     or die ("Não foi possível selecionar o usuário!");

     $Registro = mysqli_fetch_array($Resultado);
?>

<FORM NAME="form1" METHOD="POST" ACTION="edt_cliente1.php">
  <TABLE WIDTH="75%" BORDER="0" ALIGN="CENTER" CELLPADDING="1" CELLSPACING="3">
	<TR align="center">
		<TD colspan="2">Atualizar Cliente</TD>
		<TD><INPUT NAME="CodCliente" type="hidden" VALUE="<?php echo $CodCliente; ?>"></TD>
	</TR>
	<TR>
		<TD WIDTH="50%" ALIGN="RIGHT">Nome:</TD>
		<TD WIDTH="50%"><INPUT NAME="Nome" ID="Nome" type="text" VALUE="<?php echo $Registro['Nome']; ?>"></TD>
	</TR>
	<TR>
		<TD WIDTH="50%" ALIGN="RIGHT">Cidade:</TD>
		<TD WIDTH="50%"><INPUT NAME="Cidade" ID="Cidade" type="text" VALUE="<?php echo $Registro['Cidade']; ?>"></TD>
	</TR>
	<TR>
		<TD WIDTH="50%" ALIGN="RIGHT">Estado:</TD>
		<TD WIDTH="50%">
            <select NAME="Estado" ID="Estado">
                <option value="SC" <?php if ($Registro['Estado'] == 'SC') echo 'selected'; ?>>SC</option>
                <option value="PR" <?php if ($Registro['Estado'] == 'PR') echo 'selected'; ?>>PR</option>
                <option value="RS" <?php if ($Registro['Estado'] == 'RS') echo 'selected'; ?>>RS</option>
                <option value="SP" <?php if ($Registro['Estado'] == 'SP') echo 'selected'; ?>>SP</option>
                <option value="RJ" <?php if ($Registro['Estado'] == 'RJ') echo 'selected'; ?>>RJ</option>
                <option value="MG" <?php if ($Registro['Estado'] == 'MG') echo 'selected'; ?>>MG</option>
            </select>
        </TD>
	</TR>
	<TR>
		<TD WIDTH="50%" ALIGN="RIGHT">Email:</TD>
		<TD WIDTH="50%"><INPUT NAME="Email" ID="Email" type="text" VALUE="<?php echo $Registro['Email']; ?>"></TD>
	</TR>
	<TR>
		<TD WIDTH="50%" ALIGN="RIGHT">Login:</TD>
		<TD WIDTH="50%"><INPUT NAME="LoginUsuario" ID="Login" type="text" VALUE="<?php echo $Registro['Login']; ?>"></TD>
	</TR>
	<TR>
		<TD WIDTH="50%" ALIGN="RIGHT">Senha:</TD>
		<TD WIDTH="50%"><INPUT NAME="SenhaUsuario" ID="Senha" type="password" VALUE="<?php echo $Registro['Senha']; ?>"></TD>
	</TR>
	<TR>
		<TD ALIGN="RIGHT">&nbsp;</TD>
		<TD WIDTH="50%">
			<INPUT NAME="Salvar" TYPE="SUBMIT" ID="Salvar" VALUE="Atualizar">
			<INPUT NAME="Limpar" TYPE="RESET" ID="LIMPAR" VALUE="Limpar">
		</TD>
	</TR>
  </TABLE>
</FORM>
<a href="./lista_cliente.php"><-Voltar</a>
</body>
</html>
