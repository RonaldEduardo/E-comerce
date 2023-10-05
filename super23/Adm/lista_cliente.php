<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de clientes</title>
</head>

<body>

  <?php
  function upperStr($str)
  { // Converte a primeira letra de cada palavra para maiúscula
    return ucfirst(strtolower($str));
  }

  include("../conexao.php");

  $Query = "SELECT * FROM CLIENTES ";

  $Resultado = mysqli_query($ConexaoId, $Query)
    or die("Não foi possível selecionar a Base");

  $Colunas = mysqli_num_fields($Resultado); //TOTAL DE CAMPOS DO BD
  $Total = mysqli_num_rows($Resultado); //total de registros do BD

  $LPP = 10; // Linhas por página
  $Paginas = ceil($Total / $LPP);

  if (!isset($_GET['Pagina'])) {
    $Pagina = 0;
  } else {
    $Pagina = $_GET['Pagina'];
  }

  $Inicio = $Pagina * $LPP;
  $Query = "SELECT * FROM Clientes LIMIT $Inicio, $LPP";
  $Resultado = mysqli_query($ConexaoId, $Query);

  print("<center><TABLE Border = 1>");
  print("<TR>");
  print("<TH>Código</TH><TH>Nome</TH><TH>Cidade</TH>
     <TH>Estado</TH><TH>E-mail</TH><TH>Login</TH>
     <TH>Senha</TH><TH>Validado</TH><TH>Validar</TH>
     <TH>Editar</TH><TH>Excluir</TH>");
  print("</TR>");

  while ($Registros = mysqli_fetch_array($Resultado)) {
    print("<TR>");
    for ($Cont = 0; $Cont < $Colunas; $Cont++) {
      if ($Cont == 1 || $Cont == 2) {
        print("<TD><font color=blue>" . upperStr($Registros[$Cont]) . "</font></TD>");
      } else {
        print("<TD><font color=blue>{$Registros[$Cont]}</font></TD>");
      }
    }
    print("<TD><a href=validar_cliente.php?CodCliente={$Registros[0]}>{$Registros[0]}</a></TD>");
    print("<TD><a href=edt_cliente.php?CodCliente={$Registros['CodCliente']}>{$Registros['CodCliente']}</a></TD>");
    print("<TD><a href=del_cliente.php?CodCliente={$Registros['CodCliente']}>{$Registros['CodCliente']}</a></TD>");
    print("</TR>");
  }
  print("</table>");

  // fazendo navegação entre as páginas dos clientes
  if ($Pagina > 0) {
    $Menos = $Pagina - 1;
    $Link = "$_SERVER[PHP_SELF]?Pagina=$Menos";
    print("<a href=$Link>Anterior</a>");
  }
  for ($Cont = 0; $Cont < $Paginas; $Cont++) {
    $Link = "$_SERVER[PHP_SELF]?Pagina=$Cont";
    $numpage = ($Cont + 1);
    print(" | <a href=$Link>$numpage</a>");
  }
  if ($Pagina < $Paginas - 1) {
    $Mais = $Pagina + 1;
    $Link = "$_SERVER[PHP_SELF]?Pagina=$Mais";
    print(" | <a href=$Link>Próxima</a>");
  }
  ?>

  <br><button onclick="window.location.href='opcoes.html'">Opções do Administrador</button>

</body>

</html>
