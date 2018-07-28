<!-- ========================================= MAIN ========================================= -->
<?php
if (isset($_SESSION['user']['id']))
{

}
else
{
    if (isset($_POST['submit']))
    {
        $login = [
            "email" => $data->validate($_POST['email']),
            "contact" => $data->validate($_POST['contact']),
        ];
        print_r($login);
        $result = $data->view("users", "email, type, vcode, contact", '', $login);
        if ($result->num_rows == 1)
        {
            while ($value = $result->fetch_object())
            {
                $a = $data->validate(RandStr(8));
                $data->update("users", ['vcode' => $a, 'type' => 0], ['email' => $value->email]);
                session_unset();
                $_SESSION['user']['email'] = $value->email;
                $_SESSION['user']['type'] = 0;
                $_SESSION['user']['retry'] = 1;
                echo $_SESSION['user']['email'] . "<br>";
                echo $_SESSION['user']['type'] . "<br>";
                echo " worked <br>";
                Redirect("index.php?f=reset-password");
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
                                <label>Email</label>
                                <input name="email" type="text" class="le-input">
                            </div><!-- /.field-row -->
                            <div class="field-row">
                                <label>Contact</label>
                                <input name="contact" type="text" class="le-input">
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
    <!-- ========================================= MAIN : END ========================================= -->
    <?php
}
?>
