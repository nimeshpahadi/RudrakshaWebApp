// var room = 1;
// function add_fields() {
//     room++;
//     var objTo = document.getElementById('room_fileds');
//     var divtest = document.createElement("div");
//
//     divtest.innerHTML =
//         '<div class="">' +
//
//         '<input class="form-control" type="text" name="benefit[]" required >' +
//
//            '<button class="del">'+'-'+'</button>'+
//
//
//     '</div>';
//
//     objTo.appendChild(divtest)
//
//
// }


(function($) {
    "use strict";

    var itemTemplate = $('.example-template').detach(),
        editArea = $('.edit-area'),
        itemNumber = 1;


    $(document).on('click', '.edit-area .add', function(event) {
        var item = itemTemplate.clone();
        item.find('[name]').attr('name', function() {
            return $(this).attr('name');
        });
        ++itemNumber;
        item.appendTo(editArea);
    });

    $(document).on('click', '.edit-area .del', function(event) {
        var target = $(event.target),
            row = target.closest('.example-template');
        row.remove();
    });
}(jQuery));


(function(Edit) {
    "use strict";


    var itemTemplate1 = Edit('.example-template1').detach(),
        editArea1 = Edit('.edit-area1'),
        itemNumber1 = 1;

    var itemTemplate = Edit('.example-template2').detach(),
        editArea = Edit('.edit-area2'),
        itemNumber = 1;


    Edit(document).on('click', '.edit-area2 .add', function(event) {
        var item = itemTemplate.clone();
        item.find('[name]').attr('name', function() {
            return Edit(this).attr('name');
        });
        ++itemNumber;
        item.appendTo(editArea);
    });

    Edit(document).on('click', '.edit-area2 .del', function(event) {
        var target = Edit(event.target),
            row = target.closest('.example-template2');
        row.remove();
    });
}(jQuery));

