<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>
<?php
$d = new Database();
if (isset($_POST['send'])) {

    $where = array(
        "id" => $_GET['id']
    );
    if ($_POST['product'] != "") {
        $arr = array(
            "productid" => $d->VD($_POST['product']),
            "discount" => $d->VD($_POST['discount']),
            "vat" => $d->VD($_POST['vat']),
            "quantity" => $d->VD($_POST['quantity']),
            "salesid" => $d->VD($_POST['sales'])
        );

        if ($d->update("sales_details", $arr, $where)) {
            echo "<p style='color: green'>Update successfully</p>";
            Redirect("index.php?e=salesdetails-view");
        } else {
            echo "<p style='color: red'>Anything wrong</p>";
        }
    } else {
        echo "<p style='color: red'>Product requerd</p>";
    }
}
?> 

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">



            <div class="col-md-12">
                <h2 class="bordered">Sales-details Update here</h2>
                <section class="section register inner-left-xs">
                    <a href="index.php?e=salesdetails"><input type="button" name="new" value="New" class="btn btn-success"></a>
                    <a href="index.php?e=salesdetails-view"><input type="button" name="view" value="View" class="btn btn-success"></a><br><br>          
                    <form role="form" class="login-form cf-style-1" method="post">
                        <div class="field-row">
                            <?php
                            $data = $d->view("salesdetails_view", "*", "", array("id" => $_GET['id']));
                            while ($value = $data->fetch_object()) {
                                ?>
                                <label>Product Name</label>
                            </div><!-- /.field-row -->

                            <div class="field-row">
                                <label for="product">Product</label>
                                <select name="product" class="form-control">
                                    <option><?php echo $value->title ?></option>
                                    <?php
                                    $products = $d->view("product", "*");
                                    while ($product = $products->fetch_object()) {
                                        echo "<option value='$product->id'>$product->title</option>";
                                    }
                                    ?>
                                </select>
                            </div><!-- /.field-row -->

                            <div class="field-row">
                                <label for="discount">Discount</label>
                                <input type="text" class="le-input" name="discount"  value="<?php echo $value->discount ?>">  
                            </div>

                            <div class="field-row">
                                <label for="vat">Vat</label>
                                <input type="text" class="le-input" name="vat"  value="<?php echo $value->vat ?>">  
                            </div>
                            <div class="field-row">
                                <label for="quantity">Quantity</label>
                                <input type="text" class="le-input" name="quantity"  value="<?php echo $value->quantity ?>">  
                            </div>

                            <div class="field-row">
                                <label for="sales">Sales</label>
                                <select name="sales" class="form-control">
                                    <option><?php echo $value->salesid ?></option>
                                    <?php
                                    $saless = $d->view("sales", "*");
                                    while ($sales = $saless->fetch_object()) {
                                        echo "<option value='$sales->id'>$sales->id</option>";
                                    }
                                    ?>
                                </select>
                            </div><!-- /.field-row -->

                            <div class="buttons-holder">
                                <input type="submit" class="le-button huge" name="send" value="Update">
                            </div>

                            <?php
                        }
                        ?>
                    </form>

                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->

</main><!-- /.authentication -->
