<?php

define('host', "localhost");

define('user', "root");

define('password', 'anshul@1998');

define('database', "anshul");





function getConnection(){

    

   $con = new mysqli(host, user, password, database);

    

    mysqli_error($con);

    

return $con;



}

//print_r(getConnection());



?>

