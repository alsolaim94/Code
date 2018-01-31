<?php
// Log out process, unsets and destroys session variables 
session_start();
session_unset();
session_destroy(); 

echo "<script>
        alert('You have been Logged Out');
        window.location.href='index.php';
     </script>";

?>