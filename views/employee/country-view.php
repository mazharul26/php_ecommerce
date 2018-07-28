

<?php
$d = new Database();
if (isset($_GET['id'])) {
    $where = array(
        "id" => $_GET['id']
    );

    if ($d1 = $d->delete("country", $where)) {
        echo 'Delete Successful';
    } else {
        echo 'Delete Unsuccessful';
    }
}
?>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <br><br>
                <a class="btn btn-sm" href="index.php?e=country-view">View Country</a>
                <a class="btn btn-sm" href="index.php?e=country-insert">Insert Country</a>
            </div>

            <div class="col-md-12">

                <section class="section register inner-left-xs">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Country Name</th>
                            <th>Edit</th> 
                            <th>Delete</th> 
                        </tr>
                        <?php
                        $d = new Database();
                        $data = $d->view("country");
                        while ($value = $data->fetch_object()) {
                            echo "<tr>";
                            echo "<td>$value->country_name</td>";
                            echo "<td><a href='index.php?e=country-update&id={$value->id}'><input type='button' name='up' value='edit' class='btn btn-info'/></a></td>";
                            echo "<td><a href='index.php?e=country-view&id={$value->id}'><input type='button' name='up' value='delete' class='btn btn-danger'/></a></td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>


                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->
