<?php
 session_start();
 session_destroy();   // function that Destroys Session 
 echo '<script>alert("Logout Successful");</script>';
 echo '<script>window.location = "index.php"</script>';
 ?>