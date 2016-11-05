<?php
/**
 * Examen 2016: Restaurant Project
 *
 * @since         1.0.0
 * @author        Nathalie Braczek <nathalie.braczek.gmx.de>
 * @copyright (C) 2016 Nathalie Braczek. All rights reserved.
 * @license       MIT, see LICENCE
 */

namespace Nathalie\Exam16;

require_once __DIR__ . '/../../vendor/autoload.php';

(new Session)->assertValidSession();

$databaseConnection = new DatabaseConnection();
$database           = $databaseConnection->connect();

$id     = $_REQUEST['id'] ?? null;

$repo = new ProductRepo($database);

$action = $_REQUEST['action'] ?? null;
if ($action == 'save' && !empty($id))
{
    $repo->setSpecial($id);
}
$special = $repo->getSpecial();

?>
<html>
    <head>
        <title>Select Daily Special</title>
        <link rel="stylesheet" type="text/css" href="css/restaurantStyle.css"/>
    </head>
    <body>
        <?php include "partial/header.php"; ?>
        <div class="buttons">
            <a class="button" href="dashboard.php">Back</a>
        </div>

        <div class="container">
            <div class="box">
                <h2 class="title">Select Daily Special</h2>
                <div class="padding">
                    <form action="special.php?action=save" method="post" enctype="application/x-www-form-urlencoded">
                        <label for="special">Daily Special:</label><br>
                        <select id="special" name="id">
                            <?php foreach ($repo->getAll() as $product) : ?>
                                <option value="<?php echo $product->Product_ID; ?>"<?php
                                    echo $product->Product_ID == $special->Product_ID ? ' selected' : '';
                                ?>><?php echo $product->Product_Title; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                        <br>
                        <button type="submit">Save</button>
                    </form>
                </div>
            </div>

            <div class="box">
                <h2 class="title">Daily Special</h2>
                <h3 class="padding"><?php echo $special->Product_Title; ?></h3>
                <p class="padding"><?php echo $special->Product_Description; ?></p>
            </div>
        </div>
        <?php include "partial/footer.php"; ?>

    </body>
</html>
