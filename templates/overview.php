<?php

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
            <form action="#" method="POST">
                <div class="form-row py-4  border border-white d-flex justify-content-space-between ">
                    <div class="col-4 px-3">
                        <select id="type" name="type" class="form-control">
                            <option selected>choose type</option>
                            <?php
                            // note: how to put this on top?
                            require ("../scr/controller/type_controller.php");?>
                        </select>
                    </div>
                    <div class="col-4 px-3">
                        <input type="number" name="limit" class="form-control" value = "<?php (isset($_POST['limit']))?$_POST['limit']:18;?>" min = "3" max ="30"  step ="3" placeholder="Amount of Pokemons/page">
                    </div>
                    <div class="col-4 px-3">
                        <button type="submit" class="btn btn-info btn-block">Submit</button>
                    </div>

                </div>
            </form>

            <nav aria-label="Page navigation example" class= "mt-3 d-flex justify-content-center bg-secondary">
                <ul class="pagination">
                    <?php
                    // note: how to put this on top?
                    require_once("../scr/controller/page_controller.php");?>
                </ul>
            </nav>

            <?php
            // note: how to put this on top?
            require_once("../scr/controller/category_controller.php");?>


            <nav aria-label="Page navigation example" class= "mt-3 d-flex justify-content-center">
                <ul class="pagination">
                    <?php
                    // note: how to put this on top?
                    require_once("../scr/controller/page_controller.php");?>
                </ul>
            </nav>

        <footer class="container fixed-lg-bottom mx-auto row d-flex align-items-center py-3 mt-3 border border-white">

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


