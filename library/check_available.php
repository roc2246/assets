<?php 

$count = mysqli_num_rows($result);

    if($count>0)
    {
      echo "User unavailable";
    } else if($count == 0) {
        //Insert Create Record code here
    }

?>