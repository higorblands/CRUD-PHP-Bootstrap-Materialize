<?php
    require('db.php');

    function criarbanco($nomedb) {
        $CONN = conexao();
        $sql = "CREATE OR REPLACE DATABASE " . $nomedb;

        $resultado = mysqli_query($CONN, $sql);

        if (!$resultado)
            die ("Erro: Criação Database..." . mysqli_error($CONN). "<br />");
        
        echo "DB: Database criado... <br />";
        mysqli_close($CONN);
    }

    function criartabelausuario($nomedb) {
        echo "Criando tabela... <br />";
        $CONN = conexao();

        $sql = "USE " . $nomedb . ";";
        $resultado = mysqli_query($CONN, $sql);

        if (!$resultado)
            die ("Erro: Seleção database..." . mysqli_error($CONN). "<br />");
        
        echo "DB: Database selecionada... <br />";

        $sql = "CREATE TABLE usuario (";
        $sql .= "codigo INT NOT NULL AUTO_INCREMENT,";
        $sql .= "nome VARCHAR(250),";
        $sql .= "email VARCHAR(100),";
        $sql .= "senha VARCHAR(100),";
        $sql .= "PRIMARY KEY (codigo)";
        $sql .= ");";

        $resultado = mysqli_query($CONN, $sql);

        if (!$resultado)
            die ("Erro: Criação Tabela..." . mysqli_error($CONN). "<br />");
        
        echo "DB: Tabela criada... <br />";
        mysqli_close($CONN);
    }

    function popularusuario($nomedb) {
        echo "Populando tabela... <br />";
        $CONN = conexao();

        $sql = "USE " . $nomedb . ";";
        $resultado = mysqli_query($CONN, $sql);

        if (!$resultado)
            die ("Erro: Seleção database..." . mysqli_error($CONN). "<br />");

            echo "DB: Database selecionada... <br />";

            $sql = "INSERT INTO usuario (nome, email, senha)";
            $sql .= "VALUES ('Fulano de Tal', 'fulano@email.com', '12345');";
            $sql .= "INSERT INTO usuario (nome, email, senha)";
            $sql .= "VALUES ('Beltrano de Tal', 'beltrano@email.com', '54321');";
            $sql .= "INSERT INTO usuario (nome, email, senha)";
            $sql .= "VALUES ('Cicrano de Tal', 'ciclano@email.com', '67890');";

            $resultado = mysqli_multi_query($CONN, $sql);

            if (!$resultado)
            die ("Erro: Polulação da tabela usuario... " . mysqli_error($CONN). "<br />");

            echo "DB: Populado tabela usuario... <br />";
            mysqli_close($CONN);
    }

    criarbanco("agenda");
    criartabelausuario("agenda");
    popularusuario("agenda");





?>