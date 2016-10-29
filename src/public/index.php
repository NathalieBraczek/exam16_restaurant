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
<header><img class="cover" src="../img/Trumpcover.jpg" alt="Image of Trump"></header>
<h1>The Trumpster</h1>
<h2>The perfectly sexist and mexican-hating american Diner - Make Burgers great again!</h2>
<div id="description">
    <p>In this american Diner we serve delicious burgers to Americans - Note ONLY Americans - If you are Mexican we unkindly ask you to fuck off behind a wall!<br>
    Even though it is not Trump-like all our burgers are biological and we know the name of every cow that sacrificied their life to our enjoyment.</p>
</div>
<article>
    <h2><?php echo $articles->Article_Title; ?></h2>
    <p>
        <?php echo $articles->Article_Content; ?>
    </p>
</article>
<div id="dailyspecial">
    <h2><?php echo $special->Product_Title; ?></h2>
    <p><?php echo $special->Product_Description; ?></p>
</div>
</body>
</html>
