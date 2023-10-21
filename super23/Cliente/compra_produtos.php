<html>
<head>
    <title>Compra do produto</title>
</head>
<body>
<?php
include("../conexao.php");
$CodProduto = isset($_GET['CodProduto']) ? mysqli_real_escape_string($ConexaoId, $_GET['CodProduto']) : '';
$Query = "SELECT * FROM produtos WHERE CodProduto = '$CodProduto'";
$resultado = mysqli_query($ConexaoId, $Query)
  or die("Não foi possível selecionar o produto");
$registro = mysqli_fetch_array($resultado);

$categoriaQuery = "SELECT * FROM categorias";
$categoriaResultado = mysqli_query($ConexaoId, $categoriaQuery);
$categoria = mysqli_fetch_array($categoriaResultado);


?>
<form name="form1" method="post" action="compra_produtos1.php" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Comprar item</td>
            <td><input name="CodProduto" type="hidden" value="<?php echo $CodProduto; ?>"></td>
        </tr>
        <tr>
            <td>Nome:</td>
            <td><input name="Nome" id="Nome" type="text" readonly="true" value="<?php echo $registro['Nome']; ?>"></td>
        </tr>
        <tr>
            <td>Categoria:</td>
            <td>
               <input name="Nome" id="Nome" type="text" readonly="true" value="<?php echo $registro['Categoria'] . ' - ' . $categoria['Descricao']; ?>">
            </td>
        </tr>
        <tr>
            <td>Valor:</td>
            <td><input name="Valor" id="Valor" type="text" readonly="true" value="<?php echo $registro['valor']; ?>"></td>
        </tr>
        <tr>
          <td>
            <img src='<?php echo $registro['imagem']; ?>' width='100' height='100'>
          </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <input name="Compra" id="Compra" type="submit" value="Compra">
                <input name="Adicionar" id="Adicionar" type="submit" value="Adicionar ao carrinho">
            </td>
        </tr>

    </table>
</form>
<button onclick="window.location.href='./ver_produto.php'">Voltar</button>
</body>
</html>
