function showAllData($table) {
  global $connection;
  $query = "SELECT * FROM $table";
  $result = mysqli_query($connection, $query);
  if(!$result) {
      die('Query FAILED' . mysqli_error($connection));
  }
  echo "<option>Select Listing:</option>";

  while($row = mysqli_fetch_assoc($result)) {
     $id = $row['id'];
     $adress = $row['adress'];
     $price = $row['price'];

  echo "<option name = '$id' value='$id'>$id - $adress - $price</option>";
  }