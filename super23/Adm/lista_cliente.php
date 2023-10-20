<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./lista.css">
  <title>Lista de clientes</title>
</head>

<body>

  <?php
  function upperStr($str)
  { // Converte a primeira letra de cada palavra para maiúscula
    return ucfirst(strtolower($str));
  }
  include("funçãoLista.php");
  $CamposExibir = array("CodCliente, Nome, Cidade, Estado, Email, Login, Senha, Validado");
  lista('CLIENTES', $CamposExibir, true, true, true)

    ?>

  <br><button onclick="window.location.href='opcoes.html'">Opções do Administrador</button>

</body>

</html>
