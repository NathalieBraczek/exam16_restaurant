<?php
if (empty($preset))
{
    $preset = (object)[
        "Reservation_ID"       => "",
        "Reservation_Name"     => "",
        "Reservation_Phone"    => "",
        "Reservation_Board_ID" => "",
        "Reservation_People"   => "",
        "Reservation_Date"     => "",
        "Reservation_Time"     => "",
        "Reservation_Notes"    => "",
    ];
}
?>


<form action="...">
    <label for="id">ID:</label>
    <br>
    <input type="text" disabled id="id" name="Reservation_ID" value="<?php echo $preset->Reservation_ID; ?>">
    <br>
    <br>
    <label for="name">Name:</label>
    <br>
    <input type="text" id="name" name="Reservation_Name" value="<?php echo $preset->Reservation_Name; ?>">
    <br>
    <br>
    <label for="phone">Phone:</label>
    <br>
    <input type="text" id="phone" name="Reservation_Phone" value="<?php echo $preset->Reservation_Phone; ?>">
    <br>
    <br>
    <label for="board_id">Board-ID:</label>
    <br>
    <input type="text" id="board_id" name="Reservation_Board_ID" value="<?php echo $preset->Reservation_Board_ID; ?>">
    <br>
    <br>
    <label for="people">Number of People:</label>
    <br>
    <input type="text" id="phone" name="Reservation_People" value="<?php echo $preset->Reservation_People; ?>">
    <br>
    <br>
    <label for="date">Reservationdate:</label>
    <br>
    <input type="text" id="date" name="Reservation_Date" value="<?php echo $preset->Reservation_Date; ?>">
    <br>
    <br>
    <label for="time">Reservationtime:</label>
    <br>
    <input type="text" id="time" name="Reservation_Time" value="<?php echo $preset->Reservation_Time; ?>">
    <br>
    <br>
    <label for="notes">Notes:</label>
    <br>
    <textarea id="notes" name="Reservation_Notes">
        <?php echo $preset->Reservation_Notes; ?>
    </textarea>
    <br>
    <br>
    <button type="submit">Save</button>
</form>