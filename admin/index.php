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
          <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
          <li><a href="artista.php"><span class="glyphicon glyphicon-star"></span> Artistas</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-cd"></span> Álbumes</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-music"></span> Canciones</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-list"></span> Playlists</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Gestión de Usuarios</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Ajustes</a></li>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-3 col-lg-offset-2 main">
        <div class="container-fluid">
         <div class="row">
           <h1>Escritorio</h1>
           <hr>

           <h3>Estadísticas del Sitio</h3>
           <h4>Top Artistas</h4>
           <h4>Top Álbumes</h4>
           <h4>Top Canciones</h4>
         </div>
          <hr>

          <div class="row">
            <div class="col-md-6">
              <h3>Géneros Musicales</h3>
              <input type="hidden"  id="txt-id-genero" name="txt-id-genero" value="">
              <table class="table table-striped">
                <tr>
                  <td>Insertar Género:</td>
                  <td><input type="text" class="form form-control" id="txt-nombre-genero" name="txt-nombre-genero" value="" placeholder="Género"></td>
                  <td>
                    <button id="btn-guardar-genero" type="button" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Guardar</button>
                    <button id="btn-actualizar-genero" type="button" class="btn btn-primary" style="display: none"><span class="glyphicon glyphicon-save"></span> Actualizar</button>
                  </td>
                </tr>
              </table>
              <table class="table table-striped" id="tbl-generos">
                <thead>
                  <th>Género</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </thead>
                <tbody></tbody>
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
  <script type="text/javascript" src="../js/keys.js"></script>
  <script type="text/javascript" src="../js/admin-index.js"></script>
</body>
</html>