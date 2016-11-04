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
        "Product_ID"          => "",
        "Product_Title"       => "",
        "Product_Description" => "",
        "Product_Price"       => "",
        "Product_Special"     => 0,
        "Product_Restriction" => "",
        "Product_Category"    => "",
    ];
}

$restrictions = ['Vegan', 'Vegetarian', 'Pescetarian', 'Normal'];
$categories   = ['Food', 'Drink', 'Menue'];
?>

<form action="edit.php?action=save&amp;entity=<?php echo $entity; ?>" method="post" enctype="application/x-www-form-urlencoded">
    <label for="id">ID:</label>
    <br>
    <input type="hidden" id="id" name="Product_ID" value="<?php echo $preset->Product_ID; ?>">
    <?php echo $preset->Product_ID; ?>
    <br>
    <br>
    <label for="title">Title:</label>
    <br>
    <input type="text" id="title" name="Product_Title" value="<?php echo $preset->Product_Title; ?>">
    <br>
    <br>
    <label for="description">Description:</label>
    <br>
    <textarea id="description" name="Product-Description"><?php echo $preset->Product_Description; ?></textarea>
    <br>
    <label for="price">Price:</label>
    <br>
    <input type="text" id="price" name="Product_Price" value="<?php echo $preset->Product_Price; ?>">
    <input type="hidden" value="<?php echo $preset->Product_Special; ?>">
    <br>
    <br>
    <label for="restriction">Restriction:</label>
    <br>
    <select id="restriction" name="Product_Restriction">
        <?php foreach ($restrictions as $r) : ?>
            <option value="<?php echo $r; ?>"><?php echo $r; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <br>
    <label for="category">Category:</label>
    <br>
    <select id="category" name="Product_Category">
        <?php foreach ($categories as $c) : ?>
            <option value="<?php echo $c; ?>"><?php echo $c; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <br>
    <button type="submit">Save</button>
    <a href="list.php?entity=product">Cancel</a>
</form>