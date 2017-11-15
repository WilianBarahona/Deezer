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
          <li><a href="artista.php"><span class="glyphicon glyphicon-star"></span> Artistas</a></li>
          <li><a href="album.php"><span class="glyphicon glyphicon-cd"></span> Álbumes</a></li>
          <li class="active"><a href="#"><span class="glyphicon glyphicon-music"></span> Canciones</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-list"></span> Playlists</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Gestión de Usuarios</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Ajustes</a></li>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-3 col-lg-offset-2 main">
        <div class="container-fluid">
         <div class="row">
           
           <h1>Canciones</h1>
           <hr>
           
           <div class="col-md-12">
              <h3>Agregar Canción</h3>
              <table class="table table-striped">
                <tr>
                  <td>Artista: </td>
                  <td>
                    <select id="slc-artista" class="form form-control" placeholder="Seleccionar">
                      <option value="" hidden>Seleccionar Artista</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Álbum: </td>
                  <td>
                    <select id="slc-album" class="form form-control" placeholder="Seleccionar">
                      <option value="" hidden>Seleccionar Álbum</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Genero: </td>
                  <td>
                    <select id="slc-genero" class="form form-control" placeholder="Seleccionar">
                      <option value="" hidden>Seleccionar</option>
                      option
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Idioma: </td>
                  <td>
                    <select id="slc-idioma" class="form form-control" placeholder="Seleccionar">
                      <option value="" hidden>Seleccionar</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Nombre: </td>
                  <td>
                    <input class="form-control" type="text" name="txt-nombre-cancion" id="txt-nombre-cancion">
                  </td>
                </tr>
                <tr>
                	<td>Incluir canción: </td>
                	<td>
                    <input class="form-control" type="text" id="txt-url-cancion">
                      <form method="post" id="form-cancion" name="form-cancion" enctype="multipart/form-data">
                        <label class="btn btn-default">
                            Examinar <input type="file" name="file" id="file-cancion" hidden>
                        </label>
                        <img src="../img/load.gif" id="carga-foto-cancion" class="img loading" height="20px">
                        <img src="../img/good.png" id="lista-carga-cancion" class="img loading" height="20px">
                      </form>
                  </td>
                </tr>
                <tr>
                  <td>
                    <button id="btn-guardar-cancion" type="button" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>Guardar</button>
                  </td>
                </tr>
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
  <script type="text/javascript" src="../js/admin-cancion.js"></script>
</body>
</html>