<?php
	
	require_once("clsdatos.php");

  class clsPersonas {
	
	var $respuesta=false;

	var $cedula="";
	var $nombres="";
	var $apellidos="";
	var $direccion="";
	var $estado="";


	  public function add_personas(){	

		$sql="select regristra_productos('$this->cedula','$this->nombres','$this->apellidos','$this->direccion','$this->estado')";

		$res=mysqli_query(Conectar::con(),$sql);

		while($reg=$res->fetch_array()){
			$this->respuesta=$reg;
		}
		return $this->respuesta;
	  }


  }
?>
