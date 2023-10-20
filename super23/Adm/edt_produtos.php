<html>
<head>
    <title>Edição de produto</title>
</head>
<body>
<?php
include("../conexao.php");
$CodProduto = isset($_GET['CodProduto']) ? mysqli_real_escape_string($ConexaoId, $_GET['CodProduto']) : '';
$Query = "SELECT * FROM produtos WHERE CodProduto = '$CodProduto'";
$resultado = mysqli_query($ConexaoId, $Query)
    or die("Não foi possível selecionar o produto");
$registro = mysqli_fetch_array($resultado);
?>
<form name="form1" method="post" action="edt_produto1.php" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Atualizar produtos</td>
            <td><input name="CodProduto" type="hidden" value="<?php echo $CodProduto; ?>"></td>
        </tr>
        <tr>
            <td>Nome:</td>
            <td><input name="Nome" id="Nome" type="text" value="<?php echo $registro['Nome']; ?>"></td>
        </tr>
        <tr>
            <td>Categoria:</td>
            <td>
                <select name="Categoria" id="Categoria">
                    <?php
                    $categoriaQuery = "SELECT * FROM categorias";
                    $categoriaResultado = mysqli_query($ConexaoId, $categoriaQuery);
                    while ($Categoria = mysqli_fetch_array($categoriaResultado)) {
                        $selected = ($Categoria["CodCategoria"] == $registro["Categoria"]) ? 'selected' : '';
                        echo "<option value='" . $Categoria["CodCategoria"] . "' $selected>" . $Categoria["CodCategoria"] . " - " . $Categoria["Descricao"] . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Valor:</td>
            <td><input name="Valor" id="Valor" type="text" value="<?php echo $registro['valor']; ?>"></td>
        </tr>
        <tr>
            <td><label for="produto_imagem">Imagem do Produto:</label></td>
            <td><input type="file" id="produto_imagem" name="produto_imagem" accept="image/*" required><br></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <input name="Salvar" id="salvar" type="submit" value="Salvar">
                <input name="Limpar" id="limpar" type="reset" value="Limpar">
            </td>
        </tr>
    </table>
</form>
<button onclick=window.location.href='./lista_produto.php'><-Volta</button>
</body>
</html>
