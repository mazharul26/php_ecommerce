
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <br>
                <?php
                if (isset($_POST['reg'])) {

                    $arr = array(
                        "country_name" => $data->validate($_POST['nm']),
                    );
                    $where = array(
                        "id" => $_GET['id']
                    );

                    if ($result = $data->update("country", $arr, $where)) {
                        //echo $result;
                        //Redirect("index.php?e=country-view");
                        echo "<p style='color:green'>Update Successful</p>";
                    } else {
                        echo $result->Error;
                    }
                }
                ?>

                <a class="btn btn-sm" href="index.php?e=country-view">View Country</a>
               <a class="btn btn-sm" href="index.php?e=country">Insert Country</a>
            </div>

            <div class="col-md-12">

                <section class="section register inner-left-xs">

                    <?php
                    $country = $data->view("country", "", "", array("id" => $_GET['id']));
                    while ($value = $country->fetch_object()) {
                        
                        ?>


                        <form action="" role="form" class="register-form cf-style-1" method="post">
                            <div class="field-row">
                                <label><h2>Edit Country</h2></label>
                                <input type="text" class="le-input" name="nm"
                                       value="<?php echo $value->country_name ?>">
                            </div><!-- /.field-row -->
                            <div class="buttons-holder">
                                <button type="submit" class="le-button huge" name="reg">Save</button>
                            </div><!-- /.buttons-holder -->


                        </form>
                        <?php
                    }
                    ?>
                    <h2 class="semi-bold">Sign up today and you'll be able to :</h2>

                    <ul class="list-unstyled list-benefits">
                        <li><i class="fa fa-check primary-color"></i> Speed your way through the checkout</li>
                        <li><i class="fa fa-check primary-color"></i> Track your orders easily</li>
                        <li><i class="fa fa-check primary-color"></i> Keep a record of all your purchases</li>
                    </ul>

                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->
