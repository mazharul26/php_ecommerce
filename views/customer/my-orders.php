<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h2 class="bordered">Sales</h2>



                <div class="col-md-12">

                    <section class="section register inner-left-xs">



                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Details</th>

                            </tr>
                            <?php
                            $sales = $data->view("sales", '', '', ['customerid' => $_SESSION['user']['id']]);
                            while ($value = $sales->fetch_object())
                            {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $value->sale_date; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->sale_date; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->sale_date; ?>
                                    </td>
                                    <td>
                                        <?php echo '<a href="index.php?c=my-order-details&id=' . $value->id . '">details</a>'; ?>
                                    </td>
                                </tr>


                                <?php
                            }
                            ?>

                        </table>


                    </section><!-- /.register -->

                </div><!-- /.col -->



            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->

</main><!-- /.authentication -->

