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
    <div class="padding">
        <a class="button" href="special.php">Manage Daily Special</a>
        <a class="button" href="list.php?entity=article">Manage Articles</a>
        <a class="button" href="list.php?entity=reservation">Manage Reservations</a>
        <a class="button" href="list.php?entity=information">Manage Company Information</a>
        <a class="button" href="list.php?entity=product">Manage Products</a>
        <a class="button" href="list.php?entity=board">Manage Tables</a>
        <a class="button" href="login.php?action=logout">Logout</a>
    </div>
</div>
<?php include "partial/footer.php"; ?>
</body>
</html>