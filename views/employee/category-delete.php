<main id="authentication" class="inner-bottom-md">
    
   <?php
     $data = new Database();
   if (isset($_GET['id'])) {
    $arr = array(
        "id" => $_GET['id']
    );

    if ($result = $data->delete("category", $arr)) {
        echo 'Yes';
    } else {
        echo $data->Error;
    }
}
   ?>
    
    
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
              <a href="index.php?e=category-view"><button class="btn btn-success">View Categories</button></a>
                <a href="index.php?e=category-insert"><button class="btn btn-danger">Insert Categories</button></a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <h1>View Categories</h1>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $payMethods = $data->view("category", '', ['id', 'ASC']);
                            while ($row = $payMethods->fetch_object())
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row->category_name; ?></td>
                                    <td><a href="?e=category-edit&id=<?php echo $row->id; ?>"><button class="btn- btn-sm btn-info">Edit</button></a>
                                    <td><a href="?e=category-delete&id=<?php echo $row->id; ?>"><button class="btn- btn-sm btn-danger">Delete</button></a>

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

