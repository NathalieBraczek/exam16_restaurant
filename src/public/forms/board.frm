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
        "Boards_ID"      => "",
        "Boards_Seats"   => "",
        ];
}
?>

<form action="edit.php?action=save&amp;entity=<?php echo $entity; ?>" method="post" enctype="application/x-www-form-urlencoded">
    <label for="id">ID:</label>
    <br>
    <input type="hidden" id="id" name="Boards_ID" value="<?php echo $preset->Boards_ID; ?>">
    <?php echo $preset->Boards_ID; ?>
    <br>
    <br>
    <label for="seats">Seats:</label>
    <br>
    <input type="text" id="seats" name="Boards_ID" value="<?php echo $preset->Boards_ID; ?>">
    <br>
    <br>
    <button type="submit">Save</button>
    <a href="http://localhost/exam16/public/list.php?entity=board">Cancel</a>
</form>