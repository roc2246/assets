<?php

function getInventory($table) {
    global $connection;
    $query = "SELECT * FROM $table";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Query FAILED' . mysqli_error($connection));
    }
    
    $i = -1;       
while($row = mysqli_fetch_assoc($result)) {
        //$row[''] variable for each column. Echo in HTML tags if necessary
    }  
}

?>