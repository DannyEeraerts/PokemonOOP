<?php

$currentPage = $_SERVER['QUERY_STRING'];

if (intval($currentPage) <= 0 || $currentPage == "") {
    $currentPage = 1;
    $aria_disabled = "true";
} else {
    $currentPage = (int)$currentPage;
}

$_SESSION['currentPage'] = $currentPage;

if (intval($currentPage) <= 1 || $currentPage == "") {
    $disablePreviousPage = "disabled";
    $aria_disabled = "false";
} else {
    $disablePreviousPage = "";
}


