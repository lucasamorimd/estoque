<?php 
session_start();


if (isset($_SESSION['UsuarioLogado'])) {
	# code...
	$logado = true;
	$nomeUsuarioLogado = $_SESSION['NomeUsuarioLogado'];
	$perfilUsuarioLogado = $_SESSION['PerfilUsuarioLogado'];
	$matricula = $_SESSION['Matricula'];
	$email = $_SESSION['EmailUsuario'];
  $senha = $_SESSION['SenhaUsuario'];
}else{
	$codigo_usuario = null;
}

if($perfilUsuarioLogado == 1){
	$perfil = 'Administrador';
}else{
	$perfil = 'Funcionário';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Control Panel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
  </head>
  
  <body>
    
    	<ul id="slide-out" class="side-nav fixed z-depth-4">
    	  <?php include '../navbar.php'; ?>
    	</ul>

    <main>
    <section class="content">
      <div class="page-announce valign-wrapper grey darken-4"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign"><?php echo $nomeUsuarioLogado?> </h1></div>
      <div class="container">
        <h3>Informações do Usuário</h3>
        <br>
        <form id="user" action="../controls/usuarios/ctrl_alt_usu.php" method="post">
          <table class="table table-hover">
            <tbody>
              <tr>
                <td><label for="usrname">Matrícula: </label></td>
                <td><a><?php echo $matricula;?></a></td>
              </tr>

              <tr>
                <td><label for="ipaddress">Tipo de Perfil: </label></td>
                <td><a><?php echo $perfil?></a></td>
              </tr>
              <tr>
                <td><label for="econfirm">Email Confirmedo: </label></td>
                <td><i class="material-icons">check</i></a></td>
              </tr>
              <tr>
                <td><label for="guidelines">Guidelines Approved: </label></td>
                <td><i class="material-icons">check</i></a></td>
              </tr>
              <tr>
                <input type="hidden" name="pastdata" value="{{ usr.id }}" />
                <td><label for="usrname">Nome: </label></td>
                <td><input type="text" name="nome" value="<?php echo $nomeUsuarioLogado;?>" /></td>
              </tr>
              <tr>
                <td><label for="email">Email: </label></td>
                <td><input type="text" name="email" value="<?php echo $email?>" /></td>
              </tr>
              <tr>
                <td><label for="accesslevel">Senha: </label></td>
                <td><input type="password" name="senha" id="senha" value="<?php echo $senha;?>" /></td>
              </tr><tr>
                <td><label for="accesslevel">Confirmar Senha: </label></td>
                <td><input type="password" name="confirme_senha" id="confirme_senha"  /></td>
              </tr>
              <tr>

              </tr>
            </tbody>
          </table>
          <br>
          <div class="center-align"><input class="btn btn-success" type="submit" value="Alterar" /></div>
        </form>
        <br><br>

      </div>
    </section>
    </main>
    <footer class="page-footer grey darken-4">
      <div class="footer-copyright">
        <div class="container">
     
        </div>
      </div>
    </footer>
    
    <!-- So this is basically a hack, until I come up with a better solution. autocomplete is overridden
    in the materialize js file & I don't want that.
    -->
    <!-- Yo dawg, I heard you like hacks. So I hacked your hack. (moved the sidenav js up so it actually works) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script>
    // Hide sideNav
    $('.button-collapse').sideNav({
    menuWidth: 300, // Default is 300
    edge: 'left', // Choose the horizontal origin
    closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
      });
      $(document).ready(function(){
      $('.tooltipped').tooltip({delay: 50});
      });
      $('select').material_select();
      $('.collapsible').collapsible();
      var password = document.getElementById("senha"),
       confirm_password = document.getElementById("confirme_senha");

      function validatePassword(){
        if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Senhas diferentes!");
        } else {
          confirm_password.setCustomValidity('');
        }
      }

      password.onchange = validatePassword;
      confirm_password.onkeyup = validatePassword;
      </script>
      <div class="fixed-action-btn horizontal tooltipped" data-position="top" dattooltipped" data-position="top" data-delay="50" data-tooltip="Quick Links">
        <a class="btn-floating btn-large red">
          <i class="large material-icons">mode_edit</i>
        </a>
        <ul>
          <li><a class="btn-floating red tooltipped" data-position="top" data-delay="50" data-tooltip="Handbook" href="#"><i class="material-icons">insert_chart</i></a></li>
          <li><a class="btn-floating yellow darken-1 tooltipped" data-position="top" data-delay="50" data-tooltip="Staff Applications" href="#"><i class="material-icons">format_quote</i></a></li>
          <li><a class="btn-floating green tooltipped" data-position="top" data-delay="50" data-tooltip="Name Guidelines" href="#"><i class="material-icons">publish</i></a></li>"
          <li><a class="btn-floating blue tooltipped" data-position="top" data-delay="50" data-tooltip="Issue Tracker" href="#"><i class="material-icons">attach_file</i></a></li>
          <li><a class="btn-floating orange tooltipped" data-position="top" data-delay="50" data-tooltip="Support" href="#"><i class="material-icons">person</i></a></li>
        </ul>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </body>
</html>
