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

require_once __DIR__ . '/../../vendor/autoload.php';

$databaseConnection = new DatabaseConnection();
$database           = $databaseConnection->connect();
$articlesRepo       = new ArticleRepo($database);

$orderDirections = [
    'DESC' => 'Newest first',
    'ASC'  => 'Oldest first'
];
$order  = isset($_POST['order']) ? $_POST['order'] : 'DESC';

$articles = $articlesRepo->getAll($order);
?>
<html>
    <head>
        <title>Blog</title>
        <link rel="stylesheet" type="text/css" href="css/restaurantStyle.css"/>
    </head>
    <body>
        <?php include "partial/header.php"; ?>
        <div class="content">

            <form action="articles.php" method="post">
                <label for="order">Order by</label>
                <select name="order" title="Order" onchange="getElementById('filter_button').click();">
                    <?php foreach ($orderDirections as $value => $label) :?>
                        <option value="<?php echo $value; ?>"<?php echo $order == $value ? " selected" : ""; ?>><?php echo $label; ?></option>
                    <?php endforeach; ?>
                </select>
                <button id="filter_button" type="submit">Ok</button>
            </form>

            <div class="container">
                <?php foreach ($articles as $article) : ?>
                    <div class="box">
                        <h2 class="title"><?php echo $article->Article_Title; ?></h2>
                        <p class="padding">
                            <?php echo $article->Article_Created; ?><br>
                            <?php echo $article->Article_Content; ?>
                        </p>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <?php include "partial/footer.php"; ?>
    </body>
</html>
