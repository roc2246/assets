<?php

function getapi($table){
    global $connection;
    $sql = "SELECT * FROM $table";
    $result = mysqli_query($connection, $sql);
      if($result){
        header("Content");
        while($row = mysqli_fetch_assoc($result)){
            $response = array();
             $columns =  array_keys($row);
            for($i = 0; $i<count($row); $i++){
                $response[$columns[$i]] = $row[$columns[$i]];
            }
        echo json_encode($response, JSON_PRETTY_PRINT) . "<br>"; 
        }
  }
}

?>