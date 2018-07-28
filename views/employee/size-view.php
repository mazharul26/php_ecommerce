<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=size-view"><button class="btn btn-sm">size View</button></a>
                <a href="index.php?e=size-insert"><button class="btn btn-sm">Insert size</button></a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <h1>View Sizes</h1>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sizes</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sizes = $data->view("size", '', ['id', 'ASC']);
                            while ($row = $sizes->fetch_object())
                            {
                                ?>
                                <tr <?php
                                if (isset($_GET['highlight']) && $row->id == $_GET['highlight'])
                                    echo 'class="changed"';
                                ?> >
                                    <td><?php echo $row->size_name; ?></td>
                                    <td><a href="?e=size-edit&id=<?php echo $row->id; ?>"><button class="btn- btn-sm btn-info">Edit</button></a>
                                    <td><a href="?e=size-delete&id=<?php echo $row->id; ?>"><button class="btn- btn-sm btn-danger">Delete</button></a>

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

