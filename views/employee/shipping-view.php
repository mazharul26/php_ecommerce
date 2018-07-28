<!--SELECT * FROM tablename Order BY ID ASC-->
<?php
$data = new Database();
?>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=shipping-insert" class="btn btn-success">Insert Shipping</a>
                <a href="index.php?e=shipping-view"  class="btn btn-danger" >View Shipping</a>
            </div>

            <div class="col-md-12">

                <section class="section register inner-left-xs">

                    <table class="table table-striped table-hover">
                        <tr>
                            <th>shipping Name</th>
                            <th>Delivery Rate(id)</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <?php
                        $shippingView = $data->view('shipping');
                        //print_r($shippingView);
                        while ($row = $shippingView->fetch_object()) {
                            ?>
                            <tr>
                                <td><?php echo $row->address; ?></td>
                                <td><?php echo $row->deliveryid; ?></td>
                                <!--   index.php?e=shipping-delete&id=3-->
                                <td><a href="index.php?e=shipping-edit&id=<?php echo $row->id ?>">Edit</a></td>
                                <td><a href="index.php?e=shipping-delete&id=<?php echo $row->id ?>">Delete</a></td>
                            </tr>
                            <?php
                        };
                        ?>


                    </table>


                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->
