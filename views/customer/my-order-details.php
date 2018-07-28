<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="bordered">Sales details view</h2>
                <section class="section register inner-left-xs">

                    <form method="post">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Product Name</th>
                                <th>Discount</th>

                            </tr>
                            <?php
                            $details = $data->procedure('my_order_details', $_GET['id']);
                            while ($value = $details->fetch_object())
                            {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $value->productid; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->featuredImage; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->title; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->quantity; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->price; ?>
                                    </td>

                                </tr>


                                <?php
                            }
                            ?>

                        </table>
                    </form>

                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->

</main><!-- /.authentication -->
