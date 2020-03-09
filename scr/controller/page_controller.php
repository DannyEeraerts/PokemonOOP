<?php

$currentPage =$_SERVER['QUERY_STRING'];

if (intval($currentPage) <= 0 || $currentPage == ""){
    $currentPage = 1;
    $aria_disabled ="true";
}else {
    $currentPage = (int)$currentPage;

}

$_SESSION['currentPage'] = $currentPage;

if (intval($currentPage) <= 1 || $currentPage == "" ){
    $disablePreviousPage = "disabled";
    $aria_disabled ="false";
} else {
    $disablePreviousPage = "";
}
?>

<li class="page-item <?php echo $disablePreviousPage?>">
    <a class="page-link" href="index.php?<?php echo $currentPage-1;?>">Previous Page</a>
</li>
<li class="page-item active">
    <a class="page-link" href="index.php?<?php echo $currentPage;?>"><?php echo $currentPage;?><span class="sr-only">(current)</span></a>
</li>
<li class="page-item">
    <a class="page-link" href="index.php?<?php echo $currentPage+1;?>">Next Page</a>
</li>


