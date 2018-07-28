<?php
$data = new Database();

if (isset($_GET['id'])) {
    $arr = array(
        "id" => $_GET['id']
    );

    if ($result = $data->delete("delivery", $arr)) {
        echo 'Yes';
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
                <a class="btn btn-success" href="index.php?e=delivery-insert">Insert Delivery</a>
                <a class="btn btn-success" href="index.php?e=delivery-view">View Delivery</a>

            </div>

            <div class="col-md-12">
                <section class="section register inner-left-xs">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Charge Amount</th>
                            <th>City Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <?php
                        $data = new Database();
                        $delivery = $data->view("delivery_view");
                        while ($poly = $delivery->fetch_object()) {
                            echo "<tr>";
                            echo "<td>{$poly->charge}</td>";
                            echo "<td>{$poly->city_name}</td>";
                            echo "<td><a href='index.php?e=delivery-update&id={$poly->id}'><input type='button' name='up' value='edit' class='btn btn-info'/></a></td>";
                            echo "<td><a href='index.php?e=delivery-view&id={$poly->id}'><input type='button' name='up' value='delete' class='btn btn-danger'/></a></td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>
                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->
