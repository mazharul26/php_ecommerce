<?php



if (isset($_GET['id'])) {
    $arr = array(
        "id" => $_GET['id']
    );

    if ($result = $data->delete("review", $arr)) {
        echo 'Yes';
    } else {
        echo $data->Error;
    }
}


?>







<div class="container">
    <div class="row">

        <div class="col-sm-8">
            <br/><br/>
            <a href="index.php?e=review_insert" class="btn btn-success">Review</a>
            <a href="index.php?e=review_view" class="btn btn-warning">View</a>


            <br/><br/><br/><br/>
            <h2>Product Review Information</h2><br/><br/>
            <table class="table table-bordered" border="1">
                <thead style="background-color: #ffffff; color: #3399ff">

                    <tr >
                        <th style="text-align: center">Rating</th>
                        <th  style="text-align: center">User-Name</th>
                        <th  style="text-align: center">Product-Name</th>

                        <th  style="text-align: center">Update</th>
                        <th  style="text-align: center">Delete</th>

                    </tr>
                </thead>
                <?php
                $data = new Database();
                $sql = $data->view("review");


                while ($d = $sql->fetch_object()) {
                    echo "<thead style='background-color:#ffffff; color: #3399ff'>";
                    echo"<tr>";

                    echo"<td>$d->rating</td>";
                    echo"<td>$d->userid</td>";
                    echo"<td>$d->productid</td>";


                    echo"<td  style='text-align: center'><a href='index.php?e=review_update&id={$d->id}' class='btn btn-info'>Edit</a></td>";

                    echo"<td  style='text-align: center'><a href='index.php?e=review_delete&id={$d->id}' class='btn btn-info '>Delete</a></td>";


                    echo"<tr>";
                    echo "</thead>";
                }
                ?>


            </table>


        </div>
        <div class="col-sm-2"></div>
    </div>

</div>

<br/><br/>


