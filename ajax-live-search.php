<?php
    include 'assets/connection.php';
   if (isset($_POST['query'])) {
      $query = "SELECT * FROM accepted_form WHERE cause_title LIKE '%{$_POST['query']}%' LIMIT 100";
      $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
            $cause = $res["id"] ;
        echo "<a href='raise-detail.php?campaign=$cause'>". $res['cause_title']."</a>". "<hr/>";
      }
    } else {
      echo "No causes found";
    }
    
  }
?>