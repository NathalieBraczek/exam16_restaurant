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

$databaseConnection = new DatabaseConnection();
$database           = $databaseConnection->connect();

$entity = 'reservation';

$repo = new ReservationRepo($database);

$message = '';

$preset = (object)[
    "Reservations_ID"       => "",
    "Reservations_Name"     => "",
    "Reservations_Phone"    => "",
    "Reservations_Board_ID" => "",
    "Reservations_People"   => "",
    "Reservations_Date"     => "",
    "Reservations_Time"     => "",
    "Reservations_Notes"    => "",
];
$action = $_REQUEST['action'] ?? null;

if ($action == 'save')
{
    if ($repo->save($_POST))
    {
        print_r($_REQUEST);
        #header("Location: thankyou.php");
        die;
    }
    else
    {
        $message = 'You must be a Democrat. Retry!';
        $preset  = (object)$_POST;
    }
}
?>
<html>
    <head>
        <title>Book a Table</title>
        <link rel="stylesheet" type="text/css" href="css/restaurantStyle.css"/>
    </head>
    <body>
        <?php include "partial/header.php"; ?>
        <div class="container padding">
            <div class="box">
                <h2 class="title">Howdy!</h2>
                <p class="padding">
                    <?php if (!empty($message)) : ?>
                        <span class="error"><?php echo $message; ?></span>
                    <?php else : ?>
                        Be ready for a great experience!
                        Fill in the form at right, and you'll enjoy a pure American environment!
                    <?php endif; ?>
                </p>
            </div>
            <div class="box">
                <h2 class="title">Book a Table</h2>
                <form action="booking.php?action=save" method="post" enctype="application/x-www-form-urlencoded"
                      class="padding">
                    <input type="hidden" id="id" name="Reservations_ID" value="">
                    <label for="name">Your name:</label>
                    <br>
                    <input type="text" id="name" name="Reservations_Name"
                           value="<?php echo $preset->Reservations_Name; ?>">
                    <br>
                    <br>
                    <label for="phone">Your phone number:</label>
                    <br>
                    <input type="text" id="phone" name="Reservations_Phone"
                           value="<?php echo $preset->Reservations_Phone; ?>">
                    <br>
                    <br>
                    <label for="datetime">Date and time:</label>
                    <br>
                    <input type="datetime" id="datetime" name="datetime"
                           value="<?php echo $preset->Reservations_Date; ?>">
                    <br>
                    <br>
                    <label for="people">Number of People:</label>
                    <br>
                    <input type="text" id="people" name="Reservations_People"
                           value="<?php echo $preset->Reservations_People; ?>">
                    <br>
                    <br>
                    <label for="notes">Additional info:</label>
                    <br>
                    <textarea id="notes" name="Reservations_Notes"><?php echo $preset->Reservations_Notes; ?></textarea>
                    <br>
                    <br>
                    <button type="submit">Save</button>
                    <a href="index.php">Cancel</a>
                </form>
            </div>
        </div>
        <?php include "partial/footer.php"; ?>

    </body>
</html>
