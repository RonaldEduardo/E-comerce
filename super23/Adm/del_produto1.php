<html>

<body>
  <?php
  if (isset($_POST['Excluir'])) {
    $CodProduto = $_POST["CodProduto"];
    $Nome = $_POST["Nome"];

    include("../conexao.php");

    $Query = "DELETE FROM PRODUTOS WHERE CodProduto = '$CodProduto'";

    if (mysqli_query($ConexaoId, $Query)) {
      $linhasAfetadas = mysqli_affected_rows($ConexaoId);

      if ($linhasAfetadas > 0) {
        echo "Produto $Nome excluído com sucesso";
      } else {
        echo "Nenhum produto foi excluído";
      }
    } else {
      echo "Não foi possível executar a exclusão do produto";
    }

    mysqli_close($ConexaoId);
  }
  ?>
  <br>
  <button onclick="window.location.href='opcoes.html'">Opções do Administrador</button>
  <br>
  <button onclick="window.location.href='lista_produto.php'">Lista Produtos</button>
</body>

</html>
