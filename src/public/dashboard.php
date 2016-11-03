<?php
/**
 * Examen 2016: Restaurant Project
 *
 * @since         1.0.0
 * @author        Nathalie Braczek <nathalie.braczek.gmx.de>
 * @copyright (C) 2016 Nathalie Braczek. All rights reserved.
 * @license       MIT, see LICENCE
 */
use Nathalie\Exam16\Session;

require_once __DIR__ . '/../../vendor/autoload.php';

(new Session)->assertValidSession();
?>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="css/restaurantStyle.css"/>
    </head>
    <body>
        <?php include "partial/header.php"; ?>
<div class="box center">
    <h1 class="title">Welcome Master Trumpster!</h1>
    <button>New blogpost</button>
    <button>View reservations</button>
    <button>Change daily special</button>
    <button>Edit Company Description</button>
    <button>Edit opening hours</button>
    <button>Edit contact information</button>
</div>
<?php include "partial/footer.php"; ?>
</body>
</html>