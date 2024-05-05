<?php

include('database.php');

if(isset($_POST['id'])) {
  $id = mysqli_real_escape_string($connection, $_POST['id']);

  $query = "SELECT * from tblproductosen WHERE ID = $id";
  $result = mysqli_query($connection, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($connection));
  }else{
     $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'name' => utf8_encode($row['Name']),
      'description' => utf8_encode($row['Description']),
      'id' => $row['ID'],
      'image' => base64_encode($row['Image']),
      'price' => $row['Price'],
      'place' => utf8_encode($row['Place']),
      'date' => $row['Date']
    );
  }
  $jsonstring = json_encode($json[0]);
  echo $jsonstring;
  }

}

?>