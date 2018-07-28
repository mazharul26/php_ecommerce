<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=subcategory-view"><button class="btn btn-success">View Subcategories</button></a>
                <a href="index.php?e=subcategory-insert"><button class="btn btn-primary">Insert Subcategories</button></a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <h1>View Categories</h1>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sub Category</th>
                                <th>Parent Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $subcategories = $data->view("subcategory", '', ['id', 'ASC']);
                            while ($subcategory = $subcategories->fetch_object())
                            {
                                ?>
                                <tr>
                                    <td><?php echo $subcategory->subcategory_name; ?></td>
                                    <td><?php echo $subcategory->categoryid; ?></td>
                                    <td><a href="index.php?e=subcategory-edit&id=<?php echo $subcategory->id; ?>"><button class="btn- btn-sm btn-info">Edit</button></a>
                                    <td><a href="index.php?e=subcategory-delete&id=<?php echo $subcategory->id; ?>"><button class="btn- btn-sm btn-danger">Delete</button></a>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>


                </section>
            </div>
        </div>
    </div>
</main>

