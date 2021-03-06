<?php 

session_start();
if($_SESSION['status']==false || $_SESSION["id_tipo_usuario"]!=1) { // O el usuario no es administrador
    header("Location: ../login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Administración</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/principal.css">
  <link rel="stylesheet" href="../css/jquery-confirm.min.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div id="sidebar" class="col-sm-3 col-md-3 col-lg-2 sidebar">
        <a href="../"><img src="../img/freezer.png" class="img-responsive" alt=""></a>
        <ul class="nav nav-sidebar" id="dashboard">
          <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
          <li class="active"><a href="artista.php"><span class="glyphicon glyphicon-star"></span> Artistas</a></li>
          <li><a href="album.php"><span class="glyphicon glyphicon-cd"></span> Álbumes</a></li>
          <li><a href="cancion.php"><span class="glyphicon glyphicon-music"></span> Canciones</a></li>
          <li><a href="playlist.php"><span class="glyphicon glyphicon-list"></span> Playlists</a></li>
          <li><a href="idioma.php"><span class="glyphicon glyphicon-text-width"></span> Idiomas</a></li>
            <li><a href="paises.php"><span class="glyphicon glyphicon-screenshot"></span>Paises</a></li>
          <li><a href="tipo-suscripcion.php"><span class="glyphicon glyphicon-eye-open"></span>Tipos de suscripcion</a></li>
<li><a href="usuario.php"><span class="glyphicon glyphicon-user"></span> Gestión de Usuarios</a></li>
          <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Gestión de Usuarios</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Ajustes</a></li> -->
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-3 col-lg-offset-2 main">
        <div class="container-fluid">
         <div class="row">
           
           <h1>Artistas</h1>
           <hr>
           <div id="resultados">
             
           </div>

           <div class="col-md-12">
              <h3>Agregar Artista</h3>
              <table class="table table-striped">
                <tr>
                  <td>Fotografía: </td>
                  <td>
                    <input type="hidden" id="txt-url-foto-artista">
                    <form method="post" id="form-foto-artista" name="form-foto-artista" enctype="multipart/form-data">
                      <label class="btn btn-default">
                          Examinar <input type="file" name="file" id="file-foto-artista" hidden>
                      </label>
                      <img src="../img/load.gif" id="carga-foto-artista" class="img loading" height="20px">
                      <img src="../img/good.png" id="lista-carga-foto-artista" class="img loading" height="20px">
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>Nombre del artista: </td>
                  <td><input type="text" id="txt-nombre-artista" id="txt-artista" value="" placeholder="Nombre" class="form form-control"></td>
                  <td><input type="hidden" id="txt-id-usuario"></td>
                </tr>
                <tr>
                  <td>Pais: </td>
                  <td>
                    <select id="slc-pais-artista" class="form form-control" placeholder="Seleccionar">
                      <option value="" hidden>Seleccionar Pais</option>
                      option
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Biografía: </td>
                  <td>
                    <textarea id="txt-biografia-artista" class="form form-control" placeholder="3000 caracteres."></textarea>
                  </td>
                </tr>
                <tr>
                  <td>
                    <button id="btn-guardar-artista" type="button" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Guardar</button>
                    <button id="btn-actualizar-artista" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-save"></span>Guardar cambios</button>
                  </td>
                </tr>
              </table>

              <h3>Listado de Artistas</h3>
              <table class="table table-striped" id="tbl-artistas">
                <thead>
                  <th>Foto</th>
                  <th>Nombre del Artista</th>
                  <th>Pais</th>
                  <!-- <th>Biografía</th> -->
                  <th>Editar</th>
                  <th>Eliminar</th>
                </thead>
                <tbody>
                </tbody>
              </table>

            </div>
          </div>

        </div>



      </div>
    </div>
  </div>

  <script type="text/javascript" src="../js/soundmanager2.min.js"></script>
  <script type="text/javascript" src="../js/player.js"></script>
  <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../js/jquery-confirm.min.js"></script>
  <script type="text/javascript" src="../js/navigation.js"></script>
  <script type="text/javascript" src="../js/admin-artista.js"></script>
</body>
</html>