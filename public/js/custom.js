var room = 1;
function add_fields() {
    room++;
    var objTo = document.getElementById('room_fileds');
    var divtest = document.createElement("div");

    divtest.innerHTML =
        '<div class="">' +

        '<input class="form-control" type="text" name="benifit[health][]" >' +

        '</div>';



    objTo.appendChild(divtest)
}
function b_add_fields() {
    room++;
    var objTo = document.getElementById('b_room_fileds');
    var divtest = document.createElement("div");

    divtest.innerHTML =
        '<div class="">' +

        '<input class="form-control" type="text" name="benifit[business][]" >' +

        '</div>';



    objTo.appendChild(divtest)
}