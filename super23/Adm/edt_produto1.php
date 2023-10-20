<?php
include("../conexao.php");

// Verifica se o formulário foi enviado corretamente
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Salvar'])) {
     // Verifica se um arquivo de imagem foi enviado
     if ($_FILES['produto_imagem']['error'] == UPLOAD_ERR_OK) {
          $nome_arquivo = $_FILES['produto_imagem']['name'];
          $caminho_temporario = $_FILES['produto_imagem']['tmp_name'];

          // Especifica o caminho de destino para onde você deseja mover o arquivo
          $diretorio_destino = 'img/';

          // Certifica-se de que o diretório de destino exista, se não, crie-o
          if (!file_exists($diretorio_destino)) {
               mkdir($diretorio_destino, 0777, true);
          }

          // Concatena o nome do arquivo com o caminho de destino
          $caminho_arquivo = $diretorio_destino . $nome_arquivo;

          // Move o arquivo para o destino
          if (move_uploaded_file($caminho_temporario, $caminho_arquivo)) {
               // Obtém os dados do formulário
               $Nome = $_POST["Nome"];
               $Categoria = $_POST["Categoria"];
               $Valor = $_POST["Valor"];
               $CodProduto = $_POST["CodProduto"];

               // Utiliza Prepared Statement para evitar SQL Injection
               $query = $ConexaoId->prepare("UPDATE produtos SET Nome=?, Categoria=?, Valor=?, imagem=? WHERE CodProduto=?");
               $query->bind_param("ssdsi", $Nome, $Categoria, $Valor, $caminho_arquivo, $CodProduto);

               // Executa a consulta
               if ($query->execute()) {
                    // Produto alterado com sucesso
                    echo "Produto $Nome alterado com sucesso";
               } else {
                    // Não foi possível atualizar o produto
                    die("Não foi possível atualizar o produto: " . mysqli_error($ConexaoId));
               }
          } else {
               // Erro ao mover o arquivo para o destino
               echo "Erro ao mover o arquivo para o destino.";
          }
     } else {
          // Erro ao fazer upload da imagem
          echo "Erro ao fazer upload da imagem.";
     }
}
?>

<!DOCTYPE html>
<html>

<head>
     <title>Alterar Produto</title>
</head>

<body>
     <br><button onclick="window.location.href='./lista_produto.php'">Voltar</button>
</body>

</html>
