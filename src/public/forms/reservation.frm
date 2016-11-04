<?php
/**
 * Examen 2016: Restaurant Project
 *
 * @since         1.0.0
 * @author        Nathalie Braczek <nathalie.braczek.gmx.de>
 * @copyright (C) 2016 Nathalie Braczek. All rights reserved.
 * @license       MIT, see LICENCE
 *
 * @var object $preset The initial values for the form
 * @var string $entity The name of the entity
 */

if (empty($preset))
{
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
}
?>

<form action="edit.php?action=save&amp;entity=<?php echo $entity; ?>" method="post" enctype="application/x-www-form-urlencoded">
    <label for="id">ID:</label>
    <br>
    <input type="hidden" id="id" name="Reservations_ID" value="<?php echo $preset->Reservations_ID; ?>">
    <?php echo $preset->Reservations_ID; ?>
    <br>
    <br>
    <label for="name">Name:</label>
    <br>
    <input type="text" id="name" name="Reservations_Name" value="<?php echo $preset->Reservations_Name; ?>">
    <br>
    <br>
    <label for="phone">Phone:</label>
    <br>
    <input type="text" id="phone" name="Reservations_Phone" value="<?php echo $preset->Reservations_Phone; ?>">
    <br>
    <br>
    <label for="board_id">Board-ID:</label>
    <br>
    <input type="text" id="board_id" name="Reservations_Board_ID" value="<?php echo $preset->Reservations_Board_ID; ?>">
    <br>
    <br>
    <label for="people">Number of People:</label>
    <br>
    <input type="text" id="phone" name="Reservations_People" value="<?php echo $preset->Reservations_People; ?>">
    <br>
    <br>
    <label for="date">Reservationdate:</label>
    <br>
    <input type="text" id="date" name="Reservations_Date" value="<?php echo $preset->Reservations_Date; ?>">
    <br>
    <br>
    <label for="time">Reservationtime:</label>
    <br>
    <input type="text" id="time" name="Reservations_Time" value="<?php echo $preset->Reservations_Time; ?>">
    <br>
    <br>
    <label for="notes">Notes:</label>
    <br>
    <textarea id="notes" name="Reservations_Notes"><?php echo $preset->Reservations_Notes; ?></textarea>
    <br>
    <br>
    <button type="submit">Save</button>
    <a href="list.php?entity=reservation">Cancel</a>
</form>