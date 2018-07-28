<?php
if (isset($_POST['reg'])) {

    $where = array(
        "country_name" => $data->validate($_POST['nm']),
    );
    if ($result = $data->insert("country", $where)) {
       Redirect("index.php?e=country-view");
      // echo 'insert Yes';
    } else {
        echo $result->Error;
    }
}
?>

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <br><br>
                  <a class="btn btn-sm" href="index.php?e=country-insert">Insert Country</a>
                <a class="btn btn-sm" href="index.php?e=country-view">View Country</a>
              
             </div>
            
            <div class="col-md-12">
                
                <section class="section register inner-left-xs">




                    <form action="" role="form" class="register-form cf-style-1" method="post">
                        <div class="field-row">
                            <label><h2>Country Name</h2></label>
                            <input type="text" class="le-input" name="nm">
                        </div><!-- /.field-row -->
                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge" name="reg">Upload</button>
                        </div><!-- /.buttons-holder -->
                        
                        
                    </form>

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
