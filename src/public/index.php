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
</head>
<body>
<h1>Home</h1>
<article>
    <h2><?php echo $articles->Article_Title; ?></h2>
    <p>
        <?php echo $articles->Article_Content; ?>
    </p>
</article>
<div>
    <h2><?php echo $special->Product_Title; ?></h2>
    <p><?php echo $special->Product_Description; ?></p>
</div>
</body>
</html>
