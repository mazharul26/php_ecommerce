<?php
$data = new Database();
?>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=unit-view"><button class="btn btn-success">Unit View</button></a>
                <a href="index.php?e=unit-insert"><button class="btn btn-primary">Insert Unit</button></a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <?php
                    if (isset($_POST['submit']))
                    {
                        if ($data->update('unit', ['unit_name' => $_POST['unit']],array("id"=>$_GET['id'])))
                        {
                            echo " <b>" . $_POST['unit'] . "</b> Update as an Unit.";
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
                                <button name="submit" type="submit" class="le-button small">Update Unit</button>
                            </div><!-- /.buttons-holder -->
                    </form>
                </section>
            </div>
        </div>
    </div>
</main>

