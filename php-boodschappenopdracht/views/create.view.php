<?php
    $heading = "Toevoegen";
    require("views/partials/head.php");
    require("views/partials/nav.php");
    require("views/partials/header.php");

    function errorMessage($errors, $key) {
        if (isset($errors[$key])) {
            return "<p class='error'>{$errors[$key]}</p>";
        }
        return '';
    }

    // Toggle client-side validation in the form.
    $clientSideValidation = false;

?>

<main>
    <?php if (!$clientSideValidation): ?>
        <p class="devWarning">WARNING: client-side validation is switched off.</p>
    <?php endif;?>
    
    <form method="POST">
        <ul>
            <li>
                <label for="productName">Naam (verplicht):</label>
                <input type="text" id="productName" name="productName" placeholder="brood"
                    value="<?= $_POST['productName'] ?? '' ?>"
                    <?= $clientSideValidation ? 'required' : '' ?>
                >
                <?= errorMessage($errors, 'name') ?>
            </li>
            <li>
                <label for="productPrice">Prijs per stuk:</label>
                <input type="number" id="productPrice" name="productPrice"
                    value="<?= $_POST['productPrice'] ?? '' ?>"
                    <?= $clientSideValidation ? 'min="0" step="0.01"' : 'step="any"' ?>
                >
                <?= errorMessage($errors, 'price_decimals') ?>
                <?= errorMessage($errors, 'price_negative') ?>
            </li>
            <li>
                <label for="productQuantity">Aantal:</label>
                <input type="number" id="productQuantity" name="productQuantity"
                    value="<?= $_POST['productQuantity'] ?? '' ?>"
                    <?= $clientSideValidation ? 'min="0" step="1"' : '' ?>
                >
                <?= errorMessage($errors, 'quantity') ?>
            </li>
        </ul>
        <input type="submit" value="Voeg aan de lijst toe">
    </form>
</main>

<?php
    require("views/partials/foot.php");
?>
