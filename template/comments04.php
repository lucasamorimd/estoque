<?php 
session_start();
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
      <?php include_once '../navbar.php'; ?>
    </ul>
    <main>
    <section class="content">
      
      <div class="page-announce valign-wrapper grey darken-4"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign"><i class="medium material-icons"> format_list_bulleted </i> Lista de Tonners </h1></div>
      <div class="row">
          <form action="" method="post" >
          <div class="input-field col s0" style="width:40%; margin-left: 25%;">
              <input type="text" placeholder="Pesquisar"name="pesquisa">               
          </div>
          <div class="input-field col s1">
              <button type="submit" class="btn waves-effect waves-light orange darken-1"><i class="material-icons ">search</i></button>
          </div>
              
          </form>

          
      </div>
<div class="row">
            <div class="col s12">
                <table class="responsive-table bordered hoverable highlight">
            <thead>
                <tr>
                    <th data-field="">Codigo de Tonner</th>
                    <th data-field="">Matricula do Funcionário</th>

                    <th data-field="">Cor</th>
                    <th data-field="">Modelo</th>
                    <th data-field="">Tipo</th>
                    
                    <th>Cadastrar Entrada</th>

                    <th>Cadastrar Saida</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../models/DAO/bd_pesquisa_estoque.php';
                
                $estoqueDAO = new bd_pesquisa_estoque();
                if(isset($_POST['pesquisa'])){
                    $nomeestoque = $_POST['pesquisa'];
                    $estoques = $estoqueDAO->pesquisarestoquePeloNome($nomeestoque);
                } else {
                    $estoques = $estoqueDAO->listarestoques();
                }
                
                foreach ($estoques as $produto){
                ?>
                <tr>
                    <td><?php echo $produto->codigo_estoque; ?></td>
                    <td><?php echo $produto->codigo_usuario; ?></td>
                    <td><?php echo $produto->quantidade; ?></td>
                    <td><?php echo $produto->descricao; ?></td>
                    <?php if(isset($_SESSION['UsuarioLogado'])):?>
                    <td><a class="waves-effect waves-light btn green darken-2" href="comments02.php?codigo_estoque=<?php echo $produto->codigo_estoque; ?>"><i class="material-icons">add_shopping_cart</i></a></td>
                    <td><a class="waves-effect waves-light btn red darken-4" href="comments03.php?codigo_estoque=<?php echo $produto->codigo_estoque; ?>"><i class="material-icons">open_in_browser</i></a></td>
                    <?php else:?>
                        <td><a class="waves-effect waves-light btn red darken-4" href="../index.php?mensagem=Você Não está Logado!!"><i class="material-icons">add_shopping_cart</i></a></td>
                        <td><a class="waves-effect waves-light btn red darken-4" href="../index.php?mensagem=Você Não está Logado!!"><i class="material-icons">open_in_browser</i></a></td>
                    <?php endif;?>
                </tr>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
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