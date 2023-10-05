<html>
<body>

<?php
     include("..\conexao.php");


     $Nome = $_POST["Nome"];
     $Categoria = $_POST["Categoria"];
     $Valor = $_POST["Valor"];
     $CodProduto = $_POST["CodProduto"];

     $resultado = $_POST["Salvar"];
     if($_POST["Salvar"])
     {
     $query="UPDATE produtos SET Nome='$Nome', Categoria='$Categoria', Valor='$Valor'  WHERE CodProduto='$CodProduto'";
     $resultado = mysqli_query($ConexaoId, $query)
     or die ("n�o foi possivel atualizar");
     if ($resultado)
     {
     print("<BR>Produto $Nome alterado com sucesso");
     }
     }


?>
</body>
<br><button onclick=window.location.href='./lista_produto.php'>Login</button>

</html>
