<?php
session_start();

$rooturl = 'http://localhost/mediacenter/';
require 'helpers/functions.php';
require 'views/title.php';
require 'models/Database.php';
$data = new Database();
arrecho($_SESSION);
//unset($_SESSION['discount']);

if (isset($_GET['f']) && isset($_GET['aff']))
{
    $affRef = $data->view('affiliates', NULL, NULL, ['affiliate_ref' => $_GET['aff']]);
    while ($aff = $affRef->fetch_object())
    {
        setcookie('mediaAff', $aff->id, (time() + 2592000), '/');
    }
}
//print_r($_COOKIE['mediaAff']);
?>
<!DOCTYPE html>

<html lang="en">
    <?php
    // head tag with meta info and styles
    require './views/sections/meta.php';
    ?>
    <body>
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <div class="wrapper">
            <!-- ============================================================= TOP NAVIGATION ============================================================= -->


            <!-- ========== view php code  =================== -->
            <?php
            if (isset($_GET['f']))
                $checkout = $_GET['f'];
            else
                $checkout = FALSE;
            if ($checkout != 'checkout')
            {
                /*
                 * Regular Page
                 */
                // above the change content, naigations and headers
                require './views/sections/nav.php';
                require './views/sections/header.php';

                require "controllers/controller.php";

                // footer
                require './views/sections/footer.php';
            }
            else
            {
//                require './views/sections/nav.php';
//                require './views/sections/header.php';
                require './views/sections/checkout-header.php';
                // change the content
                require "controllers/controller.php";
                require './views/sections/checkout-footer.php';
            }
            ?>
            <!-- ========== view php code end =================== -->

        </div><!-- /.wrapper -->

        <!-- JavaScripts placed at the end of the document so the pages load faster -->
<!--      <script src="assets/js/jquery-1.10.2.min.js"></script>-->

        <script src="assets/js/jquery-migrate-1.2.1.js"></script>
        <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/css_browser_selector.min.js"></script>
        <script src="assets/js/echo.min.js"></script>
        <script src="assets/js/jquery.easing-1.3.min.js"></script>
        <script src="assets/js/bootstrap-slider.min.js"></script>
        <script src="assets/js/jquery.raty.min.js"></script>
        <script src="assets/js/jquery.prettyPhoto.min.js"></script>
        <script src="assets/js/jquery.customSelect.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <!-- add to card-->
        <script src="assets/js/cart.js" type="text/javascript"></script>



        <?php
        if (isset($_SESSION['user']) && $_SESSION['user']['type'] == 1)
        {
            ?>
            <script src="assets/js/wishlist.js" type="text/javascript"></script>
            <?php
        }
        ?>



    </body>
</html>