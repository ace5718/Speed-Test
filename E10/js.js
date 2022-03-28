var cav = document.getElementById('my');
var ctx = cav.getContext('2d');

function getMousePos(canvas, event) {
    var rect = canvas.getBoundingClientRect();
    return {
        x: event.clientX - rect.left,
        y: event.clientY - rect.top
    }
}

function mouseMove(event) {
    var mousePos = getMousePos(cav, event);
    ctx.lineTo(mousePos.x, mousePos.y);
    ctx.stroke();
}

document.addEventListener('mousedown', function(evt) {
    var mousePos = getMousePos(cav, evt);
    evt.preventDefault();
    ctx.beginPath();
    ctx.moveTo(mousePos.x, mousePos.y);
    document.addEventListener('mousemove', mouseMove, false);
})

document.addEventListener('mouseup', function() {
    document.removeEventListener('mousemove', mouseMove, false);
})