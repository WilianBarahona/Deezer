<?php
 session_start();
 if($_SESSION['status']==false) { // CUALQUIER USUARIO REGISTRADO PUEDE VER ESTA PAGINA
      session_destroy();
     header("Location: login.php");
 }

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Freezer - Flow your music</title>
    <link rel="icon" href="img/icon.png">
    <!-- CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/principal.css">
   <link rel="stylesheet" href="css/favorites.css">
   <link rel="stylesheet" href="css/player.css">
   <link rel="stylesheet" href="css/jquery-confirm.min.css">

  </head>
  <body>
    <input type="hidden" id="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>">
    <input type="hidden" id="foto_usuario" value="<?php echo $_SESSION["url_foto_perfil"] ?>">
    <input type="hidden" id="nombre_usuario" value="<?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"] ?>">
    <div class="container-fluid">
      <div class="row">
        <!-- Barra de Navegacion Lateral -->
        <div id="sidebar" class="col-sm-3 col-md-3 col-lg-2 sidebar">
          <a href="#" id="index-image"><img src="img/freezer.png" class="img-responsive" alt=""></a>
          <div class="form-group has-feedback">
              <input type="text" id="txt-search" name="search" class="form-control" placeholder="Buscar">
              <span class="glyphicon glyphicon-search form-control-feedback" id="btn-search"></span>
          </div>
          <ul class="nav nav-sidebar" aria-hidden="true">
            <li class="active">
              <a id="index">INICIO</a>
            </li> 
 <!--            <li>
              <a id="recomendaciones">RECOMENDACIONES</a>
            </li> -->
            <hr>
            <li>
              <a>
                <span class="link-profile" id="mi-musica">
                  <img src="<?php echo $_SESSION["url_foto_perfil"] ?>"  class="img-profile img-circle" alt="">
                  &nbsp;&nbsp;&nbsp; <span>Mi Música</span>
                </span>
                <span class="glyphicon glyphicon-cog settings btn-float" id="float-settings"></span>
              </a>
            </li>
                <div class="container-fluid">
                  <div class="row">
                      <div class="col-xs-12">
                        <button type="button" class="btn btn-info center-block">
                          <span class="glyphicon glyphicon-plus"></span> SUSCRIBIRSE
                        </button>
                      </div>
                  </div>
                </div>
           <!--  <li>
              <a id="favoritas">
                  <span class="glyphicon glyphicon-heart"></span> 
                  &nbsp;&nbsp;&nbsp; Mis favoritas
                </a>
            </li> -->
            <li>
                <a id="float-playlist" class="btn-float">
                  <span class="glyphicon glyphicon-list"></span> 
                  &nbsp;&nbsp;&nbsp; Playlists
                </a>
            </li> 
              <li>
              <a id="float-albums" class="btn-float">
                  <span class="glyphicon glyphicon-cd" onclick="cargarGeneros()"></span> 
                  &nbsp;&nbsp;&nbsp; Álbumes
                </a>
              </li>
              <li>
              <a  id="float-activity" class="btn-float">
                  <span class="glyphicon glyphicon-time"></span> 
                  &nbsp;&nbsp;&nbsp; Actividad
                </a>
              </li>
<!--               <li>
                <a  id="float-apps" class="btn-float">
                    <span class="glyphicon glyphicon-expand"></span> 
                    &nbsp;&nbsp;&nbsp; Aplicaciones
                  </a>
              </li> -->
          </ul>
          <div class="player" id="player">
            <div class="container-fluid">
              <div class="row player-info">
                <div class="container-fluid">
                  <div class="row">
                    <h4>
                    <span id="player-artist">Chala head chala</span>
                    <br>
                    <span id="player-title">Ricardo Silva</span>
                    </h4>
                  </div>
                  <div class="row">
                    <div class="col-sm-2">
                      <span class="glyphicon glyphicon-heart"></span>
                    </div>
                    <div class="col-sm-2">
                      <span class="glyphicon glyphicon-list"></span>
                    </div>
                    <div class="col-sm-2">
                      <span class="glyphicon glyphicon-plus"></span>
                    </div>
                    <div class="col-sm-6"></div>
                  </div>
                </div>
              </div>
              <div class="row player-btn player-change">
                <div class="col-sm-4">
                  <button type="button" class="btn btn-none" onclick="lista.prev()">
                    <span class="glyphicon glyphicon-step-backward player-prev"></span>
                  </button>
                </div >
                <div class="col-sm-4">
                  <button type="button" class="btn btn-none" onclick="lista.toggle()">
                    <span class="glyphicon glyphicon-play" id="player-play"></span>
                  </button>
                </div >
                <div class="col-sm-4">
                  <button type="button" class="btn btn-none" onclick="lista.next()">
                    <span class="glyphicon glyphicon-step-forward player-next"></span>
                  </button>
                </div >
              </div>
              <div class="row player-btn player-opt">
                <div class="col-sm-3">
                  <button type="button" class="btn btn-none">
                    <span class="glyphicon glyphicon-volume-up"></span>
                  </button>
                </div>
                <div class="col-sm-3">
                  <button type="button" class="btn btn-none">
                    <span class="glyphicon glyphicon-repeat"></span>
                  </button>
                </div>
                <div class="col-sm-3">
                  <button type="button" class="btn btn-none">
                    <span class="glyphicon glyphicon-random"></span>
                  </button>
                </div>
                <div class="col-sm-3">
                  <button type="button" class="btn btn-none btn-float" id="float-playlist-playing">
                    <span class="glyphicon glyphicon-list-alt"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Fin Barra de Navegacion Lateral -->
        <!-- Barra Flotante Aparece Oculta display: none -->
        <!-- Aparece oculta en moviles -->
        <div class="col-sm-offset-3 col-md-offset-3 col-lg-offset-2 col-sm-3 col-md-3 col-lg-3 float-bar" id="float-bar">
        <!-- CONTENIDO BARRA FLOTANTE -->
          <div class="container-fluid" id="float-bar-content">
          
          </div> 
          <!-- FIN CONTENIDO BARRA FLOTANTE -->
        </div>
        <!-- FIN Floatbar -->
        <div id="float-bar-overlay" class="float-bar-overlay" onclick="floatBar.hidePanel()"></div>
        <!-- Contenido Principal -->
        <div id="main" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-3 col-lg-offset-2 main">
        </div>
        <!-- Fin Contenido Principal -->
      </div> <!-- FIN ROW -->
    </div> <!-- FIN container -->
    <script type="text/javascript" src="js/soundmanager2.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-confirm.min.js"></script>
    <script type="text/javascript" src="js/panel.js"></script>
    <script type="text/javascript" src="js/navigation.js"></script>
    <script type="text/javascript" src="js/controlador.js"></script>
    <script type="text/javascript" src="js/player.js"></script>
    <script type="text/javascript" src="js/keys.js"></script>
    <script type="text/javascript" src="js/albumes.js"></script>
    <script type="text/javascript" src="js/favoritos.js"></script>


    <script type="text/javascript">
        //REDIRECCION A LANDING PAGE
        // $(document).ready(function(){
        //   console.log(window.history);
        //   if (window.history.length<3) {
        //     location.href="landingPage.html";
        //   }
        // })
    </script>
  </body>
</html>
