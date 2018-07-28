<nav class="top-bar animate-dropdown">
    <div class="container">
        <div class="col-xs-12 col-sm-6 no-margin">
            <ul>
                <?php
                if (isset($_SESSION['user']['type']))
                {
                    $type = $_SESSION['user']['type'];
                    if ($type == 1)
                    {
                        /*
                         * CUSTOMER
                         */
                        ?>
                        <li>Welcome, Customer</li>
                        <li class="dropdown">
                            <a class="dropdown-toggle"  data-toggle="dropdown" href="#change-colors"><span class="fa fa-gear"></span> Settings</a>
                            <ul class="dropdown-menu" role="menu" >
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?c=my-orders">My Orders</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                    }
                    elseif ($type == 2)
                    {
                        ?>
                        <li>Welcome, Affiliate</li>
                        <li class="dropdown">
                            <a class="dropdown-toggle"  data-toggle="dropdown" href="#change-colors"><span class="fa fa-gear"></span> Settings</a>
                            <ul class="dropdown-menu" role="menu" >
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?a=dashboard">Dashboard</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?a=referrals">referrals</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?a=commission">Commissions</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?a=payout">Request Payout</a>
                                </li>
                            </ul>
                        </li>

                        <?php
                    }
                    elseif ($type == 3)
                    {
                        /*
                         * SELLER
                         */
                        ?>
                        <li>Welcome, Seller</li>
                        <li class="dropdown">
                            <a class="dropdown-toggle"  data-toggle="dropdown" href="#change-colors"><span class="fa fa-gear"></span> Settings</a>
                            <ul class="dropdown-menu" role="menu" >
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?s=my-products">My Products</a>
                                </li>

                                <li role="presentation">
                                    <a role="menuitem" href="index.php?s=my-sales">My Products</a>
                                </li>

                            </ul>
                        </li>


                        <?php
                    }
                    elseif ($type == 5)
                    {
                        /*
                         * ADMIN ONLY
                         */
                        ?>
                        <li>
                            <?php
                            // work for picture
                            ?>
                            <img src="//" style="
                                 width: 20px;
                                 height: 20px;
                                 margin-right: 7px;
                                 "/><b>Welcome, Admin</b>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle"  data-toggle="dropdown" href="#change-colors">System Settings</a>
                            <ul class="dropdown-menu" role="menu" >
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?e=product-view" >Products</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?e=category-view" >Category</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?e=subcategory-view" >Subcategorey</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?e=brand-view" >Brands</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?e=delivery-insert" >Delivery</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?e=country-insert" >Country</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?e=city-insert" >City</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?e=payment-view" >Payment</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?e=review_insert" >Review</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?e=unit-view" >Unit</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?e=currency-view" >Currency</a>
                                </li>

                                <li role="presentation">
                                    <a role="menuitem" href="index.php?e=size" >Color</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php?e=salesdetails" >Sales Details</a>
                                </li>
                            </ul>

                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle"  data-toggle="dropdown" href="#change-colors">Theme and Layout</a>
                            <ul class="dropdown-menu" role="menu" >
                                <li role="presentation">
                                    <a role="menuitem" href="index.php">Home Top Slider</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php">Home Banner 1</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php">Home Banner 2</a>
                                </li>
                                <li role="presentation">
                                    <a role="menuitem" href="index.php">Social Media Icons</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle"  data-toggle="dropdown" href="#change-colors">Seller Management</a>
                            <ul class="dropdown-menu" role="menu" >
                                <li role="presentation">
                                    <a role="menuitem" href="index.php">Sellers</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle"  data-toggle="dropdown" href="#change-colors">Buyer Management</a>
                            <ul class="dropdown-menu" role="menu" >
                                <li role="presentation">
                                    <a role="menuitem" href="index.php">Buyer</a>
                                </li>
                            </ul>
                        </li>


                        <?php
                    }
                    ?>


                    <?php
                }
                else
                {
                    ?>

                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle"  data-toggle="dropdown" href="#change-colors">Change Colors</a>

                        <ul class="dropdown-menu" role="menu" >
                            <li role="presentation"><a role="menuitem" class="changecolor green-text" tabindex="-1" href="#" title="Green color">Green</a></li>
                            <li role="presentation"><a role="menuitem" class="changecolor blue-text" tabindex="-1" href="#" title="Blue color">Blue</a></li>
                            <li role="presentation"><a role="menuitem" class="changecolor red-text" tabindex="-1" href="#" title="Red color">Red</a></li>
                            <li role="presentation"><a role="menuitem" class="changecolor orange-text" tabindex="-1" href="#" title="Orange color">Orange</a></li>
                            <li role="presentation"><a role="menuitem" class="changecolor navy-text" tabindex="-1" href="#" title="Navy color">Navy</a></li>
                            <li role="presentation"><a role="menuitem" class="changecolor dark-green-text" tabindex="-1" href="#" title="Darkgreen color">Dark Green</a></li>
                        </ul>
                    </li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#pages">Pages</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="?f=category">Category</a></li>
                            <li><a href="?f=single">Single Product</a></li>
                            <li><a href="?f=cart">Shopping Cart</a></li>
                            <li><a href="?f=checkout">Checkout</a></li>
                            <li><a href="?f=about">About Us</a></li>
                            <li><a href="?f=contact">Contact Us</a></li>
                            <li><a href="?f=faq">FAQ</a></li>
                            <li><a href="?f=terms">Terms & Conditions</a></li>
                            <li><a href="?f=login">Login</a></li>
                            <li><a href="?f=signup">Sign up</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div><!-- /.col -->

        <div class="col-xs-12 col-sm-6 no-margin">
            <ul class="right">
                <li class="dropdown">
                    <a class="dropdown-toggle"  data-toggle="dropdown" href="#change-language">English</a>
                    <ul class="dropdown-menu" role="menu" >
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Turkish</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Tamil</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">French</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Russian</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle"  data-toggle="dropdown" href="#change-currency">Dollar (US)</a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Euro (EU)</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Turkish Lira (TL)</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Indian Rupee (INR)</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Dollar (US)</a></li>
                    </ul>
                </li>
                <?php
                if (isset($_SESSION['user']['id']))
                {
                    ?>
                    <li><a href="?f=profile">Profile</a></li>
                    <li><a href="?f=logout">Logout</a></li>
                    <?php
                }
                else
                {
                    ?>
                    <li><a href="?f=signup">Register</a></li>
                    <li><a href="?f=login">Login</a></li>

                    <?php
                }
                ?>
            </ul>
        </div><!-- /.col -->
    </div><!-- /.container -->
</nav><!-- /.top-bar -->
<!-- ============================================================= TOP NAVIGATION : END ============================================================= -->