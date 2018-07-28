<!-- ========================================= MAIN ========================================= -->
<?php
if (isset($_POST['submit']))
{
    $err = 0;
    if ($err == 0)
    {
        echo "err0";
    }
    else
    {
        echo "err1";
    }
    $picExt = extension($_FILES['pic1']['name']);

    $reg = [
        "name" => $data->validate($_POST['fname']),
        "email" => $data->validate($_POST['email']),
        //"password" => sha1($_POST['pass1']),
        "password" => $data->validate(md5($_POST['pass1'])),
        "address" => $data->validate($_POST['address']),
        "gender" => $data->validate($_POST['gender']),
        "contact" => $data->validate($_POST['contact']),
        "dob" => $data->validate($_POST['dob']),
        //"picture" => $_POST['nm'],
        "cityid" => $data->validate($_POST['city']),
        "vcode" => $data->validate(RandStr(8)),
        "picture" => $picExt
    ];
    print_r($reg);
    if ($data->insert("users", $reg))
    {
        // Session email and type for verify purpose
        $_SESSION['user']['email'] = $data->validate($_POST['email']);
        $_SESSION['user']['type'] = '0';
        // picture moving to jayga moton
        if ($picExt)
        {
            $filename = $_FILES['pic1']['tmp_name'];
            $destination = "images/u/" . md5($data->Id) . "." . $picExt;
            move_uploaded_file($filename, $destination);
        }
        // redirect once successful sign up
        Redirect('index.php?f=verify');
    }
    else
    {
        echo $data->Error;
    }
}
?>
<script>self.location</script>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-xs-12">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered">Sign In</h2>

                    <p>Hello, Welcome to your account</p>

                    <div class="social-auth-buttons">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-facebook"></i> Sign In with Facebook</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn-block btn-lg btn btn-twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</button>
                            </div>
                        </div>
                    </div>

                    <form enctype="multipart/form-data" action="" role="form" method="post" class="login-form cf-style-1">
                        <div class="field-row">
                            <label>Name</label>
                            <input type="text" class="le-input" name="fname" maxlength="40">
                        </div>
                        <div class="field-row">
                            <label>Email</label>
                            <input type="text" class="le-input em" name='email'>
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label>Password</label>
                            <input type="text" class="le-input" name="pass1">
                            <div id='progress' class="progress" style="display: none">
                                <div class="" role="progressbar" style="width:0%">

                                </div>
                            </div>
                        </div><!-- /.field-row -->
                        <div class="field-row">
                            <label>Retype Password</label>
                            <input type="text" class="le-input" name="pass2">

                        </div><!-- /.field-row -->

                        <div class="field-row">

                            <label>Select Gender:</label>
                            <div>
                                <div class="le-input selectgen">

                                    <label class="radio-inline" style="display: inline-block">
                                        <input type="radio"  name="gender" value="1" style="
                                               width: auto;
                                               ">Male
                                    </label>
                                    <label class="radio-inline" style="display: inline-block">
                                        <input type="radio" name="gender" value="2" style="
                                               width: auto;
                                               ">Female
                                    </label>
                                    <label class="radio-inline" style="display: inline-block">
                                        <input type="radio" name="gender" value="3" style="
                                               width: auto;
                                               ">Common
                                    </label>
                                </div>
                            </div>


                        </div>

                        <div class="field-row">
                            <label>Address</label>
                            <input name="address" type="text" class="le-input" maxlength="199">
                        </div><!-- /.field-row -->


                        <div class="field-row">
                            <label>Country</label>
                            <select class="form-control le-input" name="country">
                                <option value="0">Select a Country</option>
                                <?php
                                $countries = $data->view('country', '', array('country_name', 'ASC'), '');

                                while ($country = $countries->fetch_object())
                                {
                                    echo "<option value='{$country->id}'>{$country->country_name}</option>";
                                }
                                ?>
                            </select>


                        </div><!-- /.field-row -->

                        <div class="field-row form-group">
                            <label>City</label>

                            <select name="city" class="city form-control le-input">
                                <option value="0">Select a City</option>
                                <?php
                                $cities = $data->view('city', '', array('city_name', 'ASC'), '');

                                while ($city = $cities->fetch_object())
                                {
                                    echo "<option value='{$city->id}'>{$city->city_name}</option>";
                                }
                                ?>
                            </select>


                        </div><!-- /.field-row -->
                        <div class="field-row">
                            <label>Contact</label>
                            <input name="contact" type="text" class="le-input" maxlength="15">
                        </div>

                        <div class="field-row">
                            <label>Date of Birth</label>
                            <input name="dob" type="date" class="le-input">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile1">Picture1</label>
                            <input type="file" name="pic1">
                        </div>

                        <div class="buttons-holder">
                            <button name="submit" type="submit" class="le-button huge submit">Secure Sign In</button>
                        </div><!-- /.buttons-holder -->
                    </form><!-- /.cf-style-1 -->

                </section><!-- /.sign-in -->
            </div><!-- /.col -->


        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->
<!-- ========================================= MAIN : END ========================================= -->


<script>
    // email regular exp
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email.toLowerCase());
    }
    $(function () {

        // country and city start

        $("select[name='city']").prop('disabled', true);
        $("select[name=country]").change(function () {
            country = parseInt($(this).val());
            if (country === 0) {
                $("select[name=city]").prop('disabled', true);
                $("select[name=city]").children().remove();
                $(this).addClass('error');
                $("select[name=country], select[name=city]").addClass('error');
                $("select[name=city]").append("<option value='0' selected>Select a Country First</option>");
<?php
$countries2 = $data->view('country', '', array('name', 'ASC'));
while ($country = $countries2->fetch_object())
{
    echo "} else if (country == {$country->id}) { \n";
    echo " $(\"select[name=country], select[name=city]\").removeClass('error'); \n";
    echo " $(\"select[name=city]\").children().remove(); \n ";
    echo " $(\"select[name=city]\").prop('disabled', false); \n";
    echo " $(\"select[name=city]\").append(\"<option value='0'>Select City</option>\"); \n ";
    $cities2 = $data->view('city', '', ['name', 'ASC'], ["countryid" => $country->id]);
    while ($city = $cities2->fetch_object())
    {
        echo " $(\"select[name=city]\").append(\"<option value='{$city->id}'>{$city->city_name}</option>\"); \n";
    }
}
?>

            }
            ;
        });
        // country and city End

    });</script>


<script>
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email.toLowerCase());
    }
    $(function () {

        mail = false;

        // Validation of Form


        $(".le-input").focus(function () {
            $(this).addClass('focus');
        });
        $(".le-input").blur(function () {
            if ($(this).val() == "" || $(this).val() == 0) {
                $(this).removeClass('focus');
                $(this).addClass('error');
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
                mail = ture;
            } else {
                $(this).removeClass('focus okay');
                $(this).addClass('error');
                mail = false;
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

// for gender
        $("input[name='gender']").change(function () {
            if ($(this).prop("checked", true))
                $(".selectgen").removeClass('focus error').addClass('okay');
            else
                $(".selectgen").removeClass('focus okay').addClass('error');
        });


// country drop down

// submit button stop
        $(".submit").click(function () {
            err = 0;
            if ($("input[name='fname']").val() == "") {
                err++;
                // alert("fname");
                $("input[name='fname']").removeClass('focus okay').addClass('error');

            }
            if ($("input[name='email']").val() == "") {
                err++;
                // alert("email");
                $("input[name='email']").removeClass('focus okay').addClass('error');

            }
            if ($("input[name='pass1']").val() == "" && mail == false) {
                err++;
                //alert("pass1");
                $("input[name='pass1']").removeClass('focus okay').addClass('error');

            }
            if ($("input[name='pass2']").val() == "" || $("input[name='pass1']").val() != $("input[name='pass2']").val()) {
                err++;
                // alert("pass2");
                $("input[name='pass2']").removeClass('focus okay').addClass('error');

            }

            if (!$("input[name='gender']:checked").val()) {
                err++;
                $(".selectgen").removeClass('focus okay').addClass('error');
            }
            if ($("select[name='country']").val() == 0) {
                err++;
                // alert("country");
                $("select[name='country']").removeClass('focus okay').addClass('error');
            }
            if ($("select[name='city']").val() == 0) {
                err++;
                // alert("city");
                $("select[name='city']").removeClass('focus okay').addClass('error');
            }


            if ($("input[name='address']").val() == "") {
                err++;
                //alert("address");
                $("input[name='address']").removeClass('focus okay').addClass('error');
            }
            if ($("input[name='contact']").val() == "") {
                err++;
                //alert("contact");
                $("input[name='contact']").removeClass('focus okay').addClass('error');
            }
            if ($("input[name='dob']").val() == "") {
                err++;
                //alert("dob");
                $("input[name='dob']").removeClass('focus okay').addClass('error');
            }

            /*
             if ($(".le-input").hasClass('error')) {
             return false;
             } else {
             return true;
             }*/

            if (err != 0) {
                $(".errmsg").remove();
                $(this).before("<div class='errmsg'>Fill the form Properly</div>");
                err = 0;
                return false;
            } else {
                return true;
            }


        });

    });
</script>