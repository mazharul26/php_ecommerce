
<?php
   $data = new Database();
if (isset($_GET['id'])){
    $toly = array(
    "id" => $_GET['id']
      );
      if($toly1 =$data->delete("city", $toly)){
          echo "<p style='color:red'>Delete Successful</p>";
      } else {
          echo $toly1->Error;
      }
}


?>


<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <br><br>
                <a class="btn btn-success" href="index.php?e=city-insert">Insert City</a>
                <a class="btn btn-success" href="index.php?e=city-view">View City</a>

            </div>

            <div class="col-md-12">

                <section class="section register inner-left-xs">
                    <table class="table table-striped table-hover">

                        <tr>
                            <th>City Name</th>
                            <th>Country Name</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>

                        <?php
                        $data = new Database();
//                        $table = "city, country";
//                       
//                        $where = "";
//                        $select = "city.city_name ctname, country.country_name cname";
//                        $rel = array(
//                            
//                         "city.countryid" => "country.id"
//                        );
//                        $d ->view($table, $select, $rel);
                        $p = $data->view("city1_view");
                        while ($value = $p->fetch_object()) {
                            echo "<tr>";
                            echo "<td>$value->city_name</td>";
                            echo "<td>$value->country_name</td>";
                            echo "<td><a href='index.php?e=city-update&id={$value->id}'><input type='button' name='up' value='edit' class='btn btn-info'/></a></td>";
                            echo "<td><a href='index.php?e=city-view&id={$value->id}'><input type='button' name='up' value='delete' class='btn btn-danger'/></a></td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>


                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->