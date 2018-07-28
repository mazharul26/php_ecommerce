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


                        $insertArr = [
                            'brand_name' => $_POST['brand'],
                            'brand_pic' => extension($_FILES['brandimg']['name'])
                        ];


                        if ($data->insert('brands', $insertArr))
                        {
                            echo " <b>" . $_POST['brand'] . "</b> Inserted as an brand.";

                            $folder = 'images/brands/';

                            if (!is_dir($folder))
                                mkdir($folder, 0755, true);

                            if (extension($_FILES['brandimg']['name']))
                            {
                                $filename = $_FILES['brandimg']['tmp_name'];
                                $destination = $folder . fileNameSecure($data->Id) . "." . $insertArr['brand_pic'];
                                move_uploaded_file($filename, $destination);
                            }
                        }
                        else
                        {
                            $data->Error;
                        }
                    }
                    ?>
                    <h1> Insert brand</h1>
                    <form action="" method="post" role="form" class="register-form cf-style-1" enctype="multipart/form-data"  >
                        <div class="field-row">
                            <div class="field-row">
                                <label>brand Name</label>
                                <input name="brand" type="text" class="le-input" placeholder="Type Category here .. ">
                            </div><!-- /.field-row -->

                            <div class="field-row">
                                <label>Brand Logo</label>
                                <input class="form-control" type="file" name="brandimg">
                            </div>
                            <div class="buttons-holder">
                                <button name="submit" type="submit" class="le-button small">Add Category</button>
                            </div><!-- /.buttons-holder -->
                    </form>
                </section>
            </div>
        </div>
    </div>
</main>

