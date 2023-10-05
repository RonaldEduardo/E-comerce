<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Opções do ADM</title>
</head>

<body>
  <?php
  function upperStr($str)
  { // Converte a primeira letra de cada palavra para maiúscula
    return ucfirst(strtolower($str));
  }

  include("../conexao.php");

  $query = "SELECT * FROM Produtos";
  $resultado = mysqli_query($ConexaoId, $query);
  $colunas = mysqli_num_fields($resultado);
  $LPP = 10;
  $total = mysqli_num_rows($resultado);
  $paginas = ceil($total / $LPP);

  print("<BR><font color=red><b> Produtos</b></font>
   <BR> <BR>");

  if (!isset($_GET['Pagina'])) {
    $pagina = 0;
  } else {
    $pagina = $_GET['Pagina'];
  }

  $inicio = $pagina * $LPP;
  $query = "SELECT * FROM Produtos LIMIT $inicio, $LPP";
  $resultado = mysqli_query($ConexaoId, $query);

  print("<center><TABLE Border = 1>");
  print("<TR>");
  print("<TH>CodProduto</TH><TH>Categoria</TH><TH>Nome</TH>
     <TH>Valor</TH> <TH>Editar</TH> <TH>Excluir</TH>");
  print("</TR>");

  while ($registros = mysqli_fetch_array($resultado)) {
    print("<TR>");
    $categoriaQuery = "SELECT * FROM Categorias where CodCategoria = '{$registros['Categoria']}'";
    $categoriaResult = mysqli_query($ConexaoId, $categoriaQuery);
    $categoria = mysqli_fetch_array($categoriaResult);

    for ($cont = 0; $cont < $colunas; $cont++) {
      if ($cont == 1) {
        print("<TD>{$categoria['CodCategoria']} - {$categoria['Descricao']}</TD>");
      } else {
        print("<TD>{$registros[$cont]}</TD>");
      }
    }

    print("<TD><a href='edt_produto.php?CodProduto={$registros['CodProduto']}'>{$registros['CodProduto']}</a></TD>");
    print("<TD><a href='del_produtos.php?CodProduto={$registros['CodProduto']}'>{$registros['CodProduto']}</a></TD>");
    print("</TR>");
  }
  print("</TABLE>");

  if ($pagina > 0) {
    $menos = $pagina - 1;
    $linkMenos = "opcoes.php?Pagina=$menos";
    print("<a href='$linkMenos'>Anterior</a>");
  }

  for ($cont = 1; $cont < $paginas; $cont++) {
    $link = "opcoes.php?Pagina=$cont";
    print(" | <a href='$link'>$cont</a>");
  }

  if ($pagina < $paginas - 1) {
    $mais = $pagina + 1;
    $linkMais = "opcoes.php?Pagina=$mais";
    print(" | <a href='$linkMais'>Próxima</a>");
  }

  ?>
  <a href='opcoes.html'>Opções Administrador</a>
</body>

</html>
