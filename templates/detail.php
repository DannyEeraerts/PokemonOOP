<?php
require_once("../src/controller/detail_controller.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Pokemon World</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content= "Pokemon OOP-Exercice">
    <meta name ="keywords" content = "Pokemon" />
    <meta name ="author" content = "Danny Eeraerts" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/stylesheet.css"

</head>

<body class= "bg-secondary text-white">
<div class= "container text-center">
    <h1 class=" my-3">Pokemon World</h1>
    <div class = "row border pt-2 pb-3 my-5">
        <h2 class="col-12 text-center  " ><?=ucfirst($name)?></h2>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 pt-md-5">
            <img  src="<?php echo $imageFront ?>" class="mb-2 px-2" width="175px" alt="pokemon">
            <img  src="<?php echo $imageBack ?>" class="mb-2 px-2" width="175px" alt="pokemon">
        </div>
        <div class="col-12 col-md-6 pt-3 pb-2 py-md-5 border">
            <p ><span class="black">id: </span><?=$id?> </p>
            <p> <span class="black">height:</span> <?=$height." "?>m</p>
            <p> <span class="black">weight:</span> <?=$weight." "?>kg</p>
            <?php foreach ($types as $type) {
                array_push($tempArray,$type->type->name);
            }?>
            <p> <span class="black">type(s):</span> <?php echo implode(", ", $tempArray);?></p>
            <?php foreach ($abilities as $ability) {
                array_push($tempArray2,$ability->ability->name);
            }?>
            <p> <span class="black">abilities:</span> <?php echo implode(", ", $tempArray2);?></p>
        </div>
        <div class="col text-center">
            <a class="btn btn-info mt-5 text-center" href="../Public/index.php" role="button">Back to overview</a>
        </div>

    <footer id="footer_detail_page" class="container fixed-lg-bottom mx-auto row d-flex align-items-center py-3 mt-5 border border-white">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left">
            <p>&copy;&nbsp;<?php echo date("Y")." "; ?><span>ED</span>web&photo Studio</p>
        </div>

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">
            <a href="#" class ="text-light mr-4">disclaimer</a>
            <a href="#" class ="text-light mr-4">privacy policy</a>
            <a href="#" class ="text-light mr-2">cookie policy</a>
        </div>
    </footer>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>