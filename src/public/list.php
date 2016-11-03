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

$entity    = $_REQUEST['entity'];
$className = __NAMESPACE__ . '\\' . ucfirst($entity) . 'Repo';
$repo      = new $className($database);

$action    = $_REQUEST['action'] ?? null;
if ($action == 'delete' && isset($_REQUEST['id']))
{
    $repo->delete($_REQUEST['id']);
}

$items     = $repo->getAll();
$headers   = array_keys(get_object_vars($items[0]));
$idField   = ucfirst($entity) . '_ID';
?>
<html>
    <head>
        <title>Manage <?php echo $entity; ?>s</title>
        <link rel="stylesheet" type="text/css" href="css/restaurantStyle.css"/>
    </head>
    <body>
        <?php include "partial/header.php"; ?>
        <a class="button" href="edit.php?entity=<?php echo $entity; ?>">Add new</a>
        <table class="truncated padding">
            <thead>
                <tr>
                    <th colspan="2">Actions</th>
                    <?php foreach ($headers as $header) : ?>
                        <th><?php echo $header; ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) : ?>
                    <tr>
                        <td class="action"><a class="button" href="edit.php?entity=<?php echo $entity; ?>&amp;id=<?php echo $item->$idField; ?>">edit</a></td>
                        <td class="action"><a class="button" href="list.php?action=delete&amp;entity=<?php echo $entity; ?>&amp;id=<?php echo $item->$idField; ?>">delete</a></td>
                        <?php foreach ($headers as $field) : ?>
                            <td><?php echo $item->$field; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php include "partial/footer.php"; ?>
    </body>
</html>
