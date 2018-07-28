<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>


<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">



            <div class="col-md-4">
                <h2 class="bordered">Sales-details Insert here</h2>
                <section class="section register inner-left-xs">
                    <a href="index.php?e=salesdetails"><input type="button" name="new" value="New" class="btn btn-success"></a>
                    <a href="index.php?e=salesdetails-view"><input type="button" name="view" value="View" class="btn btn-success"></a><br><br>          
                    <form role="form" class="login-form cf-style-1" method="post">
                        <div class="field-row">
                            <?php
                            $d = new Database();
                            if (isset($_POST['send'])) {

                                if ($_POST['product'] != "") {
                                    $arr = array(
                                        "productid" => $d->VD($_POST['product']),
                                        "discount" => $d->VD($_POST['discount']),
                                        "vat" => $d->VD($_POST['vat']),
                                        "quantity" => $d->VD($_POST['quantity']),
                                        "salesid" => $d->VD($_POST['sales'])
                                    );

                                    if ($d->insert("salesdetails", $arr)) {
                                        echo "<p style='color: green'>Insert successfully</p>";
                                    } else {
                                        echo "<p style='color: red'>Anything wrong</p>";
                                    }
                                } else {
                                    echo "<p style='color: red'>Product requerd</p>";
                                }
                            }
                            ?> 
                            <label>Product Name</label>
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="product">Product</label>
                            <select name="product" class="form-control">
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
                            <input type="text" class="le-input" name="discount">  
                        </div>

                        <div class="field-row">
                            <label for="vat">Vat</label>
                            <input type="text" class="le-input" name="vat">  
                        </div>
                        <div class="field-row">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="le-input" name="quantity">  
                        </div>

                        <div class="field-row">
                            <label for="sales">Sales</label>
                            <select name="sales" class="form-control">
                                <?php
                                $saless = $d->view("sales", "*");
                                while ($sales = $saless->fetch_object()) {
                                    echo "<option value='$sales->id'>$sales->id</option>";
                                }
                                ?>
                            </select>
                        </div><!-- /.field-row -->

                        <div class="buttons-holder">
                            <input type="submit" class="le-button huge" name="send" value="Save">
                        </div>


                    </form>

                </section><!-- /.register -->

            </div><!-- /.col -->


            <div class="col-md-8">
                <h2 class="bordered">Sales details view</h2>
                <section class="section register inner-left-xs">
                    <?php
                    $d = new Database();
                    if (isset($_GET['id'])) {
                        $where = $_GET['id'];
                        if ($d->delete("salesdetails", $where)) {
                            echo 'Delete successfully';
                            unlink('$where.txt');
                        } else {
                            echo 'Anything wrong';
                        }
                    }
                    ?>
                    <form method="post">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Product Name</th>
                                <th>Discount</th>
                                <th>Vat</th>
                                <th>Quantity</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                            <?php
                            $data = $d->view("sales_details_view ", "*");
                            while ($value = $data->fetch_object()) {
                                echo "<tr>";
                                echo "<td>$value->title</td>";
                                echo "<td>$value->discount</td>";
                                echo "<td>$value->vat</td>";
                                echo "<td>$value->quantity</td>";
                                echo "<td><a href='index.php?e=salesdetails-update&id={$value->id}'><input type='button' value='Edit' class='btn btn-info'></a></td>";
                                echo "<td><a href='index.php?e=salesdetails&id={$value->id}'><input type='button' value='delete' class='btn btn-danger'></a></td>";
                                echo "</tr>";
                            }
                            ?>

                        </table>
                    </form>

                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->

</main><!-- /.authentication -->
