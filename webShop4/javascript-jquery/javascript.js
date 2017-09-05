$(document).ready(function () {
    $(".prod-img").on('mouseenter', function () {
        var a = $(this).parent().find('.ca').attr('id');
        $(".ca#" + a).css("display", "block");
    });
    $(".panel-body").on('mouseleave', function () {
        var a = $(this).parent().find('.ca').attr('id');
        $(".ca#" + a).css("display", "none");
    });
    counter = 0;
});
function cartFunc(id) {
    $.ajax({
        type: "GET",
        url: "../controller/HelperController.php",
        data: {addProductToCart: 1, id: id},
        success: function (data) {

        }, error: function () {

        }
    });
}


function minusCount(id) {
    $.ajax({
        type: "GET",
        url: "../controller/HelperController.php",
        data: {removeProductFromCart: 1, id: id, removeProduct: false},
        success: function (data) {
            var content = $('#c' + id).html();
            if (+content !== 1) {
                $('#c' + id).html(+content - 1);
            }
        }, error: function () {
        }
    });
}
function removeFromCart(id) {
    $.ajax({
        type: "GET",
        url: "../controller/HelperController.php",
        data: {removeProductFromCart: 1, id: id, removeProduct: true},
        success: function (data) {
            $('#row' + id).remove();
        }, error: function () {
        }
    });
}
function plusCount(id) {
    $.ajax({
        type: "GET",
        url: "../controller/HelperController.php",
        data: {addProductToCart: 1, id: id},
        success: function (data) {
            var content = $('#c' + id).html();
            $('#c' + id).html(+content + 1);
        }, error: function () {
        }
    });
}

function laadMeerFunction() {
    console.log(counter++);
    $.ajax({
        type: "GET",
        url: "../controller/HelperController.php",
        data: {loadMore: 1},
        success: function (data) {
            if (!$.trim(data)) {
                $(".row").append('<span class="warning">Er zijn geen producten meer!</span>');
            } else {
                $(".row").append(data);
            }
        }, error: function () {
        }
    });
}


