<!--UPDATE tablename SET name=dsadas, rate=dasdsa WHERE id=1-->
<?php
$data = new Database();
?>
<?php
if (isset($_POST['submit'])) {
    // id lomu
    //$id = $_GET['id'];
    // data array
    $currenyArr = [
        'address' => $_POST['address'],
        'deliveryid' => $_POST['delivery'],
        'usersid' => $_POST['customer']
    ];
    // database pathamu

    if ($data->update('shipping', $currenyArr, ['id' => $_GET['id']]))
        echo 'Edit Successs';
    else
        echo 'Moza loss';
    // update hoise
    // update hoy nai
}
?>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <a href="index.php?e=shipping-insert" class="btn btn-success">Insert Shipping</a>
            <a href="index.php?e=shipping-view"  class="btn btn-danger" >View Shipping</a>
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

                                    while ($row1 = $dataelivery->fetch_object()) {
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

                                    while ($user = $users->fetch_object()) {
                                        echo "<option value='{$user->id}'>{$user->name}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="buttons-holder">
                                <button name="submit" type="submit" class="le-button huge">Update</button>
                            </div><!-- /.buttons-holder -->

                    </form>


                </section>
            </div>
        </div>
    </div>
</main>