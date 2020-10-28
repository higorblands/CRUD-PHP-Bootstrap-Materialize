<?php  
require('db/db.php');
$CONN = conexao();

$sql = "USE agenda;";
        $resultado = mysqli_query($CONN, $sql);
        if (!$resultado)
            die ("Erro: Seleção database... " . mysqli_error($CONN). "<br />");

$codigo = $_GET['codigo'];
$sql = "SELECT * FROM usuario WHERE codigo=" . $codigo . ";";
$resultado = mysqli_query($CONN, $sql);
if(!$resultado)
die ("Erro: " . mysqli_error($CONN) . "<br />" );

if(mysqli_num_rows($resultado) <= 0 )
die("Erro : código não existente ! " );

$linha = mysqli_fetch_assoc($resultado);
mysqli_close($CONN);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body  class="blue accent-4">
<div class="container">
        <h1 class="white-text">Alterando usuário</h1> 

<form action="alterar.php" class="needs-validation"  method="POST" novalidate>
  <div class="form-row">
      <input type="hidden" name="codigo" value="<?= $linha['codigo'] ?>">
    <div class="col-md-4 mb-3">
      <label class="text-white" for="validationCustom01">Nome Completo</label>
      <input value="<?= $linha['nome'] ?>"  class="text-white" name="nome" type="text" class="form-control" id="validationCustom01" required>
      <div class="valid-feedback">
        Parece OK !
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label class="text-white" for="validationCustom02">E-mail</label>
      <input value="<?= $linha['email'] ?>" class="text-white" name="email" type="email" class="form-control" id="validationCustom02" required>
      <div class="valid-feedback">
        Parece OK !
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label class="text-white" for="validationCustom02">Senha</label>
      <input value="<?= $linha['senha'] ?>" class="text-white" name="senha" type="text" class="form-control" id="validationCustom02" required>
      <div class="valid-feedback">
        Parece OK !
      </div>
    </div>
    <button class="btn waves-effect waves-light" type="submit" name="action" >Alterar
    <i class="material-icons right">send</i>
  </button>
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>



        <script type="text/javascript" src="materialize/js/materialize.min.js"></script>

        </div>
    
</body>
</html>