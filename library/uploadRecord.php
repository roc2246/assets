<?php 

function uploadRecord(){
    if(isset($_POST['submit'])) {
    global $connection;
        
    //Insert variables here (based off of textbox neames)
    $image = $_FILES["image"]["name"];

    $query = "INSERT INTO inventory(/*database columns */) VALUES (/*Form values */)";
    $result = mysqli_query($connection, $query);
/*
      if( == '') {
          echo "<p class='upload-fail'>please enter a brand name</p>";
          
        } 
        if(== '') {
          
          echo "<p class='upload-fail'>please enter a model name</p>";
        }
        if(== '') {
          
          echo "<p class='upload-fail'>please enter a size</p>";
        } 
        if( == '') {
          
          echo "<p class='upload-fail'>please enter a price</p>";
        } 
    */ 
        if(!$result) {
            die('Query FAILED: ' . mysqli_error($connection));
        } else {
            echo "<p class='upload-success'>Item successfully added to inventory.</p>";
          }
        }
      }

?>