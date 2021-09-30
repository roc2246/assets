<?php
//Checks if username is available, then creates new login credentials if username is available
function checkAvailable($table, $loginPage, $col1, $col2){
  if (empty($_POST[$col1]) && isset($_POST['submit'])
  || empty($_POST[$col2]) && isset($_POST['submit'])){
    
    echo "<h4>Please enter a username and password!</h4>";

  }else if(isset($_POST['submit']) && !empty($_POST)) {
    global $connection;

    //For created logins
    $username = $_POST[$col1];
    $password = $_POST[$col2];     
    $btwnQuotes = str_replace("'", " ", $col1);
    ///////////////////////// 
    
    $query = "SELECT * from $table where $btwnQuotes = '$username'";

    $result = mysqli_query($connection, $query);

      //Creates New Record
      $query = "INSERT INTO $table($col1,$col2) ";
      $query .= "VALUES ('$username', '$password')";  

      //For redirection if registering login crtedentials
      header('Refresh: 2; URL = ' . $loginPage);
   
      $result = mysqli_query($connection, $query);
      if(!$result) {
          die("QUERY FAILED" . mysqli_error($connection));    
      }else {
          echo "User Created"; 
      }
  } 
}
?>