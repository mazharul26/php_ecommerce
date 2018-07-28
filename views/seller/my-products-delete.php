<?php
if (isset($_POST['delete']))
{
    if ($data->delete('product', ['id' => $_GET['id']]))
    {
        Redirect('index.php?s=my-products');
    }
    else
    {
        $data->Error;
    }
}
elseif (isset($_POST['cancel']) || isset($_POST['no']))
{
    Redirect('index.php?s=my-products');
}
?>

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-xs-12">
                <section class="section register inner-left-xs">

                    <?php
                    $del = $data->view("product", '', '', ['id' => $_GET['ids']]);
                    while ($row = $del->fetch_object())
                    {
                        ?>
                        <h1>Delete : <?php echo $row->title; ?></h1>
                        Are you Sure?

                        <form action="" method="post" role="form" class="register-form cf-style-1">
                            <div class="field-row">

                                <div class="buttons-holder">
                                    <button name="cancel" type="button" class="le-button small">Cancel</button>
                                    <button> <input name="no" type="submit" value="no" class="le-button small"></button>
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








