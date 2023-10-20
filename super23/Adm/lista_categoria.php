<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Lista de Categoria</title>
  <link rel="stylesheet" href="../css/lista.css">
</head>

<body>
  <?php
  include("funçãoLista.php");
  $CamposExibir = array("CodCategoria, Descricao");
  lista('CATEGORIAS', $CamposExibir, true, true, false);
  ?>
  <br>
  <button onclick="window.location.href='opcoes.html'">Opções do Administrador</button>
</body>

</html>
