<?php

//namespace App\Controller;

$emailErr = "";
$_SESSION['emailErr'] = $emailErr;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    $_SESSION['emailErr'] = $emailErr;

    if ($_SESSION['emailErr'] === "") {
        $_SESSION['email']= $_POST['email'];
        header("Location: ../src/controller/mail_controller.php");
    }
}







