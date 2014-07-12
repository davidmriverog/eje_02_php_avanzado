<?php
	class Conectar{

		public static function con(){
			
			$mysqli= new mysqli("localhost","root","");

			$mysqli->select_db("curso");
			$mysqli->query("SET NAMES 'UTF8'");
			return $mysqli;
		}
	}
?>