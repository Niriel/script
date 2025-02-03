<?php
    require("partials/head.php");
    require("partials/nav.php");
?>

<main>
    <h1>Lijst</h1>
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
    require("partials/foot.php");
?>