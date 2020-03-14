<?php

use App\Model\Classes\Details;

require_once ('../src/controller/reset_controller.php');
require_once('../src/controller/email_input_controller.php');
require_once("../src/controller/type_controller.php");
require_once("../src/controller/page_controller.php");
require_once("../src/controller/category_controller.php");


/**
 * @var string $disablePreviousPage
 * @var integer $currentPage
 * @var array $types
 * @var array $pokemons
 * @var integer $count
 */

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
        <link href="../public/images/favicon.ico" rel="icon" type="image/x-icon" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../public/css/stylesheet.css"
        <link rel="stylesheet" href="../public/css/all.css"
        <link rel="stylesheet" href="../public/css/fontawesome.css"
    </head>

    <body class= "bg-secondary text-white">
        <div class= "container text-center">
            <h1 class=" my-3">Pokemon World</h1>
            <?php
                if (isset($_COOKIE['favorites'])){
                    echo $_COOKIE['favorites'];
                    $_SESSION['favorites'] = $_COOKIE['favorites'];
                }?>
            <section id ="favorites" class = "mx-0 row border border-dark mt-2 mb-3 d-none">
                <h3 class = "col-12 pl-4 pt-2 pb-1">List of your favorite Pokemons:</h3>
                <div class="col-12">
                    <p id="pokemonFavorite">test</p>
                </div>
                <form action="#" method="POST" class="row" novalidate>
                    <div class="form-group offset-1 col-7 ">
                        <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email to friend">
                        <div class="d-flex justify-content-between">
                            <small id="emailHelp" class="form-text text-muted text-left">We'll never share your email with anyone else.</small>
                            <small id="errorMessage" class="error text-danger text-right pt-1 hide">* <?php echo ($_SESSION['emailErr'])?></small>
                        </div>
                    </div>

                    <div>
                        <input type='hidden' name="favoritePokermonList" value= <?php echo isset($_COOKIE['favorites'])?  $_COOKIE['favorites']: ""; ?> />
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-info mb-3 px-md-5 px-2">Send</button>
                    </div>
                </form>
            </section>

            <section>
                <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                    <div id="errorMessageBox1" class="d-flex justify-content-between alert alert-dark text-info border border-info rounded-0 mb-3">
                        <?= $_SESSION['success_message'];?><span> &nbsp &#x274C</span></div>
                    <?php
                    $_SESSION['success_message']="";
                }
                ?>

                <?php if (isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])) { ?>
                    <div id="errorMessageBox2" class="d-flex justify-content-between alert alert-dark text-danger border border-danger rounded-0 mb-3">
                        <?= $_SESSION['error_message']; ?><span> &nbsp &#x274C</span></div>
                    <?php
                    $_SESSION['error_message']="";
                }
                ?>
            </section>

            <form action="#" method="POST">
                <div class="form-row pt-3 pb-2 border border-white d-flex justify-content-space-between mx-auto">
                    <div class="col-3 pl-2 pl-sm-3">
                        <select id="type" name="type" class="form-control bg-info text-white">
                            <?php
                            foreach ($types as $type) {
                                $test = $type->name;
                                if (--$count <= 1) {
                                    break;
                                }
                                ?>
                                <option value=<?php echo $type->name;
                                        if (isset($_SESSION['type'])){
                                    if ($test === $_SESSION['type']) {
                                        echo " selected";
                                    }
                                }?>
                                ><?php echo $type->name; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                        <small class="form-text text-muted text-center">Choose type</small>
                    </div>
                    <div class="col-3">
                        <input type="number" name="limit" class="form-control bg-info text-white" value = "<?php echo (isset($_SESSION['limit']))?$_SESSION['limit']:18;?>" min = "3" max ="30"  step ="3" placeholder="Amount of Pokemons/page">
                        <small class="form-text text-muted text-center">Amount of Pokemons/page</small>
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-info btn-block">Submit</button>
                        <small class="form-text text-muted text-center">Confirm your choices</small>
                    </div>
                    <div class="col-3 pr-2 pr-sm-3">
                        <a href="?reset" id="resetbutton" class="btn btn-info btn-block">Reset</a>
                        <small class="form-text text-muted text-center">Back to start values</small>
                    </div>
                </div>
            </form>

            <nav aria-label="Page navigation example" class= "mt-4 mb-2 d-flex justify-content-center bg-secondary">
                <ul class="pagination">
                    <li class="page-item <?php echo $disablePreviousPage?>">
                        <a class="page-link" href="index.php?<?php echo $currentPage-1;?>">Previous Page</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="index.php?<?php echo $currentPage;?>"><?php echo $currentPage;?><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="index.php?<?php echo $currentPage+1;?>">Next Page</a>
                    </li>
                        <?php
                    // note: how to put this on top?
                    //require_once("../scr/controller/page_controller.php");?>
                </ul>
            </nav>

            <div class="row">
                <?php
                foreach ($pokemons as $pokemon) {

                    $pokemonName = $pokemon->name;
                    $pokemonDetails = new Details();
                    $detail = $pokemonDetails->getPokemonDetails($pokemonName);
                    $pokemon_sprite = $detail->sprites->front_default
                ?>
                    <div class="col-6 col-md-4">
                        <div class="card mb-4">
                            <img class ="mx-auto d-block" src="<?= $pokemon_sprite ?>" class="mb-2 px-2" width="125px" alt="pokemon">
                            <div class="card-body">
                                <h5 class ="card-text"> <?= ucfirst($pokemonName);?>
                                    <i class=" ml-2 fa fa-heart-o text-danger "></i>
                                </h5>
                                <a href="../templates/detail.php?<?php echo $pokemonName;?>" id="detail_button" class="btn btn-primary">More about <?= ucfirst($pokemonName);?>?</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }?>

            </div>

            <nav aria-label="Page navigation example" class= "d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item <?php echo $disablePreviousPage?>">
                        <a class="page-link" href="index.php?<?php echo $currentPage-1;?>">Previous Page</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="index.php?<?php echo $currentPage;?>"><?php echo $currentPage;?><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="index.php?<?php echo $currentPage+1;?>">Next Page</a>
                    </li>
                    <?php
                    // note: how to put this on top?
                    //require_once("../scr/controller/page_controller.php");?>
                </ul>
            </nav>

        <footer class="container fixed-lg-bottom mx-auto row d-flex align-items-center py-3 mt-2 border border-white">

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
        <script src="../Public/js/messageBox.js"></script>
        <script src="../Public/js/favorite.js"></script>
        <script src="../Public/js/email_verify.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>

    </html>


