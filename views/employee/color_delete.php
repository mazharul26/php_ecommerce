
<?php

$data= new Database();
if (isset($_GET['id'])) {
    $arr = array(
        "id" => $_GET['id']
    );

    if ($result = $data->delete("color", $arr)) {
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
                <a href="index.php?e=Color-insert" class="btn btn-success">Insert Color</a>
                <a href="index.php?e=Color-view" class="btn btn-danger">View Color</a>
            </div>
            <div class="col-xs-12">
                <section class="section register inner-left-xs">

                    <h1>Available Color</h1>

                    <table class="table table-striped">
                        <tr>
                            <th  style='text-align: center'>ID</th>
                            <th  style='text-align: center'>Color</th>
                            <th  style='text-align: center'>Update</th>
                            <th  style='text-align: center'>Delete</th>

                        </tr> 
                        <tbody>
                            <?php
                            $data = new Database();
                            $Colr = $data->view("color");
                            while ($row = $Colr->fetch_object()) {
                                echo "<tr>";
                                echo "<td  style='text-align: center'>$row->id</td>";
                                echo "<td  style='text-align: center'>$row->color_name</td>";
                                echo"<td  style='text-align: center'><a href='index.php?e=color_update&id={$row->id}' class='btn btn-info'>Edit</a></td>";

                                echo"<td  style='text-align: center'><a href='index.php?e=color_delete&id={$row->id}' class='btn btn-info '>Delete</a></td>";

                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>


                </section>
            </div>
        </div>
    </div>
</main>

