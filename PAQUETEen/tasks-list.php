<?php

  include('database.php');

  $query = "SELECT * from tblproductosen";
  $result = mysqli_query($connection, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($connection));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'name' => utf8_encode($row['Name']),
      'description' => utf8_encode($row['Description']),
      'id' => $row['ID'],
      'price' => $row['Price'],
      'image' =>base64_encode($row['Image'])
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>