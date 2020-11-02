document.addEventListener('DOMContentLoaded', (e) => {

    let redButton = document.getElementById('button-red');
    let blueButton = document.getElementById('button-blue');
    let greenButton = document.getElementById('button-green');
    let paragraph = document.getElementById('paragraph');

    let changeTextColor = (color) => {
        paragraph.style.color = color;
    }

    blueButton.addEventListener('mouseover', (e) => {
        changeTextColor('blue');
    })

    blueButton.addEventListener('mouseout', (e) => {
        changeTextColor('black');
    })

    greenButton.addEventListener('mouseover', (e) => {
        changeTextColor('green');
    })

    greenButton.addEventListener('mouseout', (e) => {
        changeTextColor('black');
    })

    redButton.addEventListener('mouseover', (e) => {
        changeTextColor('red');
    })

    redButton.addEventListener('mouseout', (e) => {
        changeTextColor('black');
    })

});