<style>
    .choose-address{
        cursor: pointer;
        border: 1px solid #cacaca;
        padding: 5px;
        margin: 5px 0;
        transition: 400ms;
    }
    .choose-address:hover{
        background-color: #aaa;
        transition: 50ms;
    }
    .address-active, .address-active:hover{
        color:#FFF;
        background-color: #22aadf;
        transition: 400ms;
    }
</style>

<?php
if (isset($_SESSION['cart']))
{
    ?>
    <section id="checkout-page">

        <div class="container">
            <div class="col-xs-12">
                <div class="progress">
                    <div class="progress-bar progress-bar-info progress-bar-striped our-progress" role="progressbar"
                         aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100" style="width:33.3%">
                        Step <span class="pstep"> 1</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <?php
                if (isset($_SESSION['cart']))
                {
                    $cartNumber = count($_SESSION['cart']);

                    $wherein = '';
                    foreach ($_SESSION['cart'] as $key => $value)
                    {
                        if ($wherein != "")
                            $wherein .= " , ";
                        $wherein .= " $key ";
                    }
                    $cartItems = $data->viewIN('product', 'product.id,
    product.title,
    product.price,
    product.featuredImage', ['product.id' => $wherein]);
                    ?>
                    <section id="your-order">
                        <h2 class="border h1">your order</h2>

                        <table class="table table-responsive" style="
                               font-size: 135%;
                               ">
                            <tr>
                                <th>Product</th>
                                <th width="200" class="text-center">Quantity</th>
                                <th width="200" class="text-center">Price</th>
                                <th width="200" class="text-center">Total</th>
                            </tr>
                            <?php
                            $totalpay = 0;
                            $grandTotal = 0;
                            while ($row = $cartItems->fetch_assoc())
                            {
                                ?>
                                <tr>
                                    <td><p><?php echo $row['title']; ?> </p></td>
                                    <td class="text-center"><p class="qt<?php echo $row['id']; ?>">
                                            <span class="minus btn btn-xs btn-default">-</span>
                                            <?php echo '<span class="quantity" data-id="', $row['id'], '">', $_SESSION['cart'][$row['id']], '</span>'; ?>
                                            <span class="plus btn btn-xs btn-default">+</span>
                                        </p>
                                    </td>
                                    <td class="text-right"><p class="price-<?php echo $row['id']; ?>">
                                            <?php echo $row['price']; ?> </p></td>
                                    <td class="text-right"><p class="totals total-<?php echo $row['id']; ?>">
                                            <?php
                                            $total = $_SESSION['cart'][$row['id']] * $row['price'];
                                            echo ($total);
                                            $grandTotal = $grandTotal + $total;
                                            ?> </p></td>

                                </tr>
                                <?php
                            }
                            $totalpay += $grandTotal;
                            ?>
                            <tr class="info">
                                <td colspan="3"  class="text-right bold uppercase">total</td>
                                <td class="text-right bold">
                                    <p class="grandtotal">
                                        <?php echo $grandTotal; ?>
                                    </p>
                                </td>
                            </tr>


                            <?php
                            if (isset($_SESSION['discount']))
                            {
                                ?>
                                <tr class="default">
                                    <td colspan="3"  class="text-right bold uppercase">Apply Coupon</td>
                                    <td class="text-right bold">
                                        <input <?php echo 'value="', $_SESSION['discount']['coupon'], '"' ?> class="coupon" placeholder="Have a coupon?" type="text">
                                        <br>
                                        <input style="display:none" value="apply coupon" class="couponsubmit" type="button">
                                        <p class="coupon-mes">
                                            Congrats!! You received <span class="discountamount"><?php echo $_SESSION['discount']['discount_amount'] ?></span> Taka Discount
                                        </p>
                                    </td>
                                </tr>

                                <tr class="success">
                                    <td colspan="3"  class="text-right bold uppercase">Coupon Discount</td>
                                    <td class="text-right bold">
                                        <p class="totalwithcoupon">
                                            <?php
                                            if (isset($_SESSION['discount']))
                                            {
                                                $totalpay = $grandTotal - $_SESSION['discount']['discount_amount'];
                                                echo($grandTotal - $_SESSION['discount']['discount_amount']);
                                            }
                                            else
                                            {
                                                echo 'Apply coupon';
                                            }
                                            ?>
                                        </p>
                                    </td>
                                </tr>
                                <?php
                            }
                            else
                            {
                                ?>
                                <tr class="default">
                                    <td colspan="3"  class="text-right bold uppercase">Apply Coupon</td>
                                    <td class="text-right bold">
                                        <input value="" class="coupon" placeholder="Have a coupon?" type="text">
                                        <br>
                                        <input style="display:none" value="apply coupon" class="couponsubmit" type="button">
                                        <p class="coupon-mes" style="display:none"/>
                                    </td>
                                </tr>

                                <tr class="success">
                                    <td colspan="3"  class="text-right bold uppercase">Coupon Discount</td>
                                    <td class="text-right bold">
                                        <p class="totalwithcoupon">
                                            <?php
                                            echo 'Apply coupon';
                                            ?>
                                        </p>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                            <?php
                            if (isset($_SESSION['user']))
                            {

                                $existingAddress = $data->view('cusomter_shipping_address_view', NULL, NULL, array('customerid' => $_SESSION['user']['id']));
                                ?>
                                <tr class="default">
                                    <td colspan="4"  class="text-left bold">

                                        <div class="row">

                                            <div class="col-xs-5">
                                                Select Shipping<br>
                                                <div class="btn-group">
                                                    <?php
                                                    if ($existingAddress->num_rows > 0)
                                                    {
                                                        ?>
                                                        <button type="button" class="btn btn-warning address existing-address">Existing Address</button>

                                                        <button type="button" class="btn btn-default address new-address">New Address</button>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <button type="button" class="btn btn-default address new-address">New Address</button>
                                                        <?php
                                                    }
                                                    ?>


                                                </div>
                                            </div>
                                            <div class="col-xs-7 existing-address-form">
                                                Existing Address<br>

                                                <?php
                                                while ($existing = $existingAddress->fetch_object())
                                                {
                                                    ?>
                                                    <div class='choose-address <?php
                                                    if ($existing->id == $_SESSION['shipping']['id'])
                                                    {
                                                        $totalpay += $existing->delivery_charge;
                                                        echo 'address-active';
                                                    }
                                                    ?> ' <?php echo 'data-address-id="', $existing->id, '"', 'data-address-charge="', $existing->delivery_charge, '"'; ?>>


                                                        <?php
                                                        echo $existing->name, '<br>', $existing->city_name, '<br>', $existing->contact, '<br>Delivery charge is ', $existing->delivery_charge;
                                                        ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-xs-7 new-address-form " style="display:none">
                                                New Address<br>
                                                <form class="ship-form" method="post" onclick="return false">
                                                    <input name="ship_name" class="form-control" placeholder="Name"><br>
                                                    <input name="ship_addresss" class="form-control ship_addresss" placeholder="Adddress"><br>
                                                    <input name="ship_contact" class="form-control" placeholder="Contact Number"><br>
                                                    <select class="form-control" name="ship_country">
                                                        <option value="0">Select a Country</option>
                                                        <?php
                                                        $countries = $data->view('country', '', array('country_name', 'ASC'), '');

                                                        while ($country = $countries->fetch_object())
                                                        {
                                                            echo "<option value='{$country->id}'>{$country->country_name}</option>";
                                                        }
                                                        ?>
                                                    </select><br>
                                                    <select name="ship_city" class="ship_city form-control">
                                                        <option value="0">Select a Country First</option>

                                                    </select><br>
                                                    <input  name="newadd" type="submit" class="btn btn-success newadd" value="Set Shipping Address">
                                                </form>
                                            </div>


                                            <div class="col-xs-7 address-to-ship" style="display:none">
                                                Shipping to<br>
                                            </div>
                                            <input type="hidden" class="shipping-id" data-ship-charge="" value="0">
                                        </div>
                                    </td>
                                </tr>


                            <?php } ?>
                            <tr class="info">
                                <td colspan="3" class="text-right">Total Ammount to Pay</td>
                                <td class="text-right">
                                    <p class="totalpay">
                                        <?php
                                        if ($totalpay > 0)
                                            echo $totalpay;
                                        else
                                            echo ' - - - '
                                            ?>
                                    </p>
                                </td>

                            </tr>
                            <!--
        Payment Options
                            -->
                            <?php
                            if (isset($_SESSION['user']))
                            {
                                ?>
                                <tr class="">

                                    <td>Select Payment Method</td>
                                    <td  colspan="3">
                                        <?php
                                        $paymentMethods = $data->view('payment');
                                        while ($paymentMethod = $paymentMethods->fetch_assoc())
                                        {
                                            $payArr[] = $paymentMethod;
                                        }
                                        $payArrCount = count($payArr);
                                        ?>
                                        <form action="http://localhost/mediacenter/index.php?f=checkout-success" method="post">
                                            <select class="form-control paymentmethodid" name="paymentmethod">
                                                <option value="0">Choose a Payment Method</option>
                                                <?php
                                                for ($index = 0; $index < $payArrCount; $index++)
                                                {
                                                    ?>

                                                    <option <?php echo 'value="', $payArr[$index]['id'], '"'; ?>><?php echo $payArr[$index]['payment_name'] ?></option>
                                                    <?php
                                                }
                                                arrecho($payArr);
                                                ?>
                                            </select>
                                            <br><br>
                                            <label>Insert Transaction id</label>
                                            <input type="text" class="paytranid form-control" value="" placeholder="Put Transaction ID">
                                            <br><br>
                                            <input type="submit" class="btn btn-lg btn-success checkmeout" value="Checkout Now">
                                        </form>
                                    </td>

                                </tr>


                            <?php } ?>
                        </table>

                        <a href="index.php"><button class="btn btn-lg btn-success pull-info">Continue Shoping</button></a>
                        <?php
                        if (isset($_SESSION['user']))
                        {
                            
                        }
                        else
                        {
                            ?>
                            <a href="index.php?f=login"><button class="btn btn-lg btn-info pull-right">Login and Checkout Out</button></a>
                            <?php
                        }
                        ?>



                    </section><!-- /#your-order -->



                    <?php
                }
                else
                {
                    
                }
                ?>
            </div><!-- /.col -->
        </div><!-- /.container -->
    </section><!-- /#checkout-page -->
    <!-- ========================================= CONTENT : END ========================================= -->
    <br /><br /><br /><br /><br />


    <!-- City & Country -->
    <script>
        $(function () {

            // country and city start

            $("select[name='ship_city']").prop('disabled', true);
            $("select[name=ship_country]").change(function () {
                country = parseInt($(this).val());
                if (country === 0) {
                    $("select[name=ship_city]").prop('disabled', true);
                    $("select[name=ship_city]").children().remove();
                    $(this).addClass('error');
                    $("select[name=ship_country], select[name=ship_city]").addClass('error');
                    $("select[name=ship_city]").append("<option value='0' selected>Select a Country First</option>");
    <?php
    $countries2 = $data->view('country', '', array('country_name', 'ASC'), '');
//print_r($countries2->fetch_object());
    while ($country2 = $countries2->fetch_object())
    {
        echo "} else if (country == {$country2->id}) { \n";
        echo " $(\"select[name=ship_country], select[name=ship_city]\").removeClass('error'); \n";
        echo " $(\"select[name=ship_city]\").children().remove(); \n ";
        echo " $(\"select[name=ship_city]\").prop('disabled', false); \n";
        echo " $(\"select[name=ship_city]\").append(\"<option value='0'>Select City</option>\"); \n ";

        $cities2 = $data->view('city', '', ['city_name', 'ASC'], ['countryid' => $country2->id]);
        while ($city2 = $cities2->fetch_object())
        {
            echo " $(\"select[name=ship_city]\").append(\"<option value='{$city2->id}'>{$city2->city_name}</option>\"); \n";
        }
    }
    ?>

                }
                ;
            });
            // country and city End

        });</script>
    <!-- City & Country -->
    <script src="<?php echo $rooturl; ?>assets/js/checkout.js" type="text/javascript"></script>

    <?php
}
else
{
    ?>
    <h1>Your Cart is Empty</h1>
    <?php
}
?>