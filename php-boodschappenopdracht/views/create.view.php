<?php
    $heading = "Toevoegen";
    require("partials/head.php");
    require("partials/nav.php");
    require("partials/header.php");
?>

<main>
    <form>
        <ul>
            <li>
                <label for="productName">Naam:</label>
                <input type="text" id="productName" name="productName" value="brood">
            </li>
            <li>
                <label for="productPrice">Prijs per stuk:</label>
                <input type="number" id="productPrice" name="productPrice" min="0" step="0.01" value="1.00">
            </li>
            <li>
                <label for="productQuantity">Aantal:</label>
                <input type="number" id="productQuantity" name="productQuantity" min="0" step="1" value="1">
            </li>
        </ul>
        <input type="submit" value="Voeg aan de lijst toe">
    </form>
</main>

<?php
    require("partials/foot.php");
?>
