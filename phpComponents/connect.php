<?php 

/** 
 * General purpose connection parameters for mySql databases
 * 
 * PHP version 7.4
 * 
 * @category PHP
 * @package  Components
 * @author   Riley Childs <riley.childs@yahoo.com>
 * @license  Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)
 * @link     none available
 */

 /** 
  * Returns the login credentials for a database
  * 
  * @param string $dbname the name of the database to log into
  * 
  * @return Login credentials
  */
function credentials($dbname) 
{
    if ($_SERVER['HTTP_HOST'] == 'localhost') { 
        $servername = 'localhost';
        $username = 'root';
        $password = 'root';
        $database = $dbname;
    } else if ($_SERVER['HTTP_HOST'] == 'wh963069.ispot.cc') {
        $servername = 'wh963069.ispot.cc';
        $username = 'childswe_eCommerce';
        $password = 'VJChkRFx';
        $database = 'childswe_'.$dbname;
    } else {
        $servername = 'localhost';
        $username = 'roc09090';
        $password = 'je5umyju5';
        $database = 'roc09090_wordpress';
    }

    return $servername;
    return $username;
    return $password;
    return $database;
}

credentials($dbname);

$connection = mysqli_connect($servername, $username, $password, $database);  
if (!$connection) {
     die("Database connection failed");
}


?>