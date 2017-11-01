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
              <button onclick="location='login.php'" class="btn btn-shadow coneccion" id="login_button">
            <span class="label">Conectarse</span>
          </button>
            </div>
          </div>
    </header>
          
          <!--Encabezado-->
            <div class="row parrafo-blanco">
             <div class="col-md-3"></div>
               <div class="col-md-6">
                    <p><strong><h1>Tu música. Tu Flow.</h1></strong></p>
                    <p><h4>Disfruta de tu música donde quieras y cuando quieras.</h4></p>
                    <p><h4>y descubre las colecciones de música por género.</h4></p>
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
                          <td colspan="2">
                              <em>
                                    <input type="email" id="inputEmail" class="form-control" placeholder="Correo Electronico" required autofocus>
                                </em>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <em>
                                   <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña (6 caracteres minimo)" required>
                                </em>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                              <em>
                                  <input type="text" id="inputText" class="form-control" placeholder="Nombre de usuario" required>
                                </em>
                          </td>
                        </tr>
                          <tr>
                            <td>
                                <em>
                                        <select id="slc-sexo" class="form-control" >
                                            <option value="0">Sexo</option>
                                            <option value="1"> Mujer</option>
                                            <option value="2">Hombre</option>
                                        </select>
                                    </em>
                            </td>
                            <td>
                                <em>

                                        <select id="slc-edad" class="form-control">
                                          <option value="0">Edad</option>
                                          <?php  
                                            for ($i=1; $i <100 ; $i++) { 
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                          }

                                          ?>
                                  </select>
                              </em>
                          </td>
                      </tr>
                    </table>
                    <h6></h6>
                    <div id="div-mensaje" style="-webkit-border-radius: 0px 20px 20px 40px;box-shadow: 3px 5px 4px 2px rgb(215, 234, 239);;background-color: rgb(243, 247, 242);padding: 5px;display: none;text-align: center;font-size: 12px;margin: 0px 28px 0px 28px;border:">
                    </div>
                    <br>
                    <button onclick="registrarUsuario();" class="btn btn-info btn-block" type="button" style="font-size: 12px; position: relative;">
                         Registrarse
                    </button>
                    <h6 class="tamaño" style="position: relative;">
                         Al hacer clic en "Registrarse", aceptas las
                         <a href="Freezer-Legal.html" class="tamaño">Condiciones generales de uso.</a>
                     </h6>
       
                  </form>
        </div>
      
      <!--Enlaces-->
      <div class="row barra">
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
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/app.js"></script>
  <script src="js/controlador.js"></script>
</body>
</html>