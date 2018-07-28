<?php
$data = new Database();
if (isset($_POST['reg'])){
    
    $arrcity = array(
        "city_name" =>$data->validate($_POST['nm']), 
        "countryid" =>$data->validate($_POST['countryid'])
    );
    if ($arrcity = $data->insert("city", $arrcity)){
        echo "<p style='color:green'>Insert Successful</p>"; 
    } else {
        echo $data->Error;
    }
}



?>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <br><br>
                  <a class="btn btn-success" href="index.php?e=city-insert">Insert City</a>
                <a class="btn btn-success" href="index.php?e=city-view">View City</a>
              
             </div>
            
            <div class="col-md-12">
                
                <section class="section register inner-left-xs">




                    <form action="" role="form" class="register-form cf-style-1" method="post">
                        <div class="field-row">
                            <label><h2>City Name</h2></label>
                            <input type="text" class="le-input" name="nm">
                        </div><!-- /.field-row -->
                        
                         <div class="field-row">
                             <label for="countryid"><h1>Country Name</h1></label>
                             <select name="countryid">
                                 <?php
                                $countries = $data->view("country");
                                while ($poly = $countries->fetch_object()){
                                   echo "<option value='$poly->id'>$poly->country_name</option>";
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
