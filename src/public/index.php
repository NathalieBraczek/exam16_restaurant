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
$articleRepo        = new ArticleRepo($database);
$articles           = $articleRepo->getAll();
?>
<html>
<head>
    <title>Home</title>
</head>
<body>
<h1>Home</h1>
<?php foreach ($articles as $article) : ?>
    <article>
        <h2><?php echo $article->Article_Title; ?></h2>
        <p>
            <?php echo $article->Article_Content; ?>
        </p>
    </article>
<?php endforeach; ?>
</body>
</html>
