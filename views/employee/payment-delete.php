<?php
if (isset($_POST['delete']))
{
    if ($data->delete('payment', ['id' => $_GET['id']]))
    {
       Redirect('index.php?e=payment-view');
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
                <a href="index.php?e=payment-view"><button class="btn btn-sm">payment View</button></a>
                <a href="index.php?e=payment-insert"><button class="btn btn-sm">Insert payment</button></a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">

                    <?php
                    $payments = $data->view("payment", '', '', ['id' => $_GET['id']]);
                    while ($row = $payments->fetch_object())
                    {
                        ?>
                        <h1>Delete : <?php echo $row->payment_name; ?></h1>



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

