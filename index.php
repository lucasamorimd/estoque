  <?php
session_start();

require_once 'models/DAO/index/bd_pesquisa_index.php';
$pesquisabd = new bd_pesquisa_index;
$estoque = $pesquisabd->listarestoquesorder();
$entrada = $pesquisabd->listarentradas();
$usuarios = $pesquisabd->listarusuarios();
$saidas = $pesquisabd->listarsaidas();

if(isset($_GET['mensagem'])){
    $msg =$_GET['mensagem'];
   $mensagemCliente =  "Materialize.toast('".$msg."', 8000)";
}else{
    $mensagemCliente = null;
}

if (isset($_SESSION['UsuarioLogado'])) {
    $logado = true;
    $nomeUsuarioLogado = $_SESSION['NomeUsuarioLogado'];
    $perfilUsuarioLogado = $_SESSION['PerfilUsuarioLogado'];
    $matricula = $_SESSION['Matricula'];
    $email = $_SESSION['EmailUsuario'];
    //echo 'Seja Bem Vindo '.strtoupper($nomeUsuarioLogado)."<br/>";
    //echo 'Seu Perfil vale: '.$perfilUsuarioLogado."<br/>";
} else {
    $logado = false;
    $nomeUsuarioLogado = NULL;
    $perfilUsuarioLogado = NULL;
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
    <!-- github fork banner -->
    

    <ul id="slide-out" class="side-nav fixed z-depth-4">
      <?php if($logado == true): ?>
<li>
  <div class="userView">
    <div class="background">
      <img src="assets/img/photo1.png">
    </div>
    <a href="#!user"><img class="" src="assets/img/avatar04.png"></a>
    <a href="#!name"><span class="white-text name">Seja bem-vindo,</span></a>
    <a href="template/perfil.php"><span class="white-text email"><?php echo $nomeUsuarioLogado;?></span></a>
  </div>
</li>

<li>

</li>

<li><a class="active" href="index.php"><i class="material-icons black-item">dashboard</i>Dashboard</a></li>
<li><div class="divider"></div></li>

<li><a class="subheader">Gerenciamento</a></li>

<li class="no-padding">
  <ul class="collapsible collapsible-accordion">
    <li>
      <a class="collapsible-header">Estoque<i class="material-icons black-item">file_copy</i></a>
      <div class="collapsible-body">
        <ul>
          <li><a href="template/names01.php">Meus Cadastros</a></li>
          <li><a href="template/userdetails.php">Cadastrar</a></li>
          
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
          <li><a href="template/names02.php">Meus Cadastros</a></li>
          
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
         <li><a href="template/names03.php">Meus Cadastros</a></li>
          
        </ul>
      </div>
    </li>
  </ul>
</li>

<li><a class="waves-effect waves-light btn modal-trigger grey darken-4" href="controls/login/ctrl_login.php?logout=TRUE">Logout</a></li>
<?php else:?>
  <div class="row">

              <div class="row">
                  <form class="col s12" action="controls/login/ctrl_login.php" method="post">
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
                   <button type="submit" class="waves-effect waves-light btn modal-trigger" data-target="modal2">Logar</button>
                  </div>     
                </form>

            <?php endif;?>
    </ul>
        
                  
       <div id="modal2" class="modal">
           <div class="modal-content">
               <h5>Fazer Login</h5>
               <div class="divider"></div>
               <div class="row">
                   <form class="col s12" action="control/controladorLoginFunc.php" method="post">
                       <div class="row">
                           <div class="input-field col s12">
                               <input id="email" name="emailUsuario" type="email" class="validate">
                               <label for="email" data-error="preencha o campo corretamente" data-success="tudo certo">Email</label>
                           </div>
                       </div>
                       <div class="row">
                           <div class="input-field col s12">
                               <input id="senha" name="senhaUsuario" type="password" class="validate"> 
                               <label for='senha' data-error="preencha o campo corretamente" data-success="tudo certo">Senha</label>
                           </div>
                       </div>
                       <div class="carousel-fixed-item center">
                           <button id='submit-form' type="submite" class="waves-effect waves-light btn">Logar</button>
                       </div>
                   </form>
                   </div>
               </div> 
              
           </div>       
    <main>

    <section class="content">
      <div class="page-announce valign-wrapper grey darken-4"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign"><i class="medium material-icons" font-size=90px> storage </i> Inventário </h1></div>
      <!-- Stat Boxes -->
      <div class="row">
        <div class="col l3 s6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php $valor = 0; foreach($estoque as $c) {
                                          $valor+=$c->quantidade;
                                        } echo $valor;?></h3>
              <p>Total Geral de Estoque</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="template/names.php" class="small-box-footer" class="animsition-link">Listar Estoque <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          </div><!-- ./col -->
          <div class="col l3 s6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php $valore = 0; foreach($entrada as $e) {
                                          $valore+=$e->quantidade;
                                        } echo $valore;?></h3></h3>
                <p>Total Geral de Entradas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="template/comments.php" class="small-box-footer" class="animsition-link">Lista de Entradas <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            </div><!-- ./col -->
            <div class="col l3 s6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php $valors = 0; foreach($saidas as $c) {
                                          $valors+=$c->quantidade;
                                        } echo $valors;?></h3>
                  <p>Total Geral de Saídas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-email"></i>
                </div>
                <a href="template/comments01.php" class="small-box-footer" class="animsition-link">Lista de Saidas <i class="fa fa-arrow-circle-right"></i></a>
              </div>
              </div>            

              <div class="col l3 s6">
                <!-- small box -->
             
              </div>

              <div class="container">
                <div class="quick-links center-align">
                  <h3></h3>
                  <div class="row">
                    
                    <div class="col l4 offset-l3 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Cadastrar Estoque"><a class="waves-effect waves-light btn-large" href="template/userdetails.php">Estoque</a></div>
                  </div>
                </div>
              </div>
                <div class="custom-responsive">
                  <table class="striped hover centered">
                    <thead><tr>
                      <th>Código</th>
                      <th>Quantidade</th>
                      <th>Descrição</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                 

  

                    <?php foreach ($estoque as $u){ ?>
                                      
                    <tr>
                      <td><?php echo $u->codigo_estoque; ?></td>
                      <td><?php echo $u->quantidade; ?></td>
                      <td><?php echo $u->descricao; ?></td>
                      <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
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
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
        <script>
          $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
          });
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
            <?php echo $mensagemCliente; ?>
          
          </script>
          <div class="fixed-action-btn horizontal tooltipped" data-position="top" dattooltipped data-position="top" data-delay="50" data-tooltip="Quick Links">
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
