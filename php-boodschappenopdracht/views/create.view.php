<?php
    $heading = "Toevoegen";
    require("views/partials/head.php");
    require("views/partials/nav.php");
    require("views/partials/header.php");
?>

<main>
    <?php
        if ($posted and !$post_ok) {
            echo '<p>The product was NOT added to the list.</p>';
        }
    ?>
    <form method="POST">
        <ul>
            <li>
                <label for="productName">Naam (verplicht):</label>
                <input type="text" id="productName" name="productName" placeholder="brood">
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
    require("views/partials/foot.php");
?>
