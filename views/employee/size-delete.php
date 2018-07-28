<?php
if (isset($_POST['delete']))
{
    if ($data->delete('size', ['id' => $_GET['id']]))
    {
       Redirect('index.php?e=size-view');
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
                <a href="index.php?e=size-view"><button class="btn btn-sm">size View</button></a>
                <a href="index.php?e=size-insert"><button class="btn btn-sm">Insert size</button></a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">

                    <?php
                    $sizes = $data->view("size", '', '', ['id' => $_GET['id']]);
                    while ($row = $sizes->fetch_object())
                    {
                        ?>
                        <h1>Delete : <?php echo $row->size_name; ?></h1>



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

