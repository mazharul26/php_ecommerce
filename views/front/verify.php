<?php
// jodi session e email thake
if (isset($_SESSION['user']['email']))
{
    // verify button submit hole
    if (isset($_POST['verify']))
    {
        // matching verification code
        $result = $data->view("users", 'email, vcode', '', ['email' => "{$_SESSION['user']['email']}", 'vcode' => "{$data->validate($_POST['code'])}"]);
        if ($result->num_rows == 1)
        {
            // updating vcode to null
            $data->update("users", ['vcode' => NULL, 'type' => 1], ['email' => "{$_SESSION['user']['email']}"]);
            // Completing verify and taking user to profile
            $result = $data->view("users", 'id, type', '', ['email' => "{$_SESSION['user']['email']}"]);
            while ($row = $result->fetch_object())
            {
                /// echo "<b>" . $row->id . "</b><br>";
                session_unset();
                // new session data id and updating session data type
                $_SESSION['user']['id'] = $row->id;
                $_SESSION['user']['type'] = $row->type;
                Redirect('index.php?u=profile');
            }
        }
        else
        {
            echo $data->Error;
        }
    }
    ?>
    <!-- ========================================= MAIN ========================================= -->

    <main id="authentication" class="inner-bottom-md">
        <div class="container">
            <div class="row">

                <div class="col-xs-12">
                    <section class="section register inner-left-xs">
                        <h2 class="bordered">Thank you for join us.</h2>
                        <?php
                        if (isset($_SESSION['retry']))
                        {
                            echo $_SESSION['user']['retry'];
                            echo $_SESSION['user']['email'];
                            echo $_SESSION['user']['type'];
                            ?>
                            <p>your email <b><?php echo $_SESSION['email']; ?></b> is not verified. Please check your inbox as we have send you a new verification code. Enter the verification code below to confirm your account.
                            </p>

                            <?php
                        }
                        else
                        {
                            ?>
                            <p>We have just send you an email with verification code at <b>
                                    <?php echo $_SESSION['email']; ?></b>. Enter the verification code below to confirm your account.</p>
                            <?php
                        }
                        ?>

                        <form action="" method="post" role="form" class="register-form cf-style-1">
                            <div class="field-row">
                                <div class="field-row">
                                    <label>Enter Verification code</label>
                                    <input name="code" type="text" class="le-input vCode" placeholder="Enter code.. ">
                                </div><!-- /.field-row -->

                                <div class="buttons-holder">
                                    <button name="verify" type="submit" class="le-button huge">Verify</button>
                                </div><!-- /.buttons-holder -->
                                <?php ?>
                        </form>


                    </section><!-- /.register -->

                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.authentication -->
    <!-- ========================================= MAIN : END ========================================= -->
    <script>
        $(function () {
            $('.vCode').focus(function () {
                $(this).removeClass('okay error').addClass(' focus ');
            });
            $('.vCode').blur(function () {
                if ($(this).val().length == 8)
                    $(this).removeClass('focus error').addClass('okay');
                else
                    $(this).removeClass('okay focus').addClass('error');

            });
        });
    </script>

    <?php
}
else
{

    Redirect('index.php?f=profile');
}