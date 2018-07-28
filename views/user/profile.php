<?php
if (isset($_SESSION['user']['id']))
{
    ?>
    <main id="authentication" class="inner-bottom-md">
        <div class="container">
            <div class="row">

                <div class="col-xs-12">
                    <section class="section register inner-left-xs">
                        <h2 class="bordered">Profile</h2>
                        <?php
                        echo $_SESSION['user']['type'] . "<br>";
                        echo $_SESSION['user']['id'];
                        ?>
                        <p>Your Profile page</p>
                        <a href="index.php?e=payment-insert">Insert Payment </a>
                        <a href="index.php?e=payment-view">view Payment  </a>
                        <a href="index.php?u=change-password">Change password</a>


                    </section><!-- /.register -->

                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </main>

    <?php
}
else
{
    Redirect("index.php?f=login");
}