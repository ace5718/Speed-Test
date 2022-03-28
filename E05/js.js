function HEX() {
    let string = "0123456789abcdef".split('').sort((a, b) => {
        return 0.5 - Math.random()
    }).slice(0, 6);
    string.unshift('#')
    return string.join('')
}

for (let i = 1; i < 11; i++) {
    document.getElementById('block' + i).dataset.hex =
        document.getElementById('block' + i).style.backgroundColor = HEX()
}

function left(id) {
    document.getElementById('left').value = document.getElementById(id).dataset.hex;
}

function right(id) {
    document.getElementById('right').value = document.getElementById(id).dataset.hex;
}

setInterval(() => {
    let left = document.getElementById('left').value
    let right = document.getElementById('right').value
    document.getElementById('main').style.backgroundImage = `linear-gradient(to right, ${left}, ${right})`
}, 10);