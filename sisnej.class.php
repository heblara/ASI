<?php
class CargoMania {
    //constructor
    function CargoMania() {

    }
    function setName2(){
		$con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("mysql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SET NAMES 'utf8'";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->execute(); // Ejecutamos la consulta

        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
 else
            return false;
        unset($dbh);
        unset($query);
	}

    function consultar_usuario($campos) {
        $con = new DBManager(); //creamos el objeto $con a partir de la clase DBManager
        $dbh = $con->conectar("pgsql"); //Pasamos como parametro que la base de datos a utilizar para el caso MySQL.
        $sql = "SELECT * FROM usuario where Usuario=:Usuario and Contrasena=md5(:Pwd) and Estado='1'";
        $query = $dbh->prepare($sql); // Preparamos la consulta para dejarla lista para su ejecucion
        $query->bindParam(":Usuario",$campos[0]);
        $query->bindParam(":Pwd",$campos[1]);
        $query->execute(); // Ejecutamos la consulta
        if ($query)
            return $query; //pasamos el query para utilizarlo luego con fetch
 		else
            return false;
        unset($dbh);
        unset($query);
    }
}

?>
