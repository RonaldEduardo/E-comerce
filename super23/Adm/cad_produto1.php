<?php
include("../conexao.php");

if (isset($_POST["Salvar"])) {
  // Verifica se um arquivo de imagem foi enviado
  if ($_FILES['produto_imagem']['error'] == UPLOAD_ERR_OK) {
    #region Adicionar foto
    $nome_arquivo = $_FILES['produto_imagem']['name'];
    $caminho_temporario = $_FILES['produto_imagem']['tmp_name'];

    // Especifique o caminho de destino para onde você deseja mover o arquivo
    $diretorio_destino = "../img/";
    // Certifique-se de que o diretório de destino exista, se não, crie-o
    if (!file_exists($diretorio_destino)) {
      mkdir($diretorio_destino, 0777, true);
    }

    // Concatene o nome do arquivo com o caminho de destino
    $caminho_arquivo = $diretorio_destino . $nome_arquivo;
    #endregion
    // Move o arquivo para o destino
    if (move_uploaded_file($caminho_temporario, $caminho_arquivo)) {
      // Continua com a inserção no banco de dados
      $Categoria = $_POST["categoria"];
      $Nome = $_POST["nome"];
      $Valor = $_POST["valor"];

      $Query = "INSERT INTO produtos (Nome, valor, Categoria, imagem) ";
      $Query .= "VALUES ('$Nome', '$Valor', '$Categoria', '$caminho_arquivo')";

      $Resultado = mysqli_query($ConexaoId, $Query);

      if ($Resultado) {
        echo "Produto adicionado com sucesso!";
      } else {
        echo "Não foi possível cadastrar o produto: " . mysqli_error($ConexaoId);
      }
    } else {
      echo "Erro ao mover o arquivo para o destino.";
    }
  } else {
    echo "Erro ao fazer upload da imagem.";
  }
}

echo "<br><button onclick=window.location.href='./lista_produto.php'>Voltar</button>";
?>
