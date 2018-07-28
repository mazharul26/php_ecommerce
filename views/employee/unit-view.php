<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=unit-view"><button class="btn btn-success">Unit View</button></a>
                <a href="index.php?e=unit-insert"><button class="btn btn-info">Insert Unit</button></a>
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
                            $data = new Database();
                            $payMethods = $data->view("unit", '', ['id', 'ASC']);
                            while ($row = $payMethods->fetch_object())
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row->unit_name; ?></td>
                                    <td><a href="index.php?e=unit-edit&id=<?php echo $row->id; ?>"><button class="btn- btn-sm btn-info">Edit</button></a>
                                    <td><a href="index.php?e=unit-delete&id=<?php echo $row->id; ?>"><button class="btn- btn-sm btn-danger">Delete</button></a>

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

