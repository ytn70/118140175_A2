var data = ["Buku Tulis", "Pensil", "Spidol", "index"];

function index() {
    var input = document.getElementById('list_data');
    input.innerHTML = "";

    for (var i = 0; i < data.length; i++) {
        var buttonEdit = "<a href='#' onclick='edit(" + i + ")'>Edit</a>";
        var buttonHapus = "<a href='#' onclick='hapus(" + i + ")'>Hapus</a>";

        input.innerHTML += "<li>" + data[i] + " [" + buttonEdit + " | " + buttonHapus + "]</li>";
    }
}

function tambah() {
    var input = document.querySelector("input[name=input]");
    data.push(input.value);
    index();
}

function edit(id) {
    var newInput = prompt("Nama baru", data[id]);
    data[id] = newInput;
    index();
}

function hapus(id) {
    data.splice(id, 1);
    index();
}

index();