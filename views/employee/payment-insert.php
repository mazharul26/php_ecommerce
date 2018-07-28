<?php
//$catagories = $data->view("category");
//echo "<tr>";
//while ($catagory = $catagories->fetch_object())
//{
//    echo "<tr>";
//    echo "<td value='$catagory->id'>$catagories->category_name</td>";
//    echo "</tr>";
//}
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
                    if (isset($_POST['submit']))
                    {
                        if ($data->insert('payment', ['payment_name' => $_POST['payment']]))
                        {
                            echo " <b>" . $_POST['payment'] . "</b> Inserted as an payment.";
                        }
                        else
                        {
                            $data->Error;
                        }
                    }
                    ?>
                    <h1> Insert payment</h1>
                    <form action="" method="post" role="form" class="register-form cf-style-1">
                        <div class="field-row">
                            <div class="field-row">
                                <label>payment Name</label>
                                <input name="payment" type="text" class="le-input" placeholder="Type Category here .. ">
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

