<?php
  session_start();
?>
<div class="container-fluid">

  <!--Barra de navegacion-->
  <div class="row" >
      <!-- <div class="col-lg-1 col-md-0"></div> -->
      <div class="col-lg-10 col-md-6">
            <nav class="navbar navbar-center">
              <div class="container-fluid">
                <ul class="nav navbar-nav">
                  <li><a class="active" href="#">Mis Datos</a></li>
                  <li><a href="#">Notificaciones y Compartir</a></li> 
                  <li><a href="#">Mis Dispositivos Conectados</a></li>
                </ul>
              </div>
            </nav>
      </div> 
      
     </div>  
</div>
<!-- Fin barra de navegacion-->
<!--Formulario-->
 <div class="container-fluid well card">
        <div class="container-fluid">
          <div class="row col-lg-12 col-sm-6 col-md-6 col-xs-12">
            <div class="col-lg-3" id="foto-perfil">
             <!-- <img src="img/usuario.jpg" >-->
            </div>
              <div class="col-lg-5">

                <h4>Mi Oferta</h4>
                <hr>
                <p>Actualmente disfrutas de la versión gratuita de Deezer.</p><br>
                <h4>Conectarse</h4>
              </div>
              <div class="col-lg-3">
                <button class="btns">Gestionar Mi Suscripcion</button>
              </div>
          </div>
        </div>
          <div class="contenedorFormulario">
            <input type="hidden" name="txt-id-usuario" id="txt-id-usuario" value='<?php echo $_SESSION["id_usuario"]?>'>
            <table class="table" style="width: 500px">
                <tr>
                    <td class="td">Tu correo electrónico:</td>
                    <td ><input class="form-control" type="email" name="txt-correo" id="txt-correo"></td>
                    <td><button class="btns">Modificar</button></td>
                </tr>
                <tr>
                  <td class="td">Tu contraseña:</td>
                  <td><input class="form-control" type="password" name="txt-contrasenia" id="txt-contrasenia"></td>
                  <td><button class="btns">Modificar</button></td>
                </tr>
            </table>

          </div>
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-2"></div>
              <div class="col-lg-5">
                <h4>Datos Deezer visibles para otros usuarios</h4>
              </div>
              <div class="col-lg-4"></div>
          </div>
      </div>
      <div class="contenedorFormulario">
          <table class="table" style="width: 500px">
              <tr>
                <td class="td">Sexo</td>
                <td>
                  <label > <input type="radio" name="rbt-sexo" value="f">Mujer</label>
                  <label ><input type="radio" name="rbt-sexo" value="m">Hombre</label>
                </td>

              </tr>
              <tr>
                <td class="td">Nombre de usuario</td>
                <td><input class="form-control" type="text" name="txt-nombre-usuario" id="txt-nombre-usuario"></td>        

              </tr>
          </table>
      </div>
       <div class="container-fluid">
          <div class="row">
            <div class="col-lg-2"></div>
              <div class="col-lg-5">
                <h4>Datos privados</h4>
              </div>
              <div class="col-lg-4">
              </div>
          </div>
        </div>
          
       <div class="contenedorFormulario">
            <table class="table" style="width: 500px">
                <tr>
                    <td class="td">Apellido(s):</td>
                    <td ><input class="form-control" type="text" name="txt-apellido" id="txt-apellido"></td>
                   
                </tr>
                <tr>
                  <td class="td">Nombre</td>
                  <td><input class="form-control" type="text" name="txt-nombre" id="txt-nombre"></td>                    
                </tr>
                <tr>
                  <td class="td">Fecha de Nacimiento</td>
                  <td ><input class="form-control" type="date" name="txt-fecha-nacimiento" id="txt-fecha-nacimiento">
                  </td>
                </tr>
               
                <tr>
                  <td class="td">Movil</td>
                  <td><input type="phone" name="txt-telefono" class="form-control"></td>
                </tr>
                <tr>
                  <td class="td">Idioma</td>
                  <td><select>
                      <option>Español</option>
                      <option>English</option>
                  </select>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <button type="button" class="btn btn-guardar" id="btn-guardar-actualizacion">Guardar</button>
                  </td>
                </tr>
                
            </table>
              <button type="button" class="btn btn-danger" style="padding:7px 200px 7px 200px" id="btn-eliminar">
                          Eliminar Cuenta        
               </button>
          </div>    
<!--Fin Formulario-->  

</div>
<script type="text/javascript" src="js/acciones-usuario.js"> </script>

