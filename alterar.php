<?php  

require('/db/db.php');
$CONN = conexao();

$sql = "USE agenda;";
        $resultado = mysqli_query($CONN, $sql);
        if (!$resultado)
            die ("Erro: Seleção database... " . mysqli_error($CONN). "<br />");


            $sql = " UPDATE usuario SET nome='" . $_POST['nome'] . "', ";
            $sql .= "email='" . $_POST['email'] ."',";
            $sql .= "senha='" . $_POST['senha'] ."' ";
            $sql .= "WHERE codigo=" . $_POST['codigo'] . ";";
            $resultado = mysqli_query($CONN, $sql);
               if (!$resultado)
               die ("Erro: Seleção database... " . mysqli_error($CONN). "<br />");


               mysqli_close($CONN);
                header('Location: dashboard.php');
       
?>