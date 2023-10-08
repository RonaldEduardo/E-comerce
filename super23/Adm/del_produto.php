<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Exclusão de Produto</title>
</head>

<body>
  <?php
  include("../conexao.php");

  if (isset($_GET['CodProduto'])) {
    $CodProduto = $_GET['CodProduto'];
    $Query = "SELECT * FROM PRODUTOS WHERE CodProduto='$CodProduto'";
    $Resultado = mysqli_query($ConexaoId, $Query);
    $Registro = mysqli_fetch_array($Resultado);
  } else {
    die("Código do produto não fornecido.");
  }

  if (isset($_POST['Excluir'])) {
    $CodProdutoExcluir = $_POST['$CodProduto'];

    $QueryExcluir = "DELETE FROM PRODUTOS WHERE CodProduto='$CodProdutoExcluir'";
    $ResultadoExcluir = mysqli_query($ConexaoId, $QueryExcluir);

    if ($ResultadoExcluir) {
      echo "Produto excluído com sucesso.";
    } else {
      echo "Erro ao excluir o produto.";
    }
  }
  ?>

  <form name="form1" method="POST" action="del_produto1.php">
    <table width="75%" border="0" align="center" cellpadding="1" cellspacing="3">
      <tr>
        <td colspan="2">
          <div align="center">Exclusão de Produtos</div>
        </td>
      </tr>
      <tr>
        <td width="50%" align="right">Código:</td>
        <td width="50%"><input name="CodProduto" type="text" id="CodProduto" value="<?php echo $CodProduto; ?>"
            readonly="true"></td>
      </tr>
      <tr>
        <td width="50%" align="right">Nome:</td>
        <td width="50%"><input name="Nome" type="text" id="Nome" value="<?php echo $Registro['Nome']; ?>"></td>
      </tr>
      <tr>
        <td width="50%" align="right">Ação:</td>
        <td width="50%">
          <input name="Excluir" type="submit" id="excluir" value="Excluir">
          <input type="button" value="Voltar" onclick="window.location='lista_produto.php'">
        </td>
      </tr>
    </table>
  </form>
  <button onclick=window.location.href='./lista_produto.php'><-Volta</button>
</body>

</html>
