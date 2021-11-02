<?php 

function updateRecords($table, $redirect) {
  if(isset($_POST['submit2'])) {  
    global $connection;
    getFieldNames($table);
    getFieldValues($table);
    
    $fieldNames = explode(",", getFieldNames($table));
    $fieldValues = explode(",", getFieldValues($table));


  $queryID = "SELECT * FROM $table";
  $resultID = mysqli_query($connection, $queryID);
  $row = mysqli_fetch_assoc($resultID); 
  $id = $row['id'];

  $ID = $_POST['id'];
  
    $query = "UPDATE $table SET ";
    for($i=0; $i<count($fieldNames); $i++){
      if($fieldNames[$i] == end($fieldNames)){
        $query .= "$fieldNames[$i] = $fieldValues[$i]'  ";
      }else if($i == 0){
        $query .= "$fieldNames[$i] = '$fieldValues[$i],  ";
      }else{
        $query .= "$fieldNames[$i] = $fieldValues[$i], ";
      }
    }
    $query .= "WHERE id = '$ID'";

    $result = mysqli_query($connection, $query);
      if(!$result) {
        die("QUERY FAILED" . mysqli_error($connection)); 
      }else 
        header('location:'.  $redirect);
        }   
      }

?>