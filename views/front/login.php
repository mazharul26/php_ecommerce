<?php
if (isset($_SESSION['user']['retry']))
{
    Redirect("index.php?f=verify.php");
}
elseif (isset($_SESSION['user']['id']) || isset($_SESSION['user']['type']) || isset($_SESSION['user']['email']))
{
    Redirect("index.php");
    echo $_SESSION['user']['email'] . "<br>";
    echo $_SESSION['user']['type'] . "<br>";
}
else
{

    if (isset($_POST['submit']))
    {
//    $err = 0;
//    if ($err == 0)
//    {
//        echo "err0";
//    }
//    else
//    {
//        echo "err1";
//    }


        $login = [
            "email" => $data->validate($_POST['email']),
            "password" => $data->validate(md5($_POST['pass'])),
        ];
        //print_r($login);
        $result = $data->view("users", "id, email, type, vcode", '', $login);

        // echo $result;


        if ($result->num_rows == 1)
        {
            while ($value = $result->fetch_object())
            {
                // account is okay where type is not zero and vcode is empty
                if ($value->type > 0 && $value->vcode == NUll)
                {
                    $_SESSION['user']['id'] = $value->id;
                    $_SESSION['user']['type'] = $value->type;

                    if ($value->type == 2)
                        Redirect("index.php?a=dashboard");
                    else
                        Redirect("index.php?u=profile");
                }
                elseif ($value->type == 0 || $value->vcode == NULL)
                {
                    $a = $data->validate(RandStr(8));

                    $data->update("users", ['vcode' => $a, 'type' => 0], ['email' => $value->email]);

                    $_SESSION['user']['email'] = $value->email;
                    $_SESSION['user']['type'] = 0;
                    $_SESSION['user']['retry'] = 1;
                    echo $_SESSION['user']['email'] . "<br>";
                    echo $_SESSION['user']['type'] . "<br>";
                    Redirect("index.php?f=verify");
                }
                else
                {
                    echo "Account don't exits";
                }
            }
        }
        else
        {
            echo $data->Error;
        }
    }
    ?><!-- ========================================= MAIN ========================================= -->

    <main id="authentication" class="inner-bottom-md">
        <div class="container">
            <div class="row">

                <div class="col-xs-12">
                    <section class="section register inner-left-xs center-block" style="max-width: 500px; margin: 0 auto">
                        <h2 class="bordered">Login to Your Account</h2>

                        <p>Enter Email and Password</p>

                        <form action="" method="post" role="form" class="register-form cf-style-1">
                            <div class="field-row">
                                <label>Email</label>
                                <input name="email" type="text" class="le-input">
                            </div><!-- /.field-row -->
                            <div class="field-row">
                                <label>Password</label>
                                <input name="pass" type="password" class="le-input">
                            </div><!-- /.field-row -->
                            <p>admin@localhost.com  - 1234</p>
                            <div class="buttons-holder">
                                <button name="submit" type="submit" class="le-button huge">Log In</button>
                            </div><!-- /.buttons-holder -->
                            <br/>
                            <div><a href='index.php?f=forgot-password'>Forgot Password??</a></div>
                        </form>


                    </section><!-- /.register -->

                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.authentication -->
    <!-- ========================================= MAIN : END ========================================= -->
    <script>
        $(function () {
            $("button[name='submit']").click(function () {

                go = 0;
                if ($("input[name='email']").val() == "") {
                    $("input[name='email']").removeClass('focus okay').addClass('error');
                    go++;
                }
                if ($("input[name='pass']").val() == "") {
                    $("input[name='pass']").removeClass('focus okay').addClass('error');
                    go++;
                }
                if (go > 0) {
                    $(this).before("<div class='errmsg'>Fill the form Properly</div>");
                    return false;
                } else {
                    return true;
                }

            });
            //        $(".le-input").foucs(function () {
            //            alert('okasadsa');
            //
            //        });
            //
            //        $("form").children('input').blur(function () {
            //            if ($("form").children('input').empty())
            //                $("form").children('input').removeClass('focus okay').addClass('error');
            //            else
            //                $("form").children('input').removeClass('error focus').addClass('okay');
            //        });
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
        });
    </script>

    <?php
}
?>