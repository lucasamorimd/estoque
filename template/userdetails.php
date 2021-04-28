<?php session_start();?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Cadastrar Estoque</title>
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
      <div class="page-announce valign-wrapper grey darken-4"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign"><i class="medium material-icons"> library_add </i> Cadastro de Estoque </h1></div>
      <div class="container">
        <h3>Informações do estoque</h3>
        <br>
        <form class="col s12" action="../controls/estoque/ctrl_estoque.php" method="post">
                        <div class="row">
                          <div class="input-field col s12">
                              <input id="codigo_estoque" name="codigo_estoque" type="text" placeholder="Codigo">
                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                              <input id="quantidade" placeholder="Quantidade" name="quantidade" type="number">
                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                              <input id="descricao" placeholder="Descricao" name="descricao" type="text">
                            
                          </div>
                        </div>
                      
                        
                        <div class="carousel-fixed-item center">
                            <button id="submit-form" type="reset" class="btn btn-sucsses">limpar</button> 
                            <button id="submit-form" type="submit" class="btn btn-sucsses">cadastrar</button>
                        </div>                       
                    </form>
        <br><br>
        <h2>Histórico de Registros</h2><br>
        <table class="striped hover">
          <thead>
            <tr>
              <th>Código</th>
              <th>Descrição</th>
              <th>Quantidade</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            require_once '../models/DAO/index/bd_pesquisa_index.php';

            $est = new bd_pesquisa_index();
            $esto = $est->listarestoques();
            foreach ($esto as $es) {
              
            ?>
            <tr>
            <td><?php echo $es->codigo_estoque; ?></td>
            <td><?php echo $es->descricao; ?></td>
            <td><?php echo $es->quantidade; ?></td>
          </tr>
            <?php }?>
          </tbody>
        </table>
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