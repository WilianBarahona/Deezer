<!DOCTYPE html>
<html>
<head>
      <title>Freezer - Flow your Music</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="img/favicon.png">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap-social.min.css">
      <link rel="stylesheet" type="text/css" href="css/login.css">
      <link rel="icon" href="img/favicon.png">
</head>


<body class="contenedor login">
    <div id="particles-js"></div>
    <header>
      <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8 img-responsive">
                  <img src="img/freezer.png" alt="Freezer" width="256px">
            </div>
            <div class="col-lg-5 col-md-4 col-sm-0 col-xs-0"></div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                <button onclick="location='register.php'" class="btn btn-shadow coneccion" id="login_button">
                     <!-- VUELVE A LA PAGINA REGISTRE.HTML POR SI EL USUARIO NO TINENE UNA CUENTA -->
                      <span class="label">Resgistrarse</span>
                </button>
            </div>
          </div>
    </header>
          
          <!--Encabezado-->
            <div class="row parrafo-blanco">
             <div class="col-md-3"></div>
               <div class="col-md-6">
                    <p><strong><h1>¿Qué vas a escuchar hoy?</h1></strong></p>
                    <p><h4>Escucha las canciones de tu Flow en Freezer </h4></p>
                    <p><h4>Registrarse</h4></p>
                </div>
                <div class="col-md-3"></div>
           </div>
           <!--Formulario-->
           <div class="row">
               <form class="form-signin">
                    <button class="btn  btn-social btn-facebook style-buttons">Facebook 
                      <i class="fa fa-facebook"></i>
                    </button>
                    <button class="btn  btn-social btn-google style-buttons">Google+
                       <i class="fa fa-google-plus"></i>
                    </button>
                    <br>
                    <table>
                        <tr>
                          <td>
                              <em>
                                    <input type="email" style="padding: 15px 90px 15px 93px;" id="inputEmail" class="form-control" placeholder="Correo Electronico">
                                </em>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <em>
                                   <input type="password" style="padding: 15px 90px 15px 93px;" id="inputPassword" class="form-control" placeholder="Contraseña">
                            </em>
                            <br>
                            <div id="div-mensaje" style="-webkit-border-radius: 0px 20px 20px 40px;box-shadow: 3px 5px 8px 2px rgb(215, 234, 239);;background-color: rgb(243, 247, 242);padding: 5px;display: none;text-align: center;font-size: 12px;">
                            </div>
                          </td>
                        </tr>
                        
                    </table>
                    <h6></h6>
                    <h6 class="tamaño" style="position: relative;">
                         <a href="Freezer-Legal.html" class="tamaño">¿Has olvidado tu contraseña?</a>
                     </h6>
                    <button id="btn-conexion" class="btn btn-info btn-block" type="button" onclick="iniciarSesion();" style="font-size: 12px; position: relative;">
                        <!--onclick="location='index.html'"-->
                         Conectarse
                    </button>
                    
       
                  </form>
        </div>
      
      <!--Enlaces-->
      <div class="row barra" style="margin-top: 115px;">
          <div class="col-md-2 col-lg-3"></div>
        <div class="col-md-8 col-lg-8">
            <p class="navbar-text" style="font-size:11px;">
                    <a href="offers.html" class="navbar-link">Ofertas</a>
                    <a href="features.html" class="navbar-link">Ventajas</a>
                    <a href="devices.html" class="navbar-link">Movil</a>
                    <a href="press.html" class="navbar-link">Prensa</a>
                    <a href="#" class="navbar-link">Trabajos</a>
                    <a href="#" class="navbar-link">Ayuda y contactos</a>
                    <a href="termsOfUse.html" class="navbar-link">Codigos generales de uso</a>
                    <a href="personalInformation.html" class="navbar-link">Datos personales y Cookies</a>
                </p>
            </div>
            <div class="col-md-2 col-lg-1"></div>
        </div>
       
  <script src="js/particles.min.js"></script>
  <script src="js/app.js"></script>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/controlador.js"></script>
</body>
</html>