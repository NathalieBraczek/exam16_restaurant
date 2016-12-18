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
use Nathalie\Exam16\ProductRepo;

require_once __DIR__ . '/../../vendor/autoload.php';

$databaseConnection = new DatabaseConnection();
$database           = $databaseConnection->connect();
$productsRepo       = new ProductRepo($database);

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
        <link rel="stylesheet" type="text/css" href="css/rating.css"/>
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
                        <?php $form = 'rating-form-' . $product->Product_ID; ?>
                        <form action="menues.php" method="post" id="<?php echo $form; ?>" class="padding">
                            <fieldset class="rating">
                                <legend>Please rate:</legend>
                                <input type="radio" id="star5-<?php echo $product->Product_ID; ?>" name="rating" value="5" onclick="document.getElementById('<?php echo $form; ?>').submit();"/><label for="star5-<?php echo $product->Product_ID; ?>" title="Rocks!">5 stars</label>
                                <input type="radio" id="star4-<?php echo $product->Product_ID; ?>" name="rating" value="4" onclick="document.getElementById('<?php echo $form; ?>').submit();"/><label for="star4-<?php echo $product->Product_ID; ?>" title="Pretty good">4 stars</label>
                                <input type="radio" id="star3-<?php echo $product->Product_ID; ?>" name="rating" value="3" onclick="document.getElementById('<?php echo $form; ?>').submit();"/><label for="star3-<?php echo $product->Product_ID; ?>" title="Meh">3 stars</label>
                                <input type="radio" id="star2-<?php echo $product->Product_ID; ?>" name="rating" value="2" onclick="document.getElementById('<?php echo $form; ?>').submit();"/><label for="star2-<?php echo $product->Product_ID; ?>" title="Kinda bad">2 stars</label>
                                <input type="radio" id="star1-<?php echo $product->Product_ID; ?>" name="rating" value="1" onclick="document.getElementById('<?php echo $form; ?>').submit();"/><label for="star1-<?php echo $product->Product_ID; ?>" title="Sucks big time">1 star</label>
                            </fieldset>
                            <input type="hidden" name="Product_ID" value="<?php echo $product->Product_ID; ?>">
                        </form>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <?php include "partial/footer.php"; ?>
    </body>
</html>
