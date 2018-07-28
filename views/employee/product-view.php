<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <!-- View -->

            <div class="container">
                <h1 class="title-color">View Products</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="index.php?e=product-view"><button class="btn btn-sm">View Products</button></a>
                        <a href="index.php?e=product-insert"><button class="btn btn-sm">Add New Product</button></a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-striped">
                            <tr>
                                <th>Product Title</th>
                                <th>Product Seller</th>
                                <th>Category</th>
                                <th>Price</th>                               
                                <th>Stock</th>
                                <th>Unit</th>
                            </tr>
                            <tbody>

                                <?php
                                $products = $data->view("product_view");
                                while ($row = $products->fetch_object())
                                {
                                    echo '<tr>';
                                    ?>

                                <td><p><?php echo $row->title ?> <br> <img class='image-responsive' src="

                                                                           <?php
                                                                           $featured = explode('.', $row->featuredImage);
                                                                           echo $rooturl . resize(
                                                                                   'images/products/' . fileNameSecure($row->id) . '/' . $row->featuredImage, 'images/products/' . fileNameSecure($row->id) . '/' . 'f-73-73.' . $featured[1], 73, 73);
                                                                           ?>
                                                                           "/>

                                        <br>
                                        <?php
                                        if ($_SESSION['user']['type'] == 5)
                                        {
                                            echo '<small><a href="index.php?e=featured-insert&id=' . $row->id . '">Make it Featured Product' . '</a></small>';
                                        }
                                        ?>
                                    </p>
                                </td>
                                <td><?php echo $row->name ?></td>
                                <td><?php echo $row->category_name ?> &RightArrow; <?php echo $row->subcategory_name ?></td>
                                <td><?php echo $row->price ?></td>                                
                                <td><?php echo $row->stock ?></td>
                                <td><?php echo $row->unit_name ?></td>




                                <?php
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
