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
        "Information_ID"      => "",
        "Information_Name"    => "",
        "Information_Content" => date('Y-m-d'),
        "Information_Hint"    => "",
    ];
}
?>

<form action="edit.php?action=save&amp;entity=<?php echo $entity; ?>" method="post" enctype="application/x-www-form-urlencoded">
    <label for="id">ID:</label>
    <br>
    <input type="hidden" id="id" name="Information_ID" value="<?php echo $preset->Information_ID; ?>">
    <?php echo $preset->Information_ID; ?>
    <br>
    <br>
    <label for="name">Name:</label>
    <br>
    <input type="text" id="name" name="Information_Name" value="<?php echo $preset->Information_Name; ?>">
    <br>
    <br>
    <label for="content">Content:</label>
    <br>
    <textarea id="content" name="Information_Content"><?php echo $preset->Information_Content; ?></textarea>
    <br>
    <br>
    <label for="hint">Hint:</label>
    <br>
    <input type="text" id="content" name="Information_Hint" value="<?php echo $preset->Information_Hint; ?>">
    <br>
    <br>
    <button type="submit">Save</button>
    <a href="http://localhost/exam16/public/list.php?entity=information">Cancel</a>
</form>