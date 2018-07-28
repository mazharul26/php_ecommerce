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
                        <a href="index.php?e=seller_view" class="btn btn-success"> View Products</a>
                        <a href="index.php?e=seller"><button class="btn btn-info">Add New Product</button></a>
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


                                <th>Product Category</th>

                                <th>Product Price</th>
                                <th>Product Stock</th>
                                <th>Product Unit</th>
                                <th>Update</th>
                                <th>Delete</th>


                            </tr>
                            <tbody>

                                <?php
                                $array = ["id" => $_SESSION['user']['id']];


                                $products = $data->view("seller_my_products", NULL, NULL, $array);
                                while ($row = $products->fetch_object())
                                {
                                    echo '<tr>';
                                    ?>

                                <td><?php echo $row->title, '<br>'; ?>

                                    <img class='image-responsive' src="
                                         <?php
                                         $featured = explode('.', $row->featuredImage);
                                         echo $rooturl . resize(
                                                 'images/products/' . fileNameSecure($row->ids) . '/' . $row->featuredImage, 'images/products/' . fileNameSecure($row->ids) . '/' . 'f-73-73.' . $featured[1], 73, 73);
                                         ?>
                                         "/>
                                </td>
                                <td><?php echo $row->name ?></td>
                                <td><?php echo $row->category_name, '&rtrif;', $row->subcategory_name ?></td>
                                <td><?php echo $row->price ?></td>
                                <td><?php echo $row->stock ?></td>
                                <td><?php echo $row->unit_name ?></td>

                                <?php
                                echo "<td><a href='index.php?s=my-products-edit&add=$row->ids'>Edit</a></td>";
                                echo "<td><a href='index.php?s=my-products-delete&ids=$row->ids'>Delete</a></td>";
                                ?>



                                <?php
                                echo '</tr>';
                            }
                            ?>



                            <?php
                            /*
                              $Colr = $data->view("product");
                              while ($row = $Colr->fetch_object()) {
                              echo "<tr>";

                              //                                    echo "<td>$row->id</td>";
                              echo "<td>$row->title</td>";
                              echo "<td>$row->description</td>";
                              echo "<td>$row->userid</td>";

                              echo "<td>$row->subcategoryid</td>";
                              echo "<td>$row->subcategoryid</td>";


                              echo "<td>$row->price</td>";
                              echo "<td>$row->sales_price</td>";
                              echo "<td>$row->discount</td>";
                              echo "<td>$row->vat</td>";
                              echo "<td>$row->stock</td>";

                              echo "<td>$row->unitid</td>";
                              echo "<td><img class='image-responsive' src='images/products/" . fileNameSecure($row->id, 'img', 'product') . '/1.' . $row->picture1 . "' /></td>";
                              echo "<td><img class='image-responsive' src='images/products/" . fileNameSecure($row->id, 'img', 'product') . '/2.' . $row->picture2 . "' /></td>";
                              echo "<td><img class='image-responsive' src='images/products/" . fileNameSecure($row->id, 'img', 'product') . '/3.' . $row->picture3 . "' /></td>";


                              echo "<td><a href='?e=product-edit&id=$row->id'>Edit</a></td>";
                              echo "<td><a href='?e=product-delete&id=$row->id'>Delete</a></td>";
                              echo "<tr>";
                              }
                             *
                             */
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
