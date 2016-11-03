<?php
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


<form action="...">
    <label for="id">ID:</label>
    <br>
    <input type="text" disabled id="id" name="Information_ID" value="<?php echo $preset->Information_ID; ?>">
    <br>
    <br>
    <label for="name">Name:</label>
    <br>
    <input type="text" id="name" name="Information_Name" value="<?php echo $preset->Information_Name; ?>">
    <br>
    <br>
    <label for="content">Content:</label>
    <br>
    <textarea id="content" name="Information_Content">
        <?php echo $preset->Information_Content; ?>
    </textarea>
    <br>
    <br>
    <label for="hint">Hint:</label>
    <br>
    <input type="text" id="content" name="Article_Content" value="<?php echo $preset->Information_Hint; ?>">
    <br>
    <br>
    <button type="submit">Save</button>
</form>