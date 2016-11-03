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

if (!isset($_REQUEST['entity']))
{
    // DASHBOARD W/ MESSAGE
    die;
}

$entity = $_REQUEST['entity'];
$id     = $_REQUEST['id'] ?? null;

$className = __NAMESPACE__ . '\\' . ucfirst($entity) . 'Repo';
/** @var Repository $repo */
$repo = new $className($database);

$preset = $repo->getById($id);
?>
<html>
    <head>
        <title><?php echo empty($id) ? 'Add' : 'Edit'; ?> <?php echo $entity; ?>s</title>
        <link rel="stylesheet" type="text/css" href="css/restaurantStyle.css"/>
    </head>
    <body>
        <?php include "partial/header.php"; ?>
        <div class="padding">
            <?php /** @noinspection PhpIncludeInspection */
            include "forms/{$entity}.frm"; ?>
            <pre><?php print_r($preset); ?></pre>
        </div>
        <?php include "partial/footer.php"; ?>

    </body>
</html>
