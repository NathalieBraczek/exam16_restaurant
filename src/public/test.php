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
        <title>Test</title>
        <link rel="stylesheet" type="text/css" href="css/restaurantStyle.css"/>
    </head>
    <body>
        <?php include "partial/header.php"; ?>
        <div class="box center">
            <h1 class="title">Test Page</h1>
            <p>Tada! It works!</p>
        </div>
        <?php include "partial/footer.php"; ?>
    </body>
</html>
