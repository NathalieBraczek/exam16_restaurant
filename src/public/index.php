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
use Nathalie\Exam16\InformationRepo;
use Nathalie\Exam16\ProductRepo;

require_once __DIR__ . '/../../vendor/autoload.php';

$databaseConnection = new DatabaseConnection();
$database           = $databaseConnection->connect();
$articleRepo        = new ArticleRepo($database);
$articles           = $articleRepo->getNewest();
$productsRepo       = new ProductRepo($database);
$special            = $productsRepo->getSpecial();
$informationRepo    = new InformationRepo($database);

$slogan      = $informationRepo->getByName('Slogan')->Information_Content;
$description = $informationRepo->getByName('Description')->Information_Content;
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
                <h2><?php echo $slogan; ?></h2>

                <p><?php echo nl2br($description); ?></p>
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
