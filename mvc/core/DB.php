<?php
class DB{
    public $connect;
    public $servername ="localhost";
    public $username="Hoai_Nam07";
    public $password="nam07102001";

    public $dbname="corgear";

    function __construct(){
        $this->connect = mysqli_connect($this->servername,$this->username,$this->password);
        mysqli_select_db($this->connect,$this->dbname);
        mysqli_query($this->connect,"SET NAMES 'utf8'");
    }
}
?>