setInterval(() => {
    var today = new Date();
    var time = (
        String(today.getHours()).padStart(2, '0') +
        String(today.getMinutes()).padStart(2, '0') +
        String(today.getSeconds()).padStart(2, '0')
    ).split('');

    time.forEach((element, key) => {
        let ob = document.getElementById('m' + (key + 1))
        let classes = ob.className.split(' ')
        ob.classList.remove(classes[1]);
        ob.classList.add('clock-' + element);
    });
}, 1000);