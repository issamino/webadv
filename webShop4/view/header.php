<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="../javascript-jquery/javascript.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/css.css?version=0">
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="./index.php">Home</a>
                        </li>
                        <li>
                            <a href="./producten.php">Products</a>
                        </li>

                        <?php
                        if (isset($_SESSION['admin']) && $_SESSION['admin'] === '1') {
                            ?>
                            <li>
                                <a href="./orders.php">Orders</a>
                            </li>
                            <li>
                                <a href="./addProduct.php">Add product</a>
                            </li>
                            <li>
                                <a href="./addCategory.php">Add category</a>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li>
                                <a href="./contact.php">Contact</a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (!isset($_SESSION['account'])) {
                            ?>
                            <li>
                                <a href="./register.php"><span class="glyphicon glyphicons-user-add"></span> Create account</a>
                            </li>
                            <li>
                                <a href="./login.php"><span class="glyphicon glyphicon-log-in"></span> Log in</a>
                            </li>
                            <li>
                                <a href="./cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li>
                                <a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a>
                            </li>

                            <li>
                                <a href="./cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

