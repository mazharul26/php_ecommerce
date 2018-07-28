<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=subcategory-view"><button class="btn btn-success">View Subcategories</button></a>
                <a href="index.php?e=subcategory-insert"><button class="btn btn-primary">Insert Subcategories</button></a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <?php
                    $data = new Database();
                    if (isset($_POST['submit']))
                    {
                        if ($data->insert('subcategory', ['subcategory_name' => $_POST['subcategory'], 'categoryid' => $_POST['category']]))
                        {
                            echo " <b>" . $_POST['subcategory'] . "</b> Inserted to Subcategories.";
                        }
                        else
                        {
                            $data->Error;
                        }
                    }
                    ?>
                    <h1> Insert Sub Category</h1>
                    <form action="" method="post" role="form" class="register-form cf-style-1">
                        <div class="field-row">
                            <div class="field-row">
                                <label>Subcategory Name</label>
                                <input name="subcategory" type="text" class="le-input" placeholder="Type Category here .. ">


                                <label>Select Category</label>
                                <select class="form-control le-input" name="category">
                                    <option value="0">Select a category</option>
                                    <?php
                                    $categories = $data->view('category');

                                    while ($category = $categories->fetch_object())
                                    {
                                        echo "<option value='{$category->id}'>{$category->category_name}</option>";
                                    }
                                    ?>
                                </select>
                            </div><!-- /.field-row -->

                            <div class="buttons-holder">
                                <button name="submit" type="submit" class="le-button small">Add Sub Category</button>
                            </div><!-- /.buttons-holder -->
                    </form>
                </section>
            </div>
        </div>
    </div>
</main>

