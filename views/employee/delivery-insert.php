<?php
$data = new Database();
if(isset($_POST['reg'])){
    $arr = array(
       "charge" => $data->validate($_POST['charge']),
        "cityid" => $data->validate($_POST['cityid']),
    );
    
    if ($result = $data->insert("delivery", $arr)){
        echo "<p style = 'color:green'>City Insert Successful</p>"; 
    } else {
        echo $result->Error;
    }
}


?>
   <?php
//                        $d = new Database();
//                        if (isset($_POST['reg'])) {
//
//                            $where = array(
//                                "charge" => $d->VD($_POST['charge']),
//                                "cityid" => $d->VD($_POST['cityid']),
//                            );
//                            if ($result = $d->insert("delivery", $where)) {
//                                // Redirect("index.php?e=delivery-view");
//                                echo "<p style ='color:green'>Yes</p>";
//                            } else {
//                                echo $result->Error;
//                            }
//                        }
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

                    <form action="" role="form" class="register-form cf-style-1" method="post">
                        <div class="field-row">
                            <label><h2>Charge Amount</h2></label>
                            <input type="text" class="le-input" name="charge">
                            
                        </div><!-- /.field-row -->
                        
                         <div class="field-row">
                             <label><h1>City Name</h1></label>
                             <select name="cityid">
                             <?php
                             $d = $data->view("city");
                             while ($city = $d->fetch_object() ){
                                 echo "<option value='$city->id'>$city->city_name</option>"; 
                             }
                             
                             ?>
                             </select>
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
