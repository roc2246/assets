<?php 

function createForm($table, $method){
    global $connection;
    $sql = "SELECT * FROM $table";
    $result = mysqli_query($connection, $sql);
      if($result){
        header("Content");
        $row = mysqli_fetch_assoc($result);
        if(count($row) >= 0){
          $query = "SHOW COLUMNS FROM $table";
          $res2 = mysqli_query($connection, $query);
          $fieldNames = array();
          while($row = mysqli_fetch_assoc($res2)){
            array_push($fieldNames, $row['Field']);
            
        }
        echo "<form name='uploads'  method='".$method."' autocomplete='off'>";
        for($i = 1; $i<count($fieldNames); $i++){
          echo "<label>" . ucfirst($fieldNames[$i]) . "</label><br>";
          if($fieldNames[$i] == 'image'){
            enableUpload();
          } else {
            echo "<input type='text' name='" .$fieldNames[$i] . "'><br><br>";
          }
        }
        echo "<button type='submit' value='submit' name='submit'>submit</button>";
        echo "</form>";
        } 
      }
  }

?>