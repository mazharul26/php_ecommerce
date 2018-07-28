<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=brand-view"><button class="btn btn-sm">brand View</button></a>
                <a href="index.php?e=brand-insert"><button class="btn btn-sm">Insert brand</button></a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <h1>View Brands</h1>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Brands</th>
                                <th>Logo</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $brands = $data->view("brands", '', ['id', 'ASC']);
                            while ($row = $brands->fetch_object())
                            {
                                ?>
                                <tr <?php
                                if (isset($_GET['highlight']) && $row->id == $_GET['highlight'])
                                    echo 'class="changed"';
                                ?> >
                                    <td><?php echo $row->brand_name; ?></td>
                                    <td><img src="<?php echo 'images/brands/' . fileNameSecure($row->id) . "." . $row->brand_pic; ?>" /></td>
                                    <td><a href="?e=brand-edit&id=<?php echo $row->id; ?>"><button class="btn- btn-sm btn-info">Edit</button></a>
                                    <td><a href="?e=brand-delete&id=<?php echo $row->id; ?>"><button class="btn- btn-sm btn-danger">Delete</button></a>

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

