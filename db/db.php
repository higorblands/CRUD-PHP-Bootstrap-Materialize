<?php
    
    function conexao() {
    $url = "localhost";
    $user = "root";
    $pass = "";

    $conn = mysqli_connect($url, $user, $pass);

    if (!$conn)
        die("Erro: " . mysqli_connect_error());
        echo "DB: ok...<br />";

    return $conn;
    }

    
?>