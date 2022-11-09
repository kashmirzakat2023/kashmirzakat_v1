<?php
  $db = mysqli_connect("localhost", "kashmivu_id_rsa", "Kashmirzakat@123", "kashmivu_db");
if (!$db) die('could not connect Mysql server');
  if (isset($_POST['query'])) {
      $query = "SELECT * FROM accepted_form WHERE cause_title LIKE '%{$_POST['query']}%' LIMIT 100";
      $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
        echo $res['cause_title']. "<hr/>";
      }
    } else {
      echo "No causes found";
    }
    
  }
?>