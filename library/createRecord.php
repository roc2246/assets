//Checks if username is available, then creates new login credentials if username is available
function checkAvailable($table, $loginPage, $col1, $col2){
  if (empty($_POST[$col1]) && isset($_POST['submit'])|| empty($_POST[$col2]) && isset($_POST['submit'])){
    echo "<h4>Please enter a username and password!</h4>";
  }else if(isset($_POST['submit']) && !empty($_POST)) {
    global $connection;

    $username = $_POST[$col1];
    $password = $_POST[$col2];     
    $btwnQuotes = str_replace("'", " ", $col1);
        
    $query = "SELECT * from $table where $btwnQuotes = '$username'";

    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);

    if($count>0)
    {
      echo "User unavailable";
    } else if($count == 0) {

      //Encrypts password
      $username = mysqli_real_escape_string($connection, $username );   
      $password = mysqli_real_escape_string($connection, $password );
      $hashFormat = "$2y$10$"; 
      $salt = "iusesomecrazystrings22";
      $hashF_and_salt = $hashFormat . $salt;
      $password = crypt($password,$hashF_and_salt);   

      //Creates New User
      $query = "INSERT INTO $table($col1,$col2) ";
      $query .= "VALUES ('$username', '$password')";  
      header('Refresh: 2; URL = ' . $loginPage);
   
      $result = mysqli_query($connection, $query);
      if(!$result) {
          die("QUERY FAILED" . mysqli_error($connection));    
      }else {
          echo "User Created"; 
      }
     }
  } 
}
