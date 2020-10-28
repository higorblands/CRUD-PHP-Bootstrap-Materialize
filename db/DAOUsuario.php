<?php
    require('/db.php');

    function listarUsuarios() {
        $CONN = conexao();

        $sql = "USE agenda;";
        $resultado = mysqli_query($CONN, $sql);
        if (!$resultado)
            die ("Erro: Seleção database... " . mysqli_error($CONN). "<br />");

        $sql = "SELECT * FROM usuario";

        $resultado = mysqli_query($CONN, $sql);
        if (!$resultado)
            die ("Erro: Seleção database... " . mysqli_error($CONN). "<br />");




        mysqli_close($CONN);
        return $resultado;
    }
?>