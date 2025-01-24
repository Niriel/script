document.title = 'DOM manipulated';
const myName = 'Bertrand';
const colors = ['red', 'orange', 'yellow', 'green', 'cyan'];

const button = document.getElementById('button1');
const title1 = document.getElementById('title1');
title1.style.display = 'none';
function updateTitle1() {
    title1.innerHTML = `Hi ${myName}`;
    let colorId = Math.floor(Math.random() * colors.length);
    title1.style.backgroundColor = colors[colorId];
    switch (title1.style.display) {
        case 'none':{
            title1.style.display = 'block';
            break;
        }
        case 'block':{
            title1.style.display = 'none';
            break;
        }
    }
}
button.addEventListener('click', updateTitle1);


