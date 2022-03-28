var data = ""

var makeTextFile = function (text) {
    let _data = new Blob([text], {
        type: 'text/plain'
    })
    return window.URL.createObjectURL(_data);
}

document.getElementById('data').onchange = function (e) {
    let file = this.files[0]
    var reader = new FileReader();
    reader.readAsText(file, 'UTF-8')
    reader.onload = function (evt) {
        data = evt.target.result;
    }
    document.getElementById('downloadlink').innerHTML =
        document.getElementById('downloadlink').download = file.name
}

document.getElementById('remove').onclick = function () {
    data = data.split("\r\n")
    data = data.filter((value, index) => data.indexOf(value) == index);
    data = data.join("\r\n")
    var link = document.getElementById('downloadlink')
    link.href = makeTextFile(data)
    link.style.display = 'block'
}