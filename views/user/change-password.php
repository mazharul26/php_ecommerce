
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <h2 class="bordered">Create New Account</h2>

                    <p>Create your own Media Center account</p>

                    <form action="" method="post" role="form" class="register-form cf-style-1">
                        <div class="field-row">
                            <label>Old Password</label>
                            <input name="oldpass" type="text" class="le-input">
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

                        <?php
                        /*
                          if (isset($_POST['submit']))
                          {
                          //$passCheck = $data->view("users", ['password' => $newPass], ['id' => "{$_SESSION['user']['id']}"]);

                          $newPass = $data->validate(md5($_POST['pass1']));
                          $passUpdate = $data->update("users", ['password' => $newPass], ['id' => "{$_SESSION['user']['id']}"]);
                          if ($passUpdate->num_rows == 1)
                          {
                          echo "password change successfully";
                          }
                          }
                         *
                         */
                        ?>

                    </form>


                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->
