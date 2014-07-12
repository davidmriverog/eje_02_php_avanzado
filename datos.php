<?php
	/* CONTROLADOR */
	require_once("class/clsPersonas.php");

	$pers = new clsPersonas();

	$operacion = $_POST["txt_operacion"];

	switch ($operacion) {
		case 'registrar':
			
			/*Tomamos los Datos*/
			$pers->cedula=$_POST["txt_cedula"];
			$pers->nombres=$_POST["txt_nombres"];
			$pers->apellidos=$_POST["txt_apellidos"];
			$pers->direccion=$_POST["txt_direccion"];
			$pers->estado=$_POST["cmb_estado"];

			/* Efectuamos el Registro */
			$resp=$pers->add_personas();
			

			if($resp==true){				
				?>
				<!-- Respuesta HTML -->
				<div class="alert alert-success alert-dismissible" role="alert">
  					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  						<strong>Felicidades!</strong> Su Registro es Efectuado con Exito..!!
				</div>
				<?php
			}
			else{
			   ?>
			   <div class="alert alert-danger alert-dismissible" role="alert">
  					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  					<strong>Warning - Error!</strong> Al parecer no se efectuó el Registro.
				</div>
			   <?php
			}

			break;
		
		default:
			# code...
			break;
	}

?>