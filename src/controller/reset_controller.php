<?php
    if(isset($_GET['reset'])) {
        session_unset();
        setcookie("favorites", "", time() - 3600);
        var_dump(count($_COOKIE));
        }
?>

