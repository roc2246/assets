<?php
function getapi($table){
    header('Content-type: application/json');
    global $connection;
    $sql = "SELECT * FROM $table";
    $result = mysqli_query($connection, $sql);
      if($result){
        header("Content");
        $json =  "[";
        while($row = mysqli_fetch_assoc($result)){
            $response = array();
             $columns =  array_keys($row);
            for($i = 0; $i<count($row); $i++){
                $response[$columns[$i]] = $row[$columns[$i]];
            }
            $json .= json_encode($response, JSON_PRETTY_PRINT) . ",";
            
        }
        $json = rtrim($json, ",");
        $json .= "]";
  }
  echo $json;
}

?>