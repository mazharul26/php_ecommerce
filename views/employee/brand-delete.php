<?php
if (isset($_POST['delete']))
{
    if ($data->delete('brands', ['id' => $_GET['id']]))
    {
       Redirect('index.php?e=brand-view');
    }
    else
    {
        $data->Error;
    }
}
?>

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=brand-view"><button class="btn btn-sm">brand View</button></a>
                <a href="index.php?e=brand-insert"><button class="btn btn-sm">Insert brand</button></a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">

                    <?php
                    $brands = $data->view("brands", '', '', ['id' => $_GET['id']]);
                    while ($row = $brands->fetch_object())
                    {
                        ?>
                        <h1>Delete : <?php echo $row->brand_name; ?></h1>



                        Are you Sure?

                        <form action="" method="post" role="form" class="register-form cf-style-1">
                            <div class="field-row">

                                <div class="buttons-holder">
                                    <button name="cancel" type="button" class="le-button small">Cancel</button>
                                    <button> <input name="delete" type="submit" value="Delete" class="le-button small"></button>

                                </div><!-- /.buttons-holder -->
                        </form>
                        <?php
                    }
                    ?>




                </section>
            </div>
        </div>
    </div>
</main>

