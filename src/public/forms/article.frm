<?php
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


<form action="...">
    <label for="id">ID:</label>
    <br>
    <input type="text" disabled id="id" name="Article_ID" value="<?php echo $preset->Article_ID; ?>">
    <br>
    <br>
    <label for="title">Title:</label>
    <br>
    <input type="text" id="title" name="Article_Title" value="<?php echo $preset->Article_Title; ?>">
    <br>
    <br>
    <label for="created">Creation Date:</label>
    <br>
    <input type="text" disabled id="created" name="Article_Created" value="<?php echo $preset->Article_Created; ?>">
    <br>
    <br>
    <label for="content">Content:</label>
    <br>
    <textarea id="content" name="Article_Content">
        <?php echo $preset->Article_Content; ?>
    </textarea>
    <br>
    <br>
    <button type="submit">Save</button>
</form>