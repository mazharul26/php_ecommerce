<?php
//echo $_SESSION['user']['email'] . "<br>";
//echo $_SESSION['user']['retry'] . "<br>";
//echo $_SESSION['user']['type'] . "<br>";

if (isset($_POST['submit']))
{
    $login = [
        "vcode" => $data->validate($_POST['vcode']),
        "password" => $data->validate(md5($_POST['pass1']))
    ];

    $newPass = $data->validate(md5($_POST['pass1']));
    // match vcode
    $result = $data->view("users", "email, vcode ", '', ['email' => "{$_SESSION['user']['email']}", 'vcode' => "{$data->validate($_POST['vcode'])}"]);
    if ($result->num_rows == 1)
        while ($value = $result->fetch_object())
        {
            $data->update("users", ['vcode' => NULL, 'type' => 1, 'password' => $newPass], ['email' => $value->email]);
            session_unset();
            $result2 = $data->view("users", "id, type ", '', ['email' => $value->email]);
            while ($value1 = $result2->fetch_object())
            {
                $_SESSION['user']['id'] = $value1->id;
                $_SESSION['user']['type'] = $value1->type;
                echo $_SESSION['user']['id'] . "<br>";
                echo $_SESSION['user']['type'] . "<br>";
                Redirect("index.php?f=profile");
            }
        }
}
?>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <h2 class="bordered">Create New Account</h2>

                    <p>Create your own Media Center account</p>

                    <form action="" method="post" role="form" class="register-form cf-style-1">
                        <div class="field-row">
                            <label>Verification Code</label>
                            <input name="vcode" type="text" class="le-input">
                        </div><!-- /.field-row -->
                        <div class="field-row">
                            <label>New Password</label>
                            <input name="pass1" type="text" class="le-input">
                        </div><!-- /.field-row -->
                        <div class="field-row">
                            <label>Retype Password</label>
                            <input name="pass2" type="text" class="le-input">
                        </div><!-- /.field-row -->

                        <div class="buttons-holder">
                            <button name="submit" type="submit" class="le-button huge">Reset Password</button>
                        </div><!-- /.buttons-holder -->

                    </form>


                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->
<!--