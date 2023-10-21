<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Produtos Para Compra</title>
  <link rel="stylesheet" href='../css/lista.css'>
</head>

<body>
  <?php
  print("<h1>CU</h1>");
  include("../Adm/funçãoLista.php");
  $CamposExibir = array("CodProduto, Nome, Valor, Categoria, Imagem");
  lista('PRODUTOS', $CamposExibir, false, false, false, true);
  ?>
  <br>
  <button onclick="window.location.href='login.php'">Voltar</button>
</body>

</html>
