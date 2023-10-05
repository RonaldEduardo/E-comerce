<?php
    $Host="localhost";
    $Usuario="root"; //Usuário MySQL Server
    $Senha="admin"; //Senha MySQL Server
    $Banco="super_22";


    $ConexaoId=mysql_connect($Host, $Usuario, $Senha, $Banco);
    if(!$ConexaoId) {
        die ("Conexão Falhou: " . mysql_connect_error());
    }
    print("Conexão Bem Sucedida!!!");

    $BancoDados=mysql_select_db($ConexaoId,"super_22");
    if(!$BancoDados) {
        die ("Seleção Falhou: " . mysql_error());
    }

    print("<br>Banco Selecionado!");
    print("<br>ID do Banco: $BancoDados");
?>
