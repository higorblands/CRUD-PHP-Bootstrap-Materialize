<?php
    require('/db/DAOUsuario.php');

      if (isset($_GET['procura']) && $_GET['procura'] != ''){
        $CONN = conexao();

        $sql = "USE agenda;";
                $resultado = mysqli_query($CONN, $sql);
                if (!$resultado)
                    die ("Erro: Seleção database... " . mysqli_error($CONN). "<br />");

      $sql = " SELECT * FROM usuario WHERE nome LIKE '%" . $_GET['procura'] . "%';";
      $res = mysqli_query($CONN, $sql);
      if (!$res)
          die ("Erro: Seleção database... " . mysqli_error($CONN). "<br />");

      
      }else{
        $res = listarUsuarios();
      }
?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Dashboard</title>
    </head>
    <body class="blue accent-4">
        <div class="container">
        <h1 class="white-text">Usuários</h1>

<form action="inserirUsuario.php" class="needs-validation"  method="POST" novalidate>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label  for="validationCustom01">Nome Completo</label>
      <input  name="nome" type="text" class="form-control" id="validationCustom01" placeholder="Digite seu nome completo" required>
      <div class="valid-feedback">
        Parece OK !
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label  for="validationCustom02">E-mail</label>
      <input  name="email" type="email" class="form-control" id="validationCustom02" placeholder="Digite seu e-mail" required>
      <div class="valid-feedback">
        Parece OK !
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label  for="validationCustom02">Senha</label>
      <input  name="senha" type="password" class="form-control" id="validationCustom02" placeholder="Digite uma senha forte" required>
      <div class="valid-feedback">
        Parece OK !
      </div>
    </div>
    <button class="btn waves-effect waves-light" type="submit" name="action" >Adicionar
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



        <table border="1">
        <form action="dashboard.php" method="GET">
       
      <input  name="procura" type="text" placeholder="Digite sua busca" required>
      
    <button class="btn waves-effect waves-light" type="submit" >Procurar
    <i class="material-icons right">send</i> 
  </button> <h4 class="white-text">   Realize sua busca</h4>
</form>
            <tr>
                <th class="white-text">Alterar</th>
                <th class="white-text"><i class="small material-icons">insert_chart</i> Código</th>
                <th class="white-text"><i class="small material-icons">account_circle</i> Nome</th>
                <th class="white-text"><i class="small material-icons">email</i> E-mail</th>
                <th class="white-text">Apagar</th>
            </tr>
<?php if(mysqli_num_rows($res) > 0 ) { ?>
<?php while($linha = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><a class="waves-effect waves-light btn" href="AlterarUsuario.php?codigo=<?= $linha['codigo'] ?>" ><i class="material-icons left">add_circle_outline</i>Alterar</button></td>
                <td class="white-text"><?= $linha['codigo'] ?></td>
                <td class="white-text"><?= $linha['nome'] ?></td>
                <td class="white-text"><?= $linha['email'] ?></td>
                <td><a class="waves-effect waves-light btn" href="ExcluirUsuario.php?codigo=<?= $linha['codigo'] ?> "><i class="material-icons left">delete</i>Excluir</button></td>

            </tr>
<?php } } ?>
        </table>   


        <script type="text/javascript" src="materialize/js/materialize.min.js"></script>

        </div>
    </body>
    </html>