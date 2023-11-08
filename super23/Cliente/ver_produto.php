<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Produtos Para Compra</title>
  <link rel="stylesheet" href='../css/lista.css'>
</head>

<body>
  <?php
  session_start();

  // Agora você pode acessar as variáveis de sessão
  $NomeCliente = $_SESSION['CodCliente'];
  $CodCliente = $_SESSION['NomeCliente'];

  print("
  <table>
    <tr>
      <td>Nome:</td>
      <td><input name='Nome' id='Nome' type='text' readonly='true' value='$NomeCliente'>
      </td>
      <td>Código:</td>
      <td><input name='Codigo' id='Codigo' type='text' readonly='true' value='$CodCliente'>
      </td>
    </tr>
  </table>
  ");

  include("../Adm/funçãoLista.php");
  $CamposExibir = array("CodProduto, Nome, Valor, Categoria, Imagem");
  lista('PRODUTOS', $CamposExibir, false, false, false, true);
  ?>
  <br>
  <button onclick="window.location.href='login.php'">Voltar</button>
</body>

</html>
