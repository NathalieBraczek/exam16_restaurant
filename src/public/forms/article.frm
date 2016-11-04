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
        "Article_ID"      => "",
        "Article_Title"   => "",
        "Article_Created" => date('Y-m-d'),
        "Article_Content" => "",
    ];
}
?>

<form action="edit.php?action=save&amp;entity=<?php echo $entity; ?>" method="post" enctype="application/x-www-form-urlencoded">
    <label for="id">ID:</label>
    <br>
    <input type="hidden" id="id" name="Article_ID" value="<?php echo $preset->Article_ID; ?>">
    <?php echo $preset->Article_ID; ?>
    <br>
    <br>
    <label for="title">Title:</label>
    <br>
    <input type="text" id="title" name="Article_Title" value="<?php echo $preset->Article_Title; ?>">
    <br>
    <br>
    <label for="created">Creation Date:</label>
    <br>
    <input type="hidden" id="created" name="Article_Created" value="<?php echo $preset->Article_Created; ?>">
    <?php echo $preset->Article_Created; ?>
    <br>
    <br>
    <label for="content">Content:</label>
    <br>
    <textarea id="content" name="Article_Content"><?php echo $preset->Article_Content; ?></textarea>
    <br>
    <br>
    <button type="submit">Save</button>
    <a href="list.php?entity=article">Cancel</a>
</form>