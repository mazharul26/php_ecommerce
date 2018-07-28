<?php
if (isset($_POST['submit']))
{
    if ($_POST['commisionpay'] < 100)
    {
        // dimuna
    }
    else
    {
        // taka dimu
        $requestedAmount = $_POST['commisionpay'];
        $payAff = $data->insert('affilaite_payout', ['affiliate_user_id' => $_SESSION['user']['id'], 'pay_amount' => $requestedAmount]);
        if ($payAff)
        {

        }
        else
        {

        }
    }
    Redirect($rooturl . 'index.php?a=referrals');
}
?>

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <h1>Referrals</h1>
                </section>
                <section class="section register inner-left-xs">

                    <table class="table table-responsive table-bordered">

                        <tr>
                            <th>
                                Date of Sale
                            </th>
                            <th>
                                Product
                            </th>
                            <th>
                                Price and Quantity
                            </th>
                            <th>
                                My commission (5%)
                            </th>
                        </tr>
                        <?php
                        $payableCommission = 0;
                        $affliateRefs = $data->view('affiliates_sales_ref_view', NULL, NULL, ['affiliates_user_id' => $_SESSION['user']['id']]);
                        $lastpayDate = $data->procedure('affiliate_last_pay_date', $_SESSION['user']['id']);
                        while ($value = $lastpayDate->fetch_object())
                        {
                            $myLastPayDate = $value->pay_date;
                        }
                        while ($row = $affliateRefs->fetch_object())
                        {
                            ?>

                            <?php
                            if ($row->sale_date >= $myLastPayDate)
                            {
                                /*
                                 * payment baki
                                 */
                                ?>

                                <tr>
                                    <td>
                                        <?php echo $row->sale_date; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->productTitle; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->price, ' x ', $row->quantity, ' = ', ($row->price * $row->quantity); ?>
                                    </td>
                                    <td>
                                        <?php
                                        $payableCommission += ($row->price * 0.05) * $row->quantity;
                                        echo (($row->price * 0.05) * $row->quantity);
                                        ?>
                                    </td>
                                </tr>

                                <?php
                            }
                            else
                            {
                                /*
                                 * payment hoisagese
                                 */
                                ?>

                                <tr class="bg-warning">
                                    <td>
                                        <?php echo $row->sale_date; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->productTitle; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->price, ' x ', $row->quantity, ' = ', ($row->price * $row->quantity); ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo (($row->price * 0.05) * $row->quantity), ' (paid)';
                                        ?>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        ?>
                        <tr class="info">
                            <td colspan="3" class="text-right">
                                total:
                            </td>
                            <td class="">
                                <?php
                                echo ($payableCommission > 0 ? $payableCommission : '');
                                ?>
                            </td>
                        </tr>
                        <?php
                        if ($payableCommission > 99)
                        {
                            ?>
                            <tr class="success">
                                <td colspan="4" class="text-right">
                                    <form action="" method="post">
                                        <input type="hidden" value="<?php echo $payableCommission; ?>" name="commisionpay">
                                        <input class="btn btn-lg btn-success" type="submit" value="Request Payout" name="submit">
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        else
                        {
                            ?>
                            <tr class="danger">
                                <td colspan="4" class="text-right">
                                    Pending Balance <?php echo $payableCommission; ?> must be greated than 100
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                    </table>
                </section>
            </div>
        </div>
    </div>
</main>
