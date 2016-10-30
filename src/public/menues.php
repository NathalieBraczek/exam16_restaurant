<?php
/**
 * Examen 2016: Restaurant Project
 *
 * @since         1.0.0
 * @author        Nathalie Braczek <nathalie.braczek.gmx.de>
 * @copyright (C) 2016 Nathalie Braczek. All rights reserved.
 * @license       MIT, see LICENCE
 */

use Nathalie\Exam16\DatabaseConnection;
use Nathalie\Exam16\ProductsRepo;

require_once __DIR__ . '/../../vendor/autoload.php';

$databaseConnection = new DatabaseConnection();
$database           = $databaseConnection->connect();
$productsRepo       = new ProductsRepo($database);

$restrictions = ['Vegan', 'Vegetarian', 'Pescetarian', 'Normal'];
$categories   = ['Food', 'Drink', 'Menue'];
$restriction  = isset($_POST['restriction']) ? $_POST['restriction'] : null;
$category     = isset($_POST['category']) ? $_POST['category'] : null;

$products = $productsRepo->getFiltered($category, $restriction);
?>
<html>
    <head>
        <title>Menues</title>
        <link rel="stylesheet" type="text/css" href="css/restaurantStyle.css"/>
    </head>
    <body>
        <?php include "partial/header.php"; ?>
        <div class="content">

            <form action="menues.php" method="post">
                <label for="category">Category</label>
                <select name="category" title="Category" onchange="getElementById('filter_button').click();">
                    <option value="">Any</option>
                    <?php foreach ($categories as $c) : ?>
                        <option value="<?php echo $c; ?>"<?php echo $category == $c ? " selected" : ""; ?>><?php echo $c; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="restriction">Restriction</label>
                <select name="restriction" title="Restriction" onchange="getElementById('filter_button').click();">
                    <option value="">Don't care - if it's not Mexican!</option>
                    <?php foreach ($restrictions as $r) : ?>
                        <option value="<?php echo $r; ?>"<?php echo $restriction == $r ? " selected" : ""; ?>><?php echo $r; ?></option>
                    <?php endforeach; ?>
                </select>
                <button id="filter_button" type="submit">Filter</button>
            </form>

            <div class="container">
                <?php foreach ($products as $product) : ?>
                    <div class="box<?php echo $product->Product_Special == 1 ? " special" : ""; ?>">
                        <h2 class="title"><?php echo $product->Product_Title; ?></h2>
                        <h3 class="padding"><?php echo $product->Product_Restriction . ' ' . $product->Product_Category; ?></h3>
                        <p class="padding">
                            <?php echo $product->Product_Description; ?>
                            <span class="price">$ <?php echo number_format($product->Product_Price, 2); ?></span>
                        </p>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <?php include "partial/footer.php"; ?>
    </body>
</html>
