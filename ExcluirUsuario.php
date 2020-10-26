<?php
    if (!isset($_GET['codigo']))
        header('Location: dashboard.php');

        require('db/db.php');

    $codigo = $_GET['codigo'];

    $CONN = conexao();

        $sql = "USE agenda;";
        $resultado = mysqli_query($CONN, $sql);
        if (!$resultado)
            die ("Erro: Seleção database... " . mysqli_error($CONN). "<br />");

        $sql = "DELETE FROM usuario WHERE codigo=" . $codigo . ";";

        $resultado = mysqli_query($CONN, $sql);
        if (!$resultado)
            die ("Erro: " . mysqli_error($CONN). "<br />");

        mysqli_close($CONN);
        header('Location: dashboard.php') 

?>