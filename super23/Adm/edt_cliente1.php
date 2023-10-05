<html>

<head>
    <title>Edição de Cliente</title>
</head>

<body>
    <?php
    include("../conexao.php");

    if (isset($_POST['Salvar'])) {
        $Nome = mysqli_real_escape_string($ConexaoId, $_POST["Nome"]);
        $Cidade = mysqli_real_escape_string($ConexaoId, $_POST["Cidade"]);
        $Estado = mysqli_real_escape_string($ConexaoId, $_POST["Estado"]);
        $Email = mysqli_real_escape_string($ConexaoId, $_POST["Email"]);
        $LoginUsuario = mysqli_real_escape_string($ConexaoId, $_POST["LoginUsuario"]);
        $SenhaUsuario = mysqli_real_escape_string($ConexaoId, $_POST["SenhaUsuario"]);
        $CodCliente = $_POST["CodCliente"];

        $Query = "UPDATE clientes SET Nome='$Nome',
              Cidade='$Cidade', Estado='$Estado',
              Email='$Email', Login='$LoginUsuario',
              Senha='$SenhaUsuario'
              WHERE CodCliente='$CodCliente'";

        $Resultado = mysqli_query($ConexaoId, $Query);

        if ($Resultado) {
            $linhasAfetadas = mysqli_affected_rows($ConexaoId);
            if ($linhasAfetadas > 0) {
                echo "Cliente $Nome alterado";
            } else {
                echo "Nenhum cliente foi alterado";
            }
        } else {
            echo "Não foi possível atualizar o cliente: " . mysqli_error($ConexaoId);
        }
    }
    ?>
    <br>
    <button onclick="window.location.href='opcoes.html'">Opções do Administrador</button>
    <br>
    <button onclick="window.location.href='lista_cliente.php'">Lista Clientes</button>

</body>

</html>
