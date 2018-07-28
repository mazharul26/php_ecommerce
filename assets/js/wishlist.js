$(document).ready(function () {
    $('body').on('click', '#wishbutton', function () {

        var id = $('#wish').val();
        $.get(
                "ajax/wishlist.php",
                {'wish': id},
                function (data, status) {
                    if (data == 0)
                        alert(0);
                    else
                        alert(data);

                }
        );

    });

});