<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=currency-view"><button class="btn btn-sm">currency View</button></a>
                <a href="index.php?e=currency-insert"><button class="btn btn-sm">Insert currency</button></a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <h1>View Currencies</h1>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Currencies</th>
                                <th>Rate</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $payMethods = $data->view("currency", '', ['id', 'ASC']);
                            while ($row = $payMethods->fetch_object())
                            {
                                ?>
                                <tr <?php
                                if (isset($_GET['highlight']) && $row->id == $_GET['highlight'])
                                    echo 'class="changed"';
                                ?> >
                                    <td><?php echo $row->currency_name; ?></td>
                                    <td><?php echo $row->rate; ?></td>
                                    <td><a href="?e=currency-edit&id=<?php echo $row->id; ?>"><button class="btn- btn-sm btn-info">Edit</button></a>
                                    <td><a href="?e=currency-delete&id=<?php echo $row->id; ?>"><button class="btn- btn-sm btn-danger">Delete</button></a>

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

