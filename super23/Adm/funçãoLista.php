<?php
function lista($Tabela, $CamposExibidos = array(), $CampoEditar = false, $CampoExcluir = false, $CampoValidar = false)
{
  include("../conexao.php");
  $CamposExibidosStr = empty($CamposExibidos) ? '*' : implode(", ", $CamposExibidos);

  $Query = "SELECT $CamposExibidosStr FROM $Tabela";

  $Resultado = mysqli_query($ConexaoId, $Query) or die("Não foi possível selecionar a Base");

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
  $Query = "SELECT $CamposExibidosStr FROM $Tabela LIMIT $Inicio, $LPP";
  $Resultado = mysqli_query($ConexaoId, $Query);

  // Imprime a abertura da tabela HTML
  print("<center><table border='1'>");

  // Imprime os cabeçalhos da tabela baseados nos campos exibidos
  print("<tr>");
  $Campos = explode(", ", $CamposExibidosStr);
  foreach ($Campos as $Campo) {
    print("<th>$Campo</th>");
  }
  if ($CampoEditar) {
    print("<th>Editar</th>");
  }
  if ($CampoExcluir) {
    print("<th>Excluir</th>");
  }
  if ($CampoValidar) {
    print("<th>Validar</th>");
  }
  print("</tr>");

  while ($Registros = mysqli_fetch_array($Resultado)) {
    print("<tr>");
    $IdCampo = $Campos[0]; // Pega a primeira string
    foreach ($Campos as $Campo) {
      print("<td>");
      if ($Campo === 'Login' || $Campo === 'Senha') {
        print($Registros[$Campo]);
      }
      if ($Campo === 'Imagem') {
        $caminho_imagem = $Registros['Imagem'];
        // Verifica se o valor do campo é um caminho de imagem
        print("<img src='$caminho_imagem' width='100' height='100'>");
      } else {
        // Se não for um campo de imagem, apenas exibe o valor
        print(ucwords(strtolower($Registros[$Campo])));
      }
      print("</td>");
    }

    $Tabela = strtolower($Tabela);

    if ($CampoEditar) {
      // Use o valor do primeiro campo para criar o link de editar
      print("<td><a href=edt_{$Tabela}.php?$IdCampo={$Registros[$IdCampo]}>Editar</a></td>");
    }
    if ($CampoExcluir) {
      // Use o valor do primeiro campo para criar o link de excluir
      print("<td><a href=del_{$Tabela}.php?$IdCampo={$Registros[$IdCampo]}>Excluir</a></td>");
    }
    if ($CampoValidar) {
      // Use o valor do primeiro campo para criar o link de validar
      print("<td><a href=validar_{$Tabela}.php?$IdCampo={$Registros[$IdCampo]}>Validar</a></td>");
    }

    print("</tr>");
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
}
?>
