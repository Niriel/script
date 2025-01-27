function groceriesChanged() {
    const productPrices = document.getElementsByClassName('productPrice');
    const productQuantities = document.getElementsByClassName('productQuantity');
    const productTotalCosts = document.getElementsByClassName('productTotalCost');
    const totalCostCell = document.getElementsByClassName('TotalCost')[0]; // There's only one.
    let totalCost = 0.0;
    for (let row=0; row<productPrices.length; row++) {
        const productPrice = Number(productPrices[row].innerHTML);
        const productQuantity = Number(productQuantities[row].value);
        const productTotalCost = productPrice * productQuantity;
        // We should really not be using floats for prices, let's hide the mess with toFixed.
        productTotalCosts[row].innerHTML = productTotalCost.toFixed(2);
        totalCost += productTotalCost;
    }
    totalCostCell.innerHTML = totalCost.toFixed(2);
}

const groceries = document.getElementById("groceries");
groceries.addEventListener('change', groceriesChanged);
groceriesChanged(); // Calculate the first time because browsers remember inputs after F5.
