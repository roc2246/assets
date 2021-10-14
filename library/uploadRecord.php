<?php 

function uploadRecord($table){
  if(isset($_POST['submit'])) {
  global $connection;
        
  //For use in query
  function getFieldNames($table){
    global $connection;
    $sql = "SELECT * FROM $table";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    if(count($row) >= 0){
      $query = "SHOW COLUMNS FROM $table";
      $res2 = mysqli_query($connection, $query);
      $fieldNames = array();
      while($row = mysqli_fetch_assoc($res2)){
        if ($row['Field'] == 'id'){
          continue;
        }else{
          array_push($fieldNames, $row['Field']);
        }
    }
    return implode(",", $fieldNames);
  }
}

  //For use in query
  function getFieldValues($table){
    global $connection;
    $sql = "SELECT * FROM $table";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    if(count($row) >= 0){
      $query = "SHOW COLUMNS FROM $table";
      $res2 = mysqli_query($connection, $query);
      $values = array();
      $fieldNames = explode(",",getFieldNames($table));
      while($row = mysqli_fetch_assoc($res2)){
       if ($row['Field'] == 'image'){
            array_push($values, $_FILES["image"]["name"]);
          }
        }
    }
    for($i=0; $i<count($fieldNames); $i++){
      if($fieldNames[$i]=='image'){
        continue;
      }else{
      array_push($values, $_POST[$fieldNames[$i]]);
      }
    }
    $values = implode("','", $values);
    return $values;
  }

  $query = "INSERT INTO listings(".getFieldNames($table).") VALUES ('".getFieldValues($table)."')";
  if (mysqli_query($connection, $query)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $query . "<br><br>" . mysqli_error($connection)."<br><br>";

  }
}
}
?>