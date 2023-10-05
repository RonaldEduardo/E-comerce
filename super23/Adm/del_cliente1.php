<html>

<body>
  <?php
  if (isset($_POST['Excluir'])) {
    $CodCliente = $_POST["CodCliente"];
    $Nome = $_POST["Nome"];

    include("../conexao.php");

    // Usando uma consulta preparada para evitar injeção SQL
    $Query = "DELETE FROM CLIENTES WHERE CodCliente = ?";
    $stmt = mysqli_prepare($ConexaoId, $Query);

    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "s", $CodCliente);

      if (mysqli_stmt_execute($stmt)) {
        $linhasAfetadas = mysqli_stmt_affected_rows($stmt);

        if ($linhasAfetadas > 0) {
          echo "Cliente $Nome excluído com sucesso";
        } else {
          echo "Nenhum cliente foi excluído";
        }
      } else {
        echo "Não foi possível executar a exclusão do cliente";
      }

      mysqli_stmt_close($stmt);
    } else {
      echo "Não foi possível preparar a consulta";
    }

    mysqli_close($ConexaoId);
  }
  ?>
  <br>
  <button onclick="window.location.href='opcoes.html'">Opções do Administrador</button>
  <br>
  <button onclick="window.location.href='lista_cliente.php'">Lista Clientes</button>
</body>

</html>
