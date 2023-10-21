<?php
include("../conexao.php");



$Carrinho = array(

);

if (isset($_POST['Compra'])) {
  print("compra realizada");
}
if (isset($_POST['Adicionar'])) {
  $Produto = $_POST['$CodProduto'];
  $Nome = $_POST['Nome'];


}
?>
