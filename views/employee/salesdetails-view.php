<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>


<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="bordered">Sales details view</h2>
                <section class="section register inner-left-xs">
                    <?php
                    $d = new Database();
                    if (isset($_GET['id'])) {
                        $where = $_GET['id'];
                        if ($d->delete("dalesdetails", $where)) {
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
                                <th>Sales-id</th>
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
                                echo "<td>$value->salesid</td>";
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
