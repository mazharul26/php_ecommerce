<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <!-- View -->

            <div class="container">
                <h1 class="title-color">Products Selling Information</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="index.php?e=seller_view" class="btn btn-success"> View Products</a>
                        <a href="index.php?e=seller"><button class="btn btn-info">Add New Product</button></a>
                    </div>
                </div>
            </div>
            <br/><br/>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-striped">
                            <tr  style="text-align: center">
                                <th> ID</th>
                                <th>Product id</th>

                                <th>Product Quantity</th>


                                <th>Product SalesID</th>
                                <th>SellerID </th>

                                <th>Per Product Price</th>
                                <th>Sub Total Price</th>

                                <th>Product Picture</th>


                            </tr>


                            <?php
                            $array = ["sellerid" => $_SESSION['user']['id']];

//                                print_r($array);
                            $products = $data->view("seller_my_sales", NULL, NULL, $array);

                            while ($row = $products->fetch_object())
                            {
                                echo '<tr  style="text-align: center">';
                                ?>
                                <?php
                                $subtotal[] = ($row->quantity * $row->price);

                                $total = array_sum($subtotal);

                                $totals = $total * 60 / 100
                                ?>
                                <td><?php echo $row->id ?></td>
                                <td><?php echo $row->productid ?></td>
                                <td><?php echo $row->quantity ?></td>
                                <td><?php echo $row->salesid ?></td>
                                <td><?php echo $row->sellerid ?></td>
                                <td><?php echo $row->price ?></td>
                                <td><?php echo($row->quantity * $row->price) ?></td>
                                <?php
                                echo "<td><img class='image-responsive' src='images/products/" . fileNameSecure($row->id) . '/' . $row->featuredImage . "' width='100'/></td>";
                                ?>



                                <?php
                                echo '</tr>';
                            }
                            ?>
                            <tr>
                                <td colspan="5" style="text-align: right"><h1>Total Price</h1></td>
                                <td colspan="3" style="text-align: center"><h1><?php echo$total ?></h1></td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: right"><h1>Seller Get Amount</h1></td>
                                <td colspan="3" style="text-align: center"><h1><?php echo $totals ?></h1></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
