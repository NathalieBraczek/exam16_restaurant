<?php
/**
 * Examen 2016: Restaurant Project
 *
 * @since         1.0.0
 * @author        Nathalie Braczek <nathalie.braczek.gmx.de>
 * @copyright (C) 2016 Nathalie Braczek. All rights reserved.
 * @license       MIT, see LICENCE
 */
use Nathalie\Exam16\Session;

require_once __DIR__ . '/../../vendor/autoload.php';

(new Session)->assertValidSession();
?>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="css/restaurantStyle.css"/>
    </head>
    <body>
        <?php include "partial/header.php"; ?>
<div class="box center">
    <h1 class="title">Welcome Master Trumpster!</h1>
    <br>
    <a class="button" href="#">Manage Daily Special</a>
    <br>
    <a class="button" href="http://localhost/exam16/public/list.php?entity=article">Manage Articles</a>
    <br>
    <a class="button" href="http://localhost/exam16/public/list.php?entity=reservation">Manage Reservations</a>
    <br>
    <a class="button" href="http://localhost/exam16/public/list.php?entity=information">Manage Company Information</a>
    <br>
    <a class="button" href="http://localhost/exam16/public/list.php?entity=product">Manage Products</a>
    <br>
    <a class="button" href="http://localhost/exam16/public/list.php?entity=table">Manage Tables</a>
</div>
<?php include "partial/footer.php"; ?>
</body>
</html>