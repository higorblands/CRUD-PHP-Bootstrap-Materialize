<?php  

require('db/db.php');
$CONN = conexao();

$sql = "USE agenda;";
        $resultado = mysqli_query($CONN, $sql);
        if (!$resultado)
            die ("Erro: Seleção database... " . mysqli_error($CONN). "<br />");


            $sql = " INSERT INTO usuario (nome, email, senha)
            VALUES ( '".$_POST['nome']."', '".$_POST['email']."', '".$_POST['senha']."')";
            echo $sql;
            $resultado = mysqli_query($CONN, $sql);
               if (!$resultado)
               die ("Erro: Seleção database... " . mysqli_error($CONN). "<br />");


               mysqli_close($CONN);
                header('Location: dashboard.php') 
       
?>