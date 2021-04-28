<?
session_start();
if (isset($_SESSION['UsuarioLogado'])) {
    $logado = true;
    $nomeUsuarioLogado = $_SESSION['NomeUsuarioLogado'];
    $perfilUsuarioLogado = $_SESSION['PerfilUsuarioLogado'];
    $matricula = $_SESSION['Matricula'];
    $email = $_SESSION['EmailUsuario'];

} else {
    $logado = false;
    $nomeUsuarioLogado = NULL;
    $perfilUsuarioLogado = NULL;
}
?>
<?php if(isset($_SESSION['UsuarioLogado'])): ?>
<li>
  <div class="userView">
    <div class="background">
      <img src="assets/img/photo1.png">
    </div>
    <a href="#!user"><img class="" src="../assets/img/avatar04.png"></a>
    <a href="#!name"><span class="white-text name">Seja bem-vindo,</span></a>
    <a href="../template/perfil.php"><span class="white-text email"><?php echo $_SESSION['NomeUsuarioLogado']; ?></span></a>
  </div>
</li>

<li>

</li>

<li><a class="active" href="../index.php"><i class="material-icons black-item">dashboard</i>Dashboard</a></li>
<li><div class="divider"></div></li>

<li><a class="subheader">Gerenciamento</a></li>




<li class="no-padding">
  <ul class="collapsible collapsible-accordion">
    <li>
      <a class="collapsible-header">Estoque<i class="material-icons black-item">file_copy</i></a>
      <div class="collapsible-body">
        <ul>
          <li><a href="../template/names01.php">Meus Cadastros</a></li>
          <li><a href="../template/userdetails.php">Cadastrar</a></li>
          
        </ul>
      </div>
    </li>
  </ul>
</li>
<li class="no-padding">
  <ul class="collapsible collapsible-accordion">
    <li>
      <a class="collapsible-header">Entrada<i class="material-icons black-item">note_add</i></a>
      <div class="collapsible-body">
        <ul>
          <li><a href="../template/names02.php">Meus Cadastros</a></li>
          
        </ul>
      </div>
    </li>
  </ul>
</li>
<li class="no-padding">
  <ul class="collapsible collapsible-accordion">
    <li>
      <a class="collapsible-header">Saidas<i class="material-icons black-item">open_in_browser</i></a>
      <div class="collapsible-body">
        <ul>
         <li><a href="../template/names03.php">Meus Cadastros</a></li>
          
        </ul>
      </div>
    </li>
  </ul>
</li>

<li><a class="waves-effect waves-light btn modal-trigger grey darken-4" href="../controls/login/ctrl_login.php?logout=TRUE">Logout</a></li>
<?php else: ?>
  <div class="row">

              <div class="row">
                  <form class="col s12" action="../controls/login/ctrl_login.php" method="post">
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="matricula" name="matriculaUsuario" type="text" class="validate">
                      <label for="text" data-error="preencha o campo corretamente" data-success="tudo certo">Matricula</label>
                    </div>
                  </div>
              
                  <div class="row">
                    <div class="input-field col s12">
                        <input id="senha" name="senhaUsuario" type="password" class="validate">
                      <label for="senha" data-error="preencha o campo corretamente" data-success="tudo certo">Senha</label>
                    </div>
                  </div>
              </div>
                  <div class="carousel-fixed-item center">
                   <button id="submit-form" type="submite" class="waves-effect waves-light btn modal-trigger">Logar</button>
                  </div>     
                </form>
            <?php endif;?>