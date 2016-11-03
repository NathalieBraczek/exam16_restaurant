<?php
if (empty($preset))
{
    $preset = (object)[
        "Boards_ID"      => "",
        "Boards_Seats"   => "",
        ];
}
?>


<form action="...">
    <label for="id">ID:</label>
    <br>
    <input type="text" disabled id="id" name="Boards_ID" value="<?php echo $preset->Boards_ID; ?>">
    <br>
    <br>
    <label for="seats">Seats:</label>
    <br>
    <input type="text" id="seats" name="Boards_ID" value="<?php echo $preset->Boards_ID; ?>">
    <br>
    <br>
    <button type="submit">Save</button>
</form>