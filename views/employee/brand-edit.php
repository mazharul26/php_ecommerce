<?php
//$catagories = $data->view("category");
//echo "<tr>";
//while ($catagory = $catagories->fetch_object())
//{
//    echo "<tr>";
//    echo "<td value='$catagory->id'>$catagories->category_name</td>";
//    echo "</tr>";
//}
?>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=brand-view"><button class="btn btn-sm">brand View</button></a>
                <a href="index.php?e=brand-insert"><button class="btn btn-sm">Insert brand</button></a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <?php
                    if (isset($_POST['submit']))
                    {
                        if ($data->update('brands', ['brand_name' => $_POST['brand']], ['id' => $_GET['id']]))
                        {
                            echo " <b>" . $_POST['brand'] . "</b> updated.";
                            Redirect('index.php?e=brand-view&highlight=' . $_GET['id']);
                        }
                        else
                        {
                            $data->Error;
                        }
                    }
                    ?>

                    <?php
                    $brands = $data->view("brand", '', '', ['id' => $_GET['id']]);
                    while ($row = $brands->fetch_object())
                    {
                        ?>

                        <h1>Edit: <?php echo $row->brand_name ?></h1>


                        <form action="" method="post" role="form" class="register-form cf-style-1">
                            <div class="field-row">
                                <div class="field-row">
                                    <label>brand Name</label>
                                    <input value="<?php echo $row->brand_name ?>" name="brand" type="text" class="le-input" placeholder="Type Category here .. ">
                                </div><!-- /.field-row -->

                                <div class="buttons-holder">
                                    <button name="submit" type="submit" class="le-button small">Edit brand</button>
                                </div><!-- /.buttons-holder -->
                        </form>

                        <?php
                    }
                    ?>
                </section>
            </div>
        </div>
    </div>
</main>

