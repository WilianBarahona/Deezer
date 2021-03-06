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
          <li><a href="cancion.php"><span class="glyphicon glyphicon-music"></span> Canciones</a></li>
          <li><a href="playlist.php"><span class="glyphicon glyphicon-list"></span> Playlists</a></li>
          <li><a href="idioma.php"><span class="glyphicon glyphicon-text-width"></span> Idiomas</a></li>
          <li class="active"><a href="paises.php"><span class="glyphicon glyphicon-screenshot"></span>Paises</a></li>
          <li><a href="tipo-suscripcion.php"><span class="glyphicon glyphicon-eye-open"></span>Tipos de suscripcion</a></li>
          <li><a href="usuario.php"><span class="glyphicon glyphicon-user"></span> Gestión de Usuarios</a></li>
         <!--  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Gestión de Usuarios</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Ajustes</a></li> -->
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-3 col-lg-offset-2 main">
        <div class="container-fluid">
         <div class="row">
           <h1>Paises</h1>
         </div>
          <hr>

          <div class="row">
            <div class="col-md-6">
            <form style="form-control">
              <table class="table table-striped" id="tbl-paiss">
                <thead>
                </thead>
                <tbody>
                  <tr style="display: none;">
                    <td>Codigo:</td>
                    <td><input type="text" name="txt-id-pais" id="txt-id-pais" class="form-control"></td>
                  </tr>
                  <tr >
                    <td>Nombre pais:</td>
                    <td><input type="text" name="txt-nombre-pais" id="txt-nombre-pais" class="form-control"></td>
                  </tr>           
                  <tr>
                    <td>Abreviatura pais:</td>
                    <td><input type="text" name="txt-abreviatura-pais" id="txt-abreviatura-pais" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>Codigo telefonico pais:</td>
                    <td><input type="text" name="txt-codigo-telefono-pais" id="txt-codigo-telefono-pais" class="form-control"></td>
                  </tr>
                </tbody>
              </table>
              <input type="button" name="btn-guardar-pais" value="Guardar" class="btn btn-primary" id="btn-guardar-pais">
              <input type="button" name="btn-actualizar-pais" id="btn-actualizar-pais" value="Actualizar" class="btn btn-info" style="display: none;">
              </form>
            </div>
            <div class="well col-md-6" id="div-pais">
                <span class="glyphicon glyphicon-search" onclick="buscarPais()"></span>&nbsp&nbsp&nbsp
                <input type="text" id="txt-busqueda" placeholder="Busqueda" style="border-radius:8px">
                <div id="div-busqueda">
                  <table id="tbl-busquedas" class="table table-striped">
                    <thead></thead>
                    <tbody>
                    </tbody>
                  </table>
                  
                </div>
                <table id="tbl-pais" class="table table-striped">
                  <thead>
                    <th>Pais</th>
                    <th>Codigo telefono</th>
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
   <script type="text/javascript" src="../js/soundmanager2.min.js"></script>
  <script type="text/javascript" src="../js/player.js"></script>
  <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../js/jquery-confirm.min.js"></script>
  <script type="text/javascript" src="../js/navigation.js"></script>
  <script src="../js/admin-pais.js"></script>
</body>
</html>