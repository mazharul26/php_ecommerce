<?php

?>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=unit-view"><button class="btn btn-sm">Unit View</button></a>
                <a href="index.php?e=unit-insert"><button class="btn btn-sm">Insert Unit</button></a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <?php
                    if (isset($_POST['submit']))
                    {
                        if ($data->insert('unit', ['unit_name' => $_POST['unit']]))
                        {
                            echo " <b>" . $_POST['unit'] . "</b> Inserted as an Unit.";
                        }
                        else
                        {
                            $data->Error;
                        }
                    }
                    ?>
                    <h1> Insert Unit</h1>
                    <form action="" method="post" role="form" class="register-form cf-style-1">
                        <div class="field-row">
                            <div class="field-row">
                                <label>Unit Name</label>
                                <input name="unit" type="text" class="le-input" placeholder="Type Category here .. ">
                            </div><!-- /.field-row -->

                            <div class="buttons-holder">
                                <button name="submit" type="submit" class="le-button small">Add Category</button>
                            </div><!-- /.buttons-holder -->
                    </form>
                </section>
            </div>
        </div>
    </div>
</main>

