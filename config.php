<?php 
class Database
{
    public $connect;

    public function __construct()
    {
        $this->connect = mysqli_connect("localhost","root","","a33kasir");
    }

    function return_db()
    {
        return $this->connect;
    }
}
?>