<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Administración</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/principal.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div id="sidebar" class="col-sm-3 col-md-3 col-lg-2 sidebar">
        <a href="../"><img src="../img/freezer.png" class="img-responsive" alt=""></a>
        <ul class="nav nav-sidebar" id="dashboard">
          <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
          <li><a href="artista.php"><span class="glyphicon glyphicon-star"></span> Artistas</a></li>
          <li><a href="album.php"><span class="glyphicon glyphicon-cd"></span> Álbumes</a></li>
          <li><a href="cancion.php"><span class="glyphicon glyphicon-music"></span> Canciones</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-list"></span> Playlists</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Gestión de Usuarios</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Ajustes</a></li>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-3 col-lg-offset-2 main">
        <div class="container-fluid">
         <div class="row">
           <h1>Idioma</h1>
         </div>
          <hr>

          <div class="row">
            <div class="col-md-6">
            <form style="form-control">
              <table class="table table-striped" id="tbl-idiomas">
                <thead>
                </thead>
                <tbody>
                  <tr style="display: none;">
                    <td>Codigo:</td>
                    <td><input type="text" name="txt-id-idioma" id="txt-id-idioma" class="form-control"></td>
                  </tr>
                  <tr >
                    <td>Idioma:</td>
                    <td><input type="text" name="txt-nombre-idioma" id="txt-nombre-idioma" class="form-control"></td>
                  </tr>           
                  <tr>
                    <td>Abreviatura:</td>
                    <td><input type="text" name="txt-abreviatura-idioma" id="txt-abreviatura-idioma" class="form-control"></td>
                  </tr>
                </tbody>
              </table>
              <input type="button" name="btn-guardar-idioma" value="Guardar" class="btn btn-primary" id="btn-guardar-idioma">
              <input type="button" name="btn-actualizar-idioma" id="btn-actualizar-idioma" value="Actualizar" class="btn btn-info" style="display: none;">
              </form>
            </div>
            <div class="well col-md-6" id="div-idiomas">
                <span class="glyphicon glyphicon-search" onclick="buscarIdioma()"></span>&nbsp&nbsp&nbsp
                <input type="text" id="txt-busqueda" placeholder="Busqueda" style="border-radius:8px">
                <div id="div-busqueda">
                  <table id="tbl-busquedas" class="table table-striped">
                    <thead></thead>
                    <tbody>
                    </tbody>
                  </table>
                  
                </div>
                <table id="tbl-idiomas" class="table table-striped">
                  <thead>
                    <th>Idioma</th>
                    <th>Abreviatura</th>
                    <th></th>
                </thead>
                <tbody></tbody>
                </table>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../js/jquery-3.2.1.min.js"></script>
  <script src="../js/admin-idioma.js"></script>
</body>
</html>