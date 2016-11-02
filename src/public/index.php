<?php
/**
 * Examen 2016: Restaurant Project
 *
 * @since         1.0.0
 * @author        Nathalie Braczek <nathalie.braczek.gmx.de>
 * @copyright (C) 2016 Nathalie Braczek. All rights reserved.
 * @license       MIT, see LICENCE
 */

use Nathalie\Exam16\ArticleRepo;
use Nathalie\Exam16\DatabaseConnection;
use Nathalie\Exam16\ProductsRepo;

require_once __DIR__ . '/../../vendor/autoload.php';

$databaseConnection = new DatabaseConnection();
$database           = $databaseConnection->connect();
$articleRepo        = new ArticleRepo($database);
$articles           = $articleRepo->getNewest();
$productsRepo       = new ProductsRepo($database);
$special            = $productsRepo->getSpecial();
?>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="css/restaurantStyle.css"/>
    </head>
    <body>
        <?php include "partial/header.php"; ?>
        <div class="content">
            <div id="description">
                <h1>The Trumpster</h1>
                <h2>The Perfectly Sexist and Mexican-hating American Diner - Make Burgers Great Again!</h2>

                <p>In this american Diner we serve delicious burgers to Americans - Note <strong>ONLY</strong> Americans
                    -
                    If you are Mexican we unkindly ask you to fuck off behind a wall!<br>
                    Even though it is not Trump-like all our burgers are biological and we know the name of every cow
                    that sacrificied their life to our enjoyment. - Their name was Hillary</p>
            </div>

            <div class="container">

                <div class="box">
                    <h2 class="title">News</h2>
                    <h3  class="padding"><?php echo $articles->Article_Title; ?></h3>
                    <p  class="padding">
                        <?php echo $articles->Article_Created; ?>
                        <br>
                        <?php echo $articles->Article_Content; ?>
                    </p>
                </div>

                <div class="box">
                    <h2 class="title">Daily Special</h2>
                    <h3 class="padding"><?php echo $special->Product_Title; ?></h3>
                    <p class="padding"><?php echo $special->Product_Description; ?></p>
                </div>
            </div>
        </div>
        <?php include "partial/footer.php"; ?>
    </body>
</html>
