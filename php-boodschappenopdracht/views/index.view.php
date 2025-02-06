<?php
    $heading = "Lijst";
    require("views/partials/head.php");
    require("views/partials/nav.php");
    require("views/partials/header.php");
?>

<main>    
    <table id="groceries">
        <thead>
            <tr>
                <th>Product</th>
                <th>Prijs</th>
                <th>Aantal</th>
                <th>Subtotaal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groceries as $product) : ?>
            <tr>
                <td>
                    <?= $product['name'] ?>
                </td>
                <td class="bedrag, productPrice">
                    <?= $product['price'] ?>
                </td>
                <td>
                    <?= $product['quantity'] ?>
                </td>
                <td class="bedrag, productTotalCost">
                <?= $product['quantity'] * $product['price'] ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Totaal</th>
                <td class="bedrag, TotalCost">
                    <?= $total_cost ?>
                </td>
            </tr>
        </tfoot>
    </table>
</main>

<?php
    require("views/partials/foot.php");
?>
