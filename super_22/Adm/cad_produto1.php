<?php
include("../conexao.php");

if (isset($_POST["Salvar"])) {
  $Categoria = $_POST["categoria"];
  $Nome = $_POST["nome"];
  $Valor = $_POST["valor"];

  $Query = "INSERT INTO produtos (Nome, valor, Categoria) ";
  $Query .= "VALUES ('$Nome', '$Valor', '$Categoria')";


  $Resultado = mysqli_query($ConexaoId, $Query);

  if ($Resultado) {
    echo "Produto adicionado com sucesso!";
  } else {
    echo "Não foi possível cadastrar o produto: " . mysqli_error($ConexaoId);
  }
}

echo "<br><button onclick=window.location.href='./lista_produto.php'>Login</button>";
?>
