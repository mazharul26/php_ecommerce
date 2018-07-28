<?php
$data = new Database();
?><!--INSERT into shipping SET name=cname, rate=crate-->
<?php
if (isset($_POST['submit']))
{
    // array ready kora
//    $currenyArr = [
//        'name' => $_POST['cname'],
//        'rate' => $_POST['crate']
//    ];
    //print_r($currenyArr);
    // send to database
    // delivery

    if ($data->insert('shipping', ['address' => $_POST['address'], 'deliveryid' => $_POST['delivery'], 'usersid' => $_POST['customer']]))
    {
        echo 'Insert Successs';
    }
    else
    {
        echo 'Moza loss';
    }
    // error error if any
}
?>

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=shipping-insert" class="btn btn-success">Insert Shipping</a>
             <a href="index.php?e=shipping-view"  class="btn btn-danger" >View Shipping</a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <h1> Insert Shipping</h1>

                    <form action="" method="post" role="form" class="register-form cf-style-1">
                        <div class="field-row">
                            <div class="field-row">
                                <label>Shipping Address</label>
                                <input name="address" type="text" class="le-input">
                            </div><!-- /.field-row -->
                            <div class="field-row">
                                <label>Delivery Rate</label>
                                <select class="form-control le-input" name="delivery">
                                    <option value="0">Select One .. </option>
                                    <?php
                                    $dataelivery = $data->view('delivery');

                                    while ($row1 = $dataelivery->fetch_object())
                                    {
                                        echo "<option value='{$row1->id}'>{$row1->charge}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="field-row">
                                <label>Customer</label>
                                <select class="form-control le-input" name="customer">
                                    <option value="0">Select One .. </option>
                                    <?php
                                    $users = $data->view('users');

                                    while ($user = $users->fetch_object())
                                    {
                                        echo "<option value='{$user->id}'>{$user->name}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="buttons-holder">
                                <button name="submit" type="submit" class="le-button huge">Add Shipping</button>
                            </div><!-- /.buttons-holder -->

                    </form>


                </section>
            </div>
        </div>
    </div>
</main>


