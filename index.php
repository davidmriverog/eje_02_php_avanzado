<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modulo Personas</title>
    <link href="css/estilos.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <h1>Módulo de Personas</h1>
    <hr>
    <form name="frm_personas" id="frm_personas" action="" method="post">
    <!-- Comienzo del Modal -->
    <!-- Modal -->
<div class="modal fade" id="add_productos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Registro de Personas</h4>
      </div>
      <div class="modal-body">
        <!--
          *************************
            Formulario de Registro
          *************************
         -->
         <div class="row">
              <div class="col-xs-6 col-md-4">Ingrese Cedula:</div>
              <div class="col-xs-12 col-md-8">
                <input type="text" name="txt_cedula" id="txt_cedula" class="form-control" value="" placeholder="Ingrese la Cedula usando lo siguiente (V-00.000.000)">       
              </div>    
          </div>
          <br>
          <div class="row">
              <div class="col-xs-6 col-md-4">Ingrese Nombres:</div>
              <div class="col-xs-12 col-md-8">
                <input type="text" name="txt_nombres" id="txt_nombres" class="form-control" value="" placeholder="Ingresa Aqui tu nombre completo">       
              </div>    
          </div>
          <br>
          <div class="row">
              <div class="col-xs-6 col-md-4">Ingrese Apellidos:</div>
              <div class="col-xs-12 col-md-8">
                <input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" value="" placeholder="Ingresa Aqui tu apellido completo">       
              </div>    
          </div>
          <br>
          <div class="row">
              <div class="col-xs-6 col-md-4">Ingrese Direccion:</div>
              <div class="col-xs-12 col-md-8">
                  <textarea class="form-control" rows="2" name="txt_direccion" id="txt_direccion"></textarea>     
              </div>    
          </div>
          <br>
          <div class="row">
              <div class="col-xs-6 col-md-4">Estatus:</div>
              <div class="col-xs-12 col-md-8">
                <select class="form-control" name="cmb_estado" id="cmb_estado">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                    <option value="3">Suspendido</option>
                    <option value="0" selected="selected">Seleccione</option>  
                </select>    
              </div>    
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" name="btn_guardar" id="btn_guardar">Guardar</button>
      </div>
    </div>
  </div>
</div>
    <!-- Termina el MOdal -->
    <div class="container">
        <div class="contenedor">
            <!--  Panel del menu  -->
            <div class="panel_menu">
                <div class="panel_add">
                  <div class="panel panel-default">
                      <div class="panel-body">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#add_productos">
                               <span class="glyphicon glyphicon-plus"></span> Productos
                            </button>
                      </div>
                  </div>
                </div>
                <div class="panel_busqueda">
                  <div class="panel panel-default">
                      <div class="panel-body">
                       Busqueda de datos
                      </div>
                  </div>
                </div>
                <div class="panel_exit">
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-log-out"></span> Salir
                          </button>
                      </div>
                  </div>
                </div>
            </div> <!-- fin del panel del menu -->
            <hr />
            <!-- Mensajes de Respuesta -->
            <div class="panel_respuesta">               
                <hr>
                <div id="respuesta"></div>
                
            </div>
        </div>
    </div> 
    <!-- Operadores --> 
    <input type="hidden" name="txt_operacion" id="txt_operacion" value="">  
    </form>
    <script src="dist/js/jquery-1.10.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js"></script>

    <!-- Eventos Interaccion del PLC -->
    <script type="text/javascript">

         $('#add_productos').on('shown.bs.modal', function () {
              
              $("#txt_cedula").focus();

              $("#btn_guardar").click(function(){
                // Validamos
                if($("#txt_cedula").val().length<1){
                   alert("El Campo Cedula es Obligatorio");
                   $("#txt_cedula").focus();

                   return false;
                }
                else if($("#txt_nombres").val().length<1){
                   alert("El Campo Nombre es Obligatorio");
                   $("#txt_nombres").focus();

                   return false;
                }
                else if($("#txt_apellidos").val().length<1){
                   alert("El Campo Apellido es Obligatorio");
                   $("#txt_apellidos").focus();

                   return false;
                }  
                else if($("#txt_direccion").val().length<1){
                   alert("El Campo Direccion es Obligatorio");
                   $("#txt_direccion").focus();

                   return false;
                }
                else if($("#cmb_estado").val()==0){
                   alert("El Campo Estado es Obligatorio");
                   $("#cmb_estado").focus();

                   return false;
                }
                else{

                    $("#txt_operacion").val("registrar");
                    /* Enviamos los datos a peticion al servidor */
                    $.ajax({
                      type:'POST',
                      data: $("#frm_personas").serialize(),
                      url:'datos.php',
                      beforeSend: function(){
                         $("#respuesta").html("<div class='progress progress-striped active'><div class='progress-bar'  role='progressbar' aria-valuenow='45' aria-valuemin='0' aria-valuemax='100' style='width: 100%'><span class='sr-only'>100% Complete</span></div></div>");
                      },
                      success: function(data){
                         // Cerramos el Modal
                         $('#add_productos').modal('hide');
                         // Mostramos la Respuesta en el DIV
                         $("#respuesta").html(data);

                         //Limpiamos el Formulario
                          $("#txt_cedula").val("");
                          $("#txt_nombres").val("");
                          $("#txt_apellidos").val("");
                          $("#txt_direccion").val("");
                          $("#cmb_estado").val("0");

                          // Recargamos 
                          //location.reload();


                      }
                    });
                }
              });
          });   
    </script>
  </body>
</html>