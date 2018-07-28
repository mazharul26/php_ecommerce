<?php
if (isset($_POST['yes']))
{
    if ($data->insert('product_featured', ['productid' => $_GET['id']]))
    {
        Redirect($rooturl . "index.php?e=product-view");
    }
}
else
{
    $product = $data->view('product', NULL, NULL, ['id' => $_GET['id']]);
}
?>

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <!-- View -->

            <div class="container">
                <h1 class="title-color">Featured Products</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <form method="POST" >
                            <?php
                            while ($row = $product->fetch_assoc())
                            {
                                ?>
                                <p>Do you want to make <?php echo $row['title'] ?> a Featured Product</p>
                                <?php
                            }
                            ?>
                            <input type="submit" name="no" value="no">
                            <input type="submit" name="yes" value="Yes">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>