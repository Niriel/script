
function rollDice(){
    // Collect 8d6.
    let rolls = [];
    for (let i=0; i<8; i++) {
        const roll = Math.floor(Math.random() * 6 + 1);
        rolls.push(roll);
    }
    
    // Distribution.
    let count = {};
    for (let i=1; i<=6; i++) {
        count[i] = 0;
    }
    rolls.forEach(roll => count[roll]++);

    console.log("rolls: " + rolls.toString());
    // console.table(count);

    // Populate HTML table with distribution.
    const rollCells = document.getElementsByClassName("roll");
    const countCells = document.getElementsByClassName("count");
    for (let row=0; row<rollCells.length; row++) {
        const roll = row + 1;
        rollCells[row].innerHTML = roll.toString();
        countCells[row].innerHTML = count[roll].toString();

    }
}

const rollButton = document.getElementById('rollbutton');
rollButton.addEventListener('click', rollDice);
