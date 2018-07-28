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
                <a href="index.php?e=size-view"><button class="btn btn-sm">size View</button></a>
                <a href="index.php?e=size-insert"><button class="btn btn-sm">Insert size</button></a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <?php
                    if (isset($_POST['submit']))
                    {
                        if ($data->update('size', ['size_name' => $_POST['size']], ['id' => $_GET['id']]))
                        {
                            echo " <b>" . $_POST['size'] . "</b> updated.";
                            Redirect('index.php?e=size-view&highlight=' . $_GET['id']);
                        }
                        else
                        {
                            $data->Error;
                        }
                    }
                    ?>

                    <?php
                    $sizes = $data->view("size", '', '', ['id' => $_GET['id']]);
                    while ($row = $sizes->fetch_object())
                    {
                        ?>

                        <h1>Edit: <?php echo $row->size_name ?></h1>


                        <form action="" method="post" role="form" class="register-form cf-style-1">
                            <div class="field-row">
                                <div class="field-row">
                                    <label>size Name</label>
                                    <input value="<?php echo $row->size_name ?>" name="size" type="text" class="le-input" placeholder="Type Category here .. ">
                                </div><!-- /.field-row -->

                                <div class="buttons-holder">
                                    <button name="submit" type="submit" class="le-button small">Edit size</button>
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

