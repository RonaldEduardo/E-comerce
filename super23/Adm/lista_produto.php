<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
</head>

<body>
    <?php
    function upperStr($str)
    {// Converte a primeira letra de cada palavra para maiúscula
        return ucfirst(strtolower($str));
    }

    include("../conexao.php");
    $Query = "SELECT * FROM Produtos";
    $Resultado = mysqli_query($ConexaoId, $Query) or die("Não foi possível selecionar a base");
    $Colunas = mysqli_num_fields($Resultado);
    $LPP = 10;
    $Total = mysqli_num_rows($Resultado);
    $Paginas = ceil($Total / $LPP);

    print("<BR><font color=red><b> Produtos</b></font><BR> <BR>");

    if (!isset($Pagina)) {
        $Pagina = isset($_GET['Pagina']) ? (int) $_GET['Pagina'] : 0;
    }

    $Inicio = $Pagina * $LPP;
    $Query = "SELECT * FROM Produtos LIMIT $Inicio, $LPP";
    $Resultado = mysqli_query($ConexaoId, $Query);

    print("<center><TABLE Border = 1>");
    print("<TR>");
    print("<TH>CodProduto</TH><TH>Categoria</TH><TH>Nome</TH><TH>Valor</TH><TH>Editar</TH><TH>Excluir</TH>");
    print("</TR>");

    while ($Registros = mysqli_fetch_array($Resultado)) {
        print("<TR>");
        $SQL = "SELECT * FROM Categorias where CodCategoria ='$Registros[Categoria]'";
        $Result = mysqli_query($ConexaoId, $SQL);
        $Categoria = mysqli_fetch_array($Result);

        // Use os índices corretos para os campos Nome e Valor
        print("<TD>$Registros[CodProduto]</TD>");
        print("<TD>$Categoria[CodCategoria] - $Categoria[Descricao]</TD>");
        print("<TD>" . upperStr($Registros['Nome']) . "</TD>");
        print("<TD>$Registros[valor]</TD>");
        print("<TD><a href=edt_produto.php?CodProduto=$Registros[CodProduto]>$Registros[CodProduto]</a></TD>");
        print("<TD><a href=del_produto.php?CodProduto=$Registros[CodProduto]>$Registros[CodProduto]</a></TD>");
        print("</TR>");
    }

    print("</TABLE>");

    if ($Pagina > 0) {
        $Menos = $Pagina - 1;
        $Link = "$_SERVER[PHP_SELF]?Pagina=$Menos";
        print("<a href=$Link<Anterior</a>");
    }

    for ($Cont = 1; $Cont <= $Paginas; $Cont++) {
        $Link = "$_SERVER[PHP_SELF]?Pagina=$Cont";
        print(" | <a href=$Link>$Cont</a>");
    }

    if ($Pagina < $Paginas - 1) {
        $Mais = $Pagina + 1;
        $Link = "$_SERVER[PHP_SELF]?Pagina=$Mais";
        print(" | <a href=$Link>Proxima</a>");
    }
    ?>
    <br>
    <button onclick="window.location.href='opcoes.html'">Opções do Administrador</button>
</body>

</html>
