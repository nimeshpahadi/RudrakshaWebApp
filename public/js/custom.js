var room = 1;
function add_fields() {
    room++;
    var objTo = document.getElementById('room_fileds');
    var divtest = document.createElement("div");

    divtest.innerHTML =
        '<div class="">' +

        '<input class="form-control" type="text" name="benefit[]" >' +

        '</div>';

    objTo.appendChild(divtest)
}
