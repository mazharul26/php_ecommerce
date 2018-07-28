<?php
if (isset($_SESSION['cart']))
{
    $cartNumber = count($_SESSION['cart']);


    if ($cartNumber == 0)
    {
        ?>
        <div class="basket">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <div class="basket-item-count">
                    <span class="count count-cart">0</span>
                    <img src="assets/images/icon-cart.png" alt="" />
                </div>

                <div class="total-price-basket">
                    <span class="lbl"></span>
                    <span class="total-price">
                        <span class="sign"></span><span class="value"></span>
                    </span>
                </div>
            </a>
            <ul id="cart-dropdown" class="dropdown-menu">

                <li class="checkout">
                    <div class="basket-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <a href="#" class="text-center text-info h4">Your Cart is Empty</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <?php
    }
    else
    {

        $wherein = '';
        foreach ($_SESSION['cart'] as $key => $value)
        {
            if ($wherein != "")
                $wherein .= " , ";
            $wherein .= " $key ";
        }
        $cartItems = $data->viewIN(
                'product', '
                    product.id,
                    product.title,
                    product.price,
                    product.featuredImage
                ', ['product.id' => $wherein]);
        ?>
        <div class="basket">

            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <div class="basket-item-count">
                    <span class="count count-cart"><?php echo $cartNumber; ?></span>
                    <img src="assets/images/icon-cart.png" alt="" />
                </div>

                <div class="total-price-basket">
                    <span class="lbl">your cart:</span>
                    <span class="total-price">
                        <span class="sign">$</span><span class="value">3219,00</span>
                    </span>
                </div>
            </a>

            <ul id="cart-dropdown" class="dropdown-menu">


                <?php
                while ($row = $cartItems->fetch_assoc())
                {
                    ?>
                    <li class="p_<?php echo $row['id']; ?>">
                        <div class="basket-item">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 no-margin text-center">
                                    <div class="thumb">
                                        <img alt="" src="images/products/<?php echo fileNameSecure($row['id']) . '/1.' . $row['featuredImage']; ?>" />
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-8 no-margin">
                                    <div class="title"><?php echo $row['title']; ?></div>
                                    <div class="price"><span class='color-green'> <?php echo $_SESSION['cart'][$row['id']] ?> x </span><?php echo $row['price']; ?></div>
                                </div>
                            </div>
                            <a class="close-btn"  href="#">
                                <input type="hidden" value="<?php echo $row['id']; ?>">
                            </a>
                        </div>
                    </li>
                    <?php
                }
                ?>

                <li class="checkout">
                    <div class="basket-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <a href="index.php?f=checkout" class="le-button inverse">View cart</a>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <a href="index.php?f=checkout" class="le-button">Checkout</a>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div><!-- /.basket -->
        <?php
    }
}
else
{
    ?>
    <div class="basket">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <div class="basket-item-count">
                <span class="count count-cart">0</span>
                <img src="assets/images/icon-cart.png" alt="" />
            </div>

            <div class="total-price-basket">
                <span class="lbl"></span>
                <span class="total-price">
                    <span class="sign"></span><span class="value"></span>
                </span>
            </div>
        </a>
        <ul id="cart-dropdown" class="dropdown-menu">

            <li class="checkout">
                <div class="basket-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <a href="#" class="text-center text-info h4">Your Cart is Empty</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
<?php } ?>
