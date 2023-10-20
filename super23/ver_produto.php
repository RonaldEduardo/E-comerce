<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Produtos Para Compra</title>
  <link rel="stylesheet" href='css/lista.css'>
</head>

<body>
  <?php
  include('ListaVer.php');
  $CamposExibir = array("Nome, Valor, Categoria, Imagem");
  lista('PRODUTOS', $CamposExibir);
  ?>
  <br>
  <button onclick="window.location.href='login.php'">Voltar</button>
</body>

</html>
