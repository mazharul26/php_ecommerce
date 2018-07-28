function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email.toLowerCase());
}
$(function () {

    // Validation of Form
    err = 0;


    $(".le-input").focus(function () {
        $(this).addClass('focus');
    });
    $(".le-input").blur(function () {
        if ($(this).val() == "") {
            $(this).removeClass('focus');
            $(this).addClass('error');
            err++;
        } else if ($(this).val().length > 0) {
            $(this).removeClass('focus error');
            $(this).addClass('okay');
        }
    });


    // for email stasart
    $("input[name='email']").blur(function () {
        if (validateEmail($(this).val())) {
            // Ajaj Email Check
            $.ajax({
                type: "GET",
                data: {
                    "email": $(this).val()
                },
                url: "ajax/emailcheck.php",
                success: function (result) {
                    if (result == 1)
                        $(this).addClass('error');
                    else
                        $(this).removeClass('focus error'), $(this).addClass('okay');
                }

            });
        } else {
            $(this).removeClass('focus okay');
            $(this).addClass('error');
        }
    });

    // for password start
    $("input[name='pass1']").focus(function () {
        //alert("pass hit");
        $("#progress").show();

    });
    $("input[name='pass1']").keyup(function () {
        var input = $("input[name='pass1']").val();

        if (input.length < 4)
            $("#progress").children().css('width', '5%').removeClass('progress-bar progress-bar-info').addClass('progress-bar progress-bar-danger');
        if (input.length > 4)
            $("#progress").children().css('width', '10%').removeClass('progress-bar progress-bar-info').addClass('progress-bar progress-bar-danger');
        if (input.length > 7)
            $("#progress").children().css('width', '60%').removeClass('progress-bar progress-bar-danger').addClass('progress-bar progress-bar-info');

    });

    $("input[name='pass1']").blur(function () {
        if (input.length == 0)
            $(this).removeClass('focus okay').addClass('error');


    });

    $("input[name='pass1']").keyup(function () {
        if ($("input[name='pass2']").val().length > 0)
            if ($("input[name='pass2']").val() != $("input[name='pass1']").val())
                $("input[name='pass2']").removeClass('focus okay').addClass('error');


    });

    /*
     * if ($("input[name='pass2']").val() != $("input[name='pass1']").val())
     $(this).removeClass('focus okay').addClass('error');
     */

    // pass1 == pass2
    $("input[name='pass2']").blur(function () {
        if ($("input[name='pass2']").val().length > 0)
            if ($("input[name='pass2']").val() == $("input[name='pass1']").val())
                $(this).removeClass('focus error').addClass('okay');
            else
                $(this).removeClass('focus okay').addClass('error');
    });
// for password end

// submit button stop
    if (err > 0) {
        $(".submit").click(function () {
            return false;
        });
    }
});