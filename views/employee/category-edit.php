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
                <a href="index.php?e=category-view"><button class="btn btn-success">View Categories</button></a>
                <a href="index.php?e=category-insert"><button class="btn btn-danger">Insert Categories</button></a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <?php
                     $data = new Database();
                    if (isset($_POST['submit']))
                    {
                        if ($data->update('category', ['category_name' => $_POST['category']],array("id"=>$_GET['id'])))
                        {
                            echo "Update to Categories";
                        }
                        else
                        {
//                            $data->Error;
                        }
                    }
                    ?>
                    <?php
                    $sql=$data->view("category", "", "", array("id"=>$_GET['id']));
                    
                    while($catego=$sql->fetch_object()){
                    
                    
                    ?>
                    <h1> Insert Category</h1>
                    <form action="" method="post" role="form" class="register-form cf-style-1">
                        <div class="field-row">
                            <div class="field-row">
                                <label>Category Name</label>
                                <input name="category" type="text" class="le-input" placeholder="Type Category here .. " value="<?php echo $catego->category_name  ?>">
                            </div><!-- /.field-row -->

                            <div class="buttons-holder">
                                <button name="submit" type="submit" class="le-button small">Update Category</button>
                            </div><!-- /.buttons-holder -->
                            </div>
                    </form>
                    
                    <?php  } ?>
                </section>
            </div>
        </div>
    </div>
</main>

