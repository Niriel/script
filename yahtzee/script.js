const nbDice = 5;
const nbSides = 6;

// Unicode drawings of dice.
const dieFaces = '\u2680\u2681\u2682\u2683\u2684\u2685';
const useFaces = true;


function rollDice() {
    let rolls = [];
    for (let i = 0; i < nbDice; i++) {
        const roll = Math.floor(Math.random() * nbSides + 1);
        rolls.push(roll);
    }
    return rolls;
}


// Return a dictionary that looks like {1:2, 2:0, 3:1, 4:1, 5:0, 6:1}.
// The key is the dice side, and the value is the number of dice that fell on that side.
function countRolls(rolls) {
    let count = {};
    for (let side = 1; side <= nbSides; side++) {
        count[side] = 0;
    }
    for (let die = 0; die < nbDice; die++) {
        count[rolls[die]]++;
    }
    return count;
}


function sumOfAllRolls(counts) {
    let sum = 0;
    for (const [side, count] of Object.entries(counts)) {
        sum += side * count;
    }
    return sum;
}


function displayRolls(rolls) {
    const rollCells = document.getElementsByClassName('roll');
    for (let i = 0; i < nbDice; i++) {
        if (useFaces) {
            rollCells[i].innerHTML = dieFaces[rolls[i] - 1];
        } else {
            rollCells[i].innerHTML = rolls[i].toString();
        }
    }
}


function scoreUpperSectionSide(side, counts) {
    return counts[side] * side;
}


function scoreUpperSection(counts) {
    const upperCells = document.getElementsByClassName('upperSection');

    for (let side = 1; side <= nbSides; side++) {
        // Calculate.
        const score = scoreUpperSectionSide(side, counts);
        // Display.
        const row = side - 1;
        upperCells[row].innerHTML = score.toString();
    }
}


function scoreOfAKind(counts) {
    const sum = sumOfAllRolls(counts);
    const cells = document.getElementsByClassName('ofAKind');
    for (let kind = 3; kind <= 5; kind++) {
        // Calculate.
        let score = 0;
        for (let side = 1; side <= nbSides; side++) {
            const count = counts[side];
            if (count >= kind) {
                score = sum;
                if (kind == 5) { // Yahtzee.
                    score = 50;
                }
                break;
            }
        }
        // Display.
        const row = kind - 3;
        cells[row].innerHTML = score.toString();
    }
}


function scoreFullHouse(counts) {
    // Calculate.
    let two = false;
    let three = false;
    for (let side = 1; side <= nbSides; side++) {
        const count = counts[side];
        if (count == 2) {
            two = true;
        }
        if (count == 3) {
            three = true;
        }
    }
    const score = (two && three) ? 25 : 0;
    // Display.
    const cell = document.getElementById('fullHouse');
    cell.innerHTML = score.toString();
}


function scoreStraight(counts) {
    // Calculate.
    let small = false;
    let large = false;
    let longest = 0;
    for (let side = 1; side <= nbSides; side++) {
        const count = counts[side];
        if (count >= 1) {
            longest++;
            if (longest == 4) {
                small = true;
            }
            if (longest == 5) {
                large = true;
            }
        } else {
            longest = 0;
        }
    }
    scoreSmall = small ? 30 : 0;
    scoreLarge = large ? 40 : 0;
    // Display.
    let cell = document.getElementById('smallStraight');
    cell.innerHTML = scoreSmall.toString();
    cell = document.getElementById('largeStraight');
    cell.innerHTML = scoreLarge.toString();
}


function scoreChance(counts) {
    const sum = sumOfAllRolls(counts);
    const cell = document.getElementById('chance');
    cell.innerHTML = sum.toString();
}


function play() {
    let rolls = rollDice();
    // rolls = [3, 5, 3, 4, 3]; // Three of a kind.
    // rolls = [3, 3, 3, 4, 3]; // Four of a kind.
    // rolls = [3, 3, 3, 3, 3]; // Yahtzee.
    // rolls = [1, 1, 1, 5, 5]; // Full house.
    // rolls = [2, 3, 2, 5, 4]; // Small straight.
    // rolls = [6, 3, 2, 5, 4]; // Large straight.

    displayRolls(rolls);

    const counts = countRolls(rolls);
    scoreUpperSection(counts);
    scoreOfAKind(counts);
    scoreFullHouse(counts);
    scoreStraight(counts);
    scoreChance(counts);
}


function main() {
    const rollButton = document.getElementById('rollButton');
    rollButton.addEventListener('click', play);
}


main();
