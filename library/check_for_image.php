<?php 

function isthereimage($table){
  global $connection;
  $query = "SELECT * FROM $table";
  $result = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($result)) {
    if ($row[/*put name of column that stores 
        image url in the quotes on the right of this comment*/''] == ''){
      //Code to display no image
  } else {
      //Code to display image
  }
}
}
?>