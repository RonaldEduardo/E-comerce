<?php
include("../conexao.php");
date_default_timezone_set('America/Sao_Paulo');



$Carrinho = array(

);

if (isset($_POST['Compra'])) {
  $Quantidade = $_POST['Quantidade'];
  $ValorTotal = $_POST['Valor'] * $Quantidade;
  $CodCliente = $_POST['CodCliente'];
  $CodProduto = $_POST['CodProduto'];
  $DataAtual = date("Y-m-d");
  $HoraAtual = date("H:i:s");
  $NomeProduto = $_POST["Nome"];

  $Query = "INSERT INTO compras (DataCompra, ValorTotal, CodCliente, CodProduto, Quantidade, HoraCompra) ";
  $Query .= "VALUES ('$DataAtual', '$ValorTotal', '$CodCliente', '$CodProduto', '$Quantidade', '$HoraAtual')";

  $resultado = mysqli_query($ConexaoId, $Query);

  if ($resultado) {
    echo "Compra de " . $Quantidade . " " . $NomeProduto . " realizada com sucesso";
  } else {
    echo "Erro ao realizar a compra. Detalhes do erro: " . mysqli_error($ConexaoId);
  }
}

if (isset($_POST['Adicionar'])) {
  $Produto = $_POST['$CodProduto'];
  $Nome = $_POST['Nome'];


}
?>
