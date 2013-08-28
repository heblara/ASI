<?php
class ConfigDB{
        var $DB_MSSQL;
        var $Server_MSSQL;
        var $User_MSSQL;
        var $Password_MSSQL;
        function ConfigDB(){
			$this->DB_MySQL = "cargomania";
			$this->Server_MySQL = "localhost";
			$this->User_MySQL = "postgres";
			$this->Password_MySQL= "analisis2";
        }
}

?>
