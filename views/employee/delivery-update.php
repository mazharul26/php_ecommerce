<?php
if (isset($_POST['reg'])) {
   
  
    $arr = array(
    "charge" => $data->validate($_POST['nm']),
    );
      $where = array(
        "id" => $_GET['id']
    );
      if($poly = $data->update("delivery", $arr, $where)){
          echo "Update successfull";
      } else {
         $poly->Error; 
      }
}
?>


<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <br><br>
                <a class="btn btn-success" href="index.php?e=delivery-insert">Insert Delivery</a>
                <a class="btn btn-success" href="index.php?e=delivery-view">View Delivery</a>
            </div>


            <div class="col-md-12">
                <section class="section register inner-left-xs">
                    <?php
                    $delivery = $data->view("delivery", "", "", array("id" => $_GET['id']));
                    while ($value = $delivery->fetch_object()) {
                        ?>
                        <form action="" role="form" class="register-form cf-style-1" method="post">
                            <div class="field-row">
                                <label><h2>Edit Charge</h2></label>
                                <input type="text" class="le-input" name="nm" value="<?php echo $value->charge ?>">
                                <!--                             
                                                            
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