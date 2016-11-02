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
use Nathalie\Exam16\InformationRepo;


require_once __DIR__ . '/../../vendor/autoload.php';

$databaseConnection = new DatabaseConnection();
$database           = $databaseConnection->connect();
$informationRepo    = new InformationRepo($database);

$lines = explode("\n", $informationRepo->getByName('Opening Hours')->Information_Content);
foreach ($lines as $i => $line)
{
    $columns = explode('|', $line, 2);
    if (count($columns) > 1)
    {
        $lines[$i] = "<span class=\"days\">{$columns[0]}</span><span class=\"hours\">{$columns[1]}</span>";
    }
}
$hours = implode('<br>', $lines);

$phone = $informationRepo->getByName('Phone')->Information_Content;
$phoneCondensed = str_replace(' ', '', $phone);
?>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="css/restaurantStyle.css"/>
    </head>
    <body>
        <?php include "partial/header.php"; ?>

            <div class="container padding">

                <div class="box">
                    <h2 class="title">Opening Hours</h2>
                    <p class="padding">
                        <?php echo $hours; ?>
                    </p>
                </div>


                    <div class="box">
                    <h2 class="title">E-Mail us</h2>
                    <form class="padding" action="mailto:nathalie.braczek@gmx.de" method="post" enctype="text/plain">
                        <label for="email">E-Mail:</label>
                        <br>
                        <input type="email" id="email" name="E-Mail">
                        <br>
                        <label for="name">Name:</label>
                        <br>
                        <input type="text" id="name" name="Name">
                        <br>
                        <label for="issue">Issue:</label>
                        <br>
                        <input type="text" id="issue" name="Issue">
                        <br>
                        <label for="message">Message:</label>
                        <br>
                        <textarea id="message" name="Message"></textarea>
                        <br>
                        <br>
                        <button type="submit">Send</button>
                    </form>
                    </div>
                    <div class="box">
                        <h2 class="title">Call us</h2>
                        <a href="callto:<?php echo $phoneCondensed; ?>"><?php echo $phone; ?></a>
                    </div>

            </div>
        <?php include "partial/footer.php"; ?>
    </body>
</html>
