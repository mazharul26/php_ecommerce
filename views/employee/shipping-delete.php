<?php
$data = new Database();
?><!--UPDATE tablename SET name=dsadas, rate=dasdsa WHERE id=1-->

<?php
if (isset($_GET['id']))
{

    if ($data->delete('shipping', ['id' => $_GET['id']]))
        Redirect("index.php?e=shipping-view");
    else
        echo 'Moza loss';
    // update hoise
    // update hoy nai
}
?>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <h1> Delele Shipping</h1>

                    <form action="" method="post" role="form" class="register-form cf-style-1">
                        <div class="field-row">
                            Are you sure?
                            <div class="buttons-holder">
                                <button name="submit" type="submit" class="le-button huge">Add Shipping</button>
                            </div><!-- /.buttons-holder -->

                    </form>


                </section>
            </div>
        </div>
    </div>
</main>


