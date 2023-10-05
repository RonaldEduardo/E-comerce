<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Cadastro de Produto</title>
</head>

<body>
  <h2>Cadastro de Produto</h2>

  <form action="Adm/cad_produto1.php" method="POST">
    <label for="categoria">Categoria:</label>
    <select name="categoria" id="categoria">
      <?php
      include("./conexao.php");
      $categoriaQuery = "SELECT * FROM categorias";
      $categoriaResultado = mysqli_query($ConexaoId, $categoriaQuery);
      while ($Categoria = mysqli_fetch_array($categoriaResultado)) {
        $selected = ($Categoria["CodCategoria"] == $registro["Categoria"]) ? 'selected' : '';
        echo "<option value='" . $Categoria["CodCategoria"] . "' $selected>" . $Categoria["CodCategoria"] . " - " . $Categoria["Descricao"] . "</option>";
      }
      ?>
    </select>

    <br>

    <label for="nome">Nome do Produto:</label>
    <input type="text" id="nome" name="nome" required><br>

    <label for="valor">Valor:</label>
    <input type="text" id="valor" name="valor" required><br>

     <INPUT NAME="Salvar" TYPE="SUBMIT" ID="Salvar" VALUE="Cadastro Produto">
  </form>

  <br>
  <button onclick="window.location.href='Adm/opcoes.html'">Opções do Administrador</button>
</body>

</html>
