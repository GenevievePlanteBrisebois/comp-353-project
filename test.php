<?php
    session_start();
    if (isset($_SESSION['username'])) {
      // This session already exists, should already contain data
        echo "Username:", $_SESSION['username'], "<br />"
        echo "Password:", $_SESSION['password'], "<br /"
    } else {
            echo "error"
    }
?>
