const nbRows = 24;
const nbCols = 40;

class Sprite {
    constructor() {
        this.x = 0;
        this.y = 0;
        this.dx = 0;
        this.dy = 0;
    }
}

const ball = new Sprite();


function createScreen() {
    let html = '';
    for (let y = nbRows - 1; y >= 0; y--) {
        html += '  <tr>\n';
        for (let x = 0; x < nbCols; x++) {
            html += `    <td class="pixel off" id="${x},${y}"></td>\n`;
        }
        html += '  </tr>\n';
    }
    const elem = document.getElementById('screen');
    elem.innerHTML = html;
}


// x, y: integer; state:boolean
function setPixel(x, y, state) {
    const pixel = document.getElementById(`${x},${y}`);
    if (state) {
        pixel.classList.remove('off');
        pixel.classList.add('on');
    } else {
        pixel.classList.remove('on');
        pixel.classList.add('off');
    }
}


function resetBall() {
    setPixel(ball.x, ball.y, false);
    // Middle of the screen.
    ball.x = Math.floor(nbCols / 2);
    ball.y = Math.floor(nbRows / 2);
    // Random diagonal direction: dx and dy are either -1 or 1.
    ball.dx = Math.floor(Math.random() * 2) * 2 - 1;
    ball.dy = Math.floor(Math.random() * 2) * 2 - 1;
    setPixel(ball.x, ball.y, true);
}


function tick() {

}

function leftUp() {

}

function leftDown() {

}

function rightUp() {

}

function rightDown() {

}

function connectEvents() {
    document.getElementById('lu').addEventListener('click', leftUp);
    document.getElementById('ld').addEventListener('click', leftDown);
    document.getElementById('ru').addEventListener('click', rightUp);
    document.getElementById('rd').addEventListener('click', rightDown);
}

function main() {
    createScreen();
    connectEvents();
    resetBall();
}
main();