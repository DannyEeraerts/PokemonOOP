<?php

//

    if(isset($_GET['reset'])) {
        session_unset();
        setcookie("favorites", "", time() - 3600);
        }


