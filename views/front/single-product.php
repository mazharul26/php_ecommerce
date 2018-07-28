<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $singleProduct = $data->view("single_product", "*", "", ['id' => $id]);
    ?>

    <div class="animate-dropdown"><!-- ========================================= BREADCRUMB ========================================= -->
        <div id="breadcrumb-alt">
            <div class="container">
                <div class="breadcrumb-nav-holder minimal">
                    <ul>
                        <li class="dropdown breadcrumb-item">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                shop by department
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Computer Cases &amp; Accessories</a></li>
                                <li><a href="#">CPUs, Processors</a></li>
                                <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                                <li><a href="#">Graphics, Video Cards</a></li>
                                <li><a href="#">Interface, Add-On Cards</a></li>
                                <li><a href="#">Laptop Replacement Parts</a></li>
                                <li><a href="#">Memory (RAM)</a></li>
                                <li><a href="#">Motherboards</a></li>
                                <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                                <li><a href="#">Motherboard Components</a></li>
                            </ul>
                        </li><!-- /.breadcrumb-item -->

                        <li class="dropdown breadcrumb-item">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">laptops &amp; computers </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">PDA</a>
                                    <a href="#">accesories</a>
                                    <a href="#">tablets</a>
                                    <a href="#">games</a>
                                    <a href="#">consoles</a>
                                </li>
                            </ul>
                        </li><!-- /.breadcrumb-item -->

                        <li class="dropdown breadcrumb-item">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">desktop PC </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">PDA</a>
                                    <a href="#">accesories</a>
                                    <a href="#">tablets</a>
                                    <a href="#">games</a>
                                    <a href="#">consoles</a>
                                </li>
                            </ul>
                        </li><!-- /.breadcrumb-item -->

                        <li class="breadcrumb-item">
                            <a href="#">gaming</a>
                        </li><!-- /.breadcrumb-item -->

                        <li class="breadcrumb-item current">
                            <a href="#">VAIO Fit Laptop - Windows</a>
                        </li><!-- /.breadcrumb-item -->
                    </ul><!-- /.breadcrumb-nav-holder -->
                </div>
            </div><!-- /.container -->
        </div><!-- /#breadcrumb-alt -->
        <!-- ========================================= BREADCRUMB : END ========================================= -->
    </div>

    <?php
    //arrecho($singleProduct->fetch_assoc());
    while ($value = $singleProduct->fetch_assoc()) {
        $p = $value['id'];
        $pics = explode('|', $value['pics']);
        ?>
        <div id="single-product">
            <div class="container">

                <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
                    <div class="product-item-holder size-big single-product-gallery small-gallery">

                        <div id="owl-single-product">




                            <?php
                            $featured = explode('.', $value['featuredImage']);
                            ?>

                            <div class="single-product-gallery-item" id="slide1">
                                <a data-rel="prettyphoto" href="<?php
                                echo $rooturl . "images/products/" . fileNameSecure($value['id']) . '/' . $value['featuredImage'];
                                ?>">
                                       <?php
                                       echo "<img data-rel='prettyphoto'  class='image-responsive' src='images/products/" . fileNameSecure($value['id']) . '/' . $value['featuredImage'] . "' />";
                                       ?>
                                </a>
                            </div><!-- /.single-product-gallery-item -->




                            <?php
                            $countThis = 2;
                            foreach ($pics as $pic) {
                                ?>
                                <div class="single-product-gallery-item" <?php echo 'id=slide' . $countThis++; ?>>
                                    <a data-rel="prettyphoto" href=" <?php
                                    echo $rooturl . "images/products/" . fileNameSecure($value['id']) . '/' . $pic;
                                    ?>">

                                        <?php
                                        echo "<img class='image-responsive' src='images/products/" . fileNameSecure($value['id']) . '/' . $pic . "' />";
                                        ?>

                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                        </div><!-- /.single-product-slider -->


                        <div class="single-product-gallery-thumbs gallery-thumbs">

                            <div id="owl-single-product-thumbnails">
                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="0" href="#slide1">
                                    <?php
                                    $featured = explode('.', $value['featuredImage']);
                                    ?>
                                    <img width="67" data-target="#owl-single-product"  data-slide="0" href="#slide1" class='image-responsive' src='<?php
                                    echo $rooturl . resize(
                                            'images/products/' . fileNameSecure($p) . '/' . $value['featuredImage'], 'images/products/' . fileNameSecure($p) . '/' . 'f-67-67.' . $featured[1], 67, 67);
                                    ?>'/>
                                </a>




                                <?php
                                $dataSlide = 2;
                                foreach ($pics as $mpic) {
                                    $str = $mpic;
                                    $new = explode('.', $str);
                                    ?>
                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="<?php echo ($dataSlide - 1) ?>" href="#slide<?php echo $dataSlide ?>">
                                        <img width="67" height="67" alt="" src="<?php
                                        echo $rooturl . resize(
                                                'images/products/' . fileNameSecure($p) . '/' . $mpic, 'images/products/' . fileNameSecure($p) . '/' . $new[0] . '-67-67.' . $new[1], 67, 67);
                                        ?>" />
                                    </a>
                                    <?php
                                    $dataSlide++;
                                }
                                ?>

                            </div><!-- /#owl-single-product-thumbnails -->

                            <div class="nav-holder left hidden-xs">
                                <a class="prev-btn slider-prev" data-target="#owl-single-product-thumbnails" href="#prev"></a>
                            </div><!-- /.nav-holder -->

                            <div class="nav-holder right hidden-xs">
                                <a class="next-btn slider-next" data-target="#owl-single-product-thumbnails" href="#next"></a>
                            </div><!-- /.nav-holder -->

                        </div><!-- /.gallery-thumbs -->

                    </div><!-- /.single-product-gallery -->
                </div><!-- /.gallery-holder -->
                <div class="no-margin col-xs-12 col-sm-7 body-holder">
                    <div class="body">
                        <div class="star-holder inline"><div class="star" data-score="5"></div></div>
                        <div class="availability"><label>Availability:</label>
                            <span class="available">
                                <?php
                                if ($value['stock'] > 10)
                                    echo 'in stock';
                                elseif ($value['stock'] > 10 && $value['stock'] < 0)
                                    echo 'Low on Stock';
                                else
                                    echo 'not available';
                                ?>
                            </span>
                        </div>

                        <div class="title"><a><?php echo $value['title']; ?></a></div>
                        <div class="brand">FIX BRAND</div>

                        <div class="social-row">
                            <span class="st_facebook_hcount"></span>
                            <span class="st_twitter_hcount"></span>
                            <span class="st_pinterest_hcount"></span>
                        </div>

                        <?php
                        if (isset($_SESSION['user']) && $_SESSION['user']['type'] == 1) {
                            $aseKina = $data->view('wishlist', NULL, NULL, ['customerid' => $_SESSION['user']['id'], 'productid' => $value['id']]);

                            if ($aseKina->num_rows == 0) {
                                ?>
                                <div class="buttons-holder">
                                    <a id="wishbutton" class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                    <input id="wish" type="hidden" name="wish" <?php echo 'value="', $value['id'], '"'; ?> class="btn-add-to-wishlist">
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="buttons-holder">
                                    <span class="btn-add-to-wishlist text-success" >added to wishlist</span>
                                </div>


                                <?php
                            }
                        }
                        ?>
                        <div class="excerpt">
                            <p><?php echo $value['short_description']; ?></p>
                        </div>

                        <div class="prices">
                            <div class="price-current">$<?php echo $value['price']; ?></div>
                            <div class="price-prev">$0000</div>
                        </div>

                        <div class="qnt-holder">
                            <div class="le-quantity">
                                <form>
                                    <a class="minus" href="#reduce"></a>
                                    <input class="quantity" name="quantity" readonly type="text" value="1" />
                                    <a class="plus" href="#add"></a>
                                </form>
                            </div>
                            <a id="addto-cart" href="index.php?f=checkout" class="le-button huge">add to cart</a>
                        </div>
                    </div><!-- /.body -->

                </div><!-- /.body-holder -->
            </div><!-- /.container -->
        </div><!-- /.single-product -->

        <!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
        <section id="single-product-tab">
            <div class="container">
                <div class="tab-holder">

                    <ul class="nav nav-tabs simple" >
                        <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                        <li><a href="#additional-info" data-toggle="tab">Additional Information</a></li>
                        <li><a href="#reviews" data-toggle="tab">Reviews (3)</a></li>
                    </ul><!-- /.nav-tabs -->

                    <div class="tab-content">
                        <div class="tab-pane active" id="description">


                            <div class="meta-row">


                                <div class="inline">
                                    <label>category:</label>
                                    <span><a href="<?php echo $rooturl, '?f=category&id=', $value['category_name']; ?>"><?php echo $value['category_name']; ?></a> &rarr; </span>
                                    <span><a href="<?php echo $rooturl, '?f=subcategory&id=', $value['subcategoryid']; ?>"><?php echo $value['subcategory_name']; ?></a></span>
                                </div><!-- /.inline -->

                                <span class="seperator">/</span>

                                <div class="inline">
                                    <label>Tags:</label>
                                    <span><a href="#">FIX TAGS</a>,</span>
                                    <span><a href="#">FIX TAGS</a>,</span>
                                    <span><a href="#">FIX TAGS</a></span>
                                </div><!-- /.inline -->
                            </div><!-- /.meta-row -->
                        </div><!-- /.tab-pane #description -->

                        <div class="tab-pane" id="additional-info">
                            <ul class="tabled-data">
                                <li>
                                    <label>weight</label>
                                    <div class="value">7.25 kg</div>
                                </li>
                                <li>
                                    <label>dimensions</label>
                                    <div class="value">90x60x90 cm</div>
                                </li>
                                <li>
                                    <label>size</label>
                                    <div class="value">one size fits all</div>
                                </li>
                                <li>
                                    <label>color</label>
                                    <div class="value">white</div>
                                </li>
                                <li>
                                    <label>guarantee</label>
                                    <div class="value">5 years</div>
                                </li>
                            </ul><!-- /.tabled-data -->

                            <div class="meta-row">
                                <div class="inline">
                                    <label>SKU:</label>
                                    <span>54687621</span>
                                </div><!-- /.inline -->

                                <span class="seperator">/</span>

                                <div class="inline">
                                    <label>categories:</label>
                                    <span><a href="#">-50% sale</a>,</span>
                                    <span><a href="#">gaming</a>,</span>
                                    <span><a href="#">desktop PC</a></span>
                                </div><!-- /.inline -->

                                <span class="seperator">/</span>

                                <div class="inline">
                                    <label>tag:</label>
                                    <span><a href="#">fast</a>,</span>
                                    <span><a href="#">gaming</a>,</span>
                                    <span><a href="#">strong</a></span>
                                </div><!-- /.inline -->
                            </div><!-- /.meta-row -->
                        </div><!-- /.tab-pane #additional-info -->

<?php
if (isset($_SESSION['user']['id']))
{
    ?>
                        <div class="tab-pane" id="reviews">
                            <div class="comments">
                                <div class="comment-item">
                                    <div class="row no-margin">
                                        <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                            <div class="avatar">
                                                <img alt="avatar" src="assets/images/default-avatar.jpg">
                                            </div><!-- /.avatar -->
                                        </div><!-- /.col -->

                                        <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                            <?php
                                            $view = $data->view("review_insert");

                                            while ($views = $view->fetch_object()) {
                                                $id = $views->id;
                                                ?>
                                                <div class="comment-body">
                                                    <div class="meta-info">
                                                        <div class="author inline">
                                                            <a href="#" class="bold"><?php echo $views->name ?></a>
                                                        </div>
                                                        <div class="star-holder inline">
                                                            <div class="star" data-score="4"></div>
                                                        </div>
                                                        <div class="date inline pull-right">
                                                            <?php
                                                            echo $views->date;
//            date_default_timezone_set('Asia/Dhaka');
//
//            $d = strtotime("now");
//            echo date("Y-m-d h:i:sa", $d) . "<br>";
                                                            ?>
                                                        </div>
                                                    </div><!-- /.meta-info -->
                                                    <p class="comment-text">
                                                        <?php echo $views->description ?>
                                                    </p><!-- /.comment-text -->
                                                    <a href="index.php?f=review-edit&id=<?php echo $id ?>">Edit</a>
                                                </div><!-- /.comment-body -->
                                            <?php } ?>
                                        </div><!-- /.col -->

                                    </div><!-- /.row -->
                                </div><!-- /.comment-item -->


                            </div><!-- /.comments -->

                            <?php
                            if (isset($_POST['sub'])) {
                                $where = array(
                                    "name" => $data->validate($_POST['name']),
                                    "email" => $data->validate($_POST['email']),
                                    "description" => $data->validate($_POST['text'])
                                );
                                
                                
                                if ($result = $data->insert("review_insert", $where)) {
//                 Redirect("index.php?e=country-view");
                                    echo 'insert Yes';
                                } else {
//                                    echo $result->Error;
                                }
                            }
                            ?>                  







                            <div class="add-review row">
                                <div class="col-sm-8 col-xs-12">
                                    <div class="new-review-form">
                                        <h2>Add review</h2>

                                        <?php
                                        if (isset($_GET['id'])) {
                                            $review_id = ["id" => $_SESSION['user']['id']];
                                            ;

                                            $review = $data->view("users", NULL, NULL, $review_id);



                                            while ($sqll = $review->fetch_object()) {
                                                ?>
                                                <form id="contact-form" class="contact-form" method="post" >
                                                    <div class="row field-row">
                                                        <div class="col-xs-12 col-sm-6">


                                                            <label>name*</label>
                                                            <input class="le-input" type="text" name="name" value="<?php echo $sqll->name; ?>" >
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6">
                                                            <label>email*</label>
                                                            <input class="le-input" type="email" name="email" value="<?php echo $sqll->email; ?>">
                                                        </div>
                                                    </div><!-- /.field-row -->

                                                    <div class="field-row star-row">
                                                        <label>your rating</label>
                                                        <div class="star-holder">
                                                            <div class="star big" data-score="0"></div>
                                                        </div>
                                                    </div><!-- /.field-row -->

                                                    <div class="field-row">
                                                        <label>your review</label>
                                                        <textarea rows="8" class="le-input" name="text" title="text"  ></textarea>
                                                    </div><!-- /.field-row -->

                                                    <div class="buttons-holder">
                                                        <input type="submit" class="le-button huge" value="Post"  name="sub"/>
                                                    </div><!-- /.buttons-holder -->
                                                </form><!-- /.contact-form -->

                                                <?php
                                            }
                                        }
                                        ?>
                                    </div><!-- /.new-review-form -->
                                </div><!-- /.col -->
                            </div><!-- /.add-review -->

                        </div><!-- /.tab-pane #reviews -->
                        
                        
                        
                        
                        <?php
                        
}
                        ?>
                    </div><!-- /.tab-content -->

                </div><!-- /.tab-holder -->
            </div><!-- /.container -->
        </section><!-- /#single-product-tab -->
        <!-- ========================================= SINGLE PRODUCT TAB : END ========================================= -->


        <!-- ========================================= RECENTLY VIEWED ========================================= -->
        <section id="recently-reviewd" class="wow fadeInUp">
            <div class="container">
                <div class="carousel-holder hover">

                    <div class="title-nav">
                        <h2 class="h1">Recently Viewed</h2>
                        <div class="nav-holder">
                            <a href="#prev" data-target="#owl-recently-viewed" class="slider-prev btn-prev fa fa-angle-left"></a>
                            <a href="#next" data-target="#owl-recently-viewed" class="slider-next btn-next fa fa-angle-right"></a>
                        </div>
                    </div><!-- /.title-nav -->

                    <div id="owl-recently-viewed" class="owl-carousel product-grid-holder">
                        <div class="no-margin carousel-item product-item-holder size-small hover">
                            <div class="product-item">

                                <div class="image">
                                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-11.jpg" />
                                </div>
                                <div class="body">
                                    <div class="title">
                                        <a href="single-product.html">LC-70UD1U 70" class aquos 4K ultra HD</a>
                                    </div>
                                    <div class="brand">Sharp</div>
                                </div>
                                <div class="prices">
                                    <div class="price-current text-right">$1199.00</div>
                                </div>

                            </div><!-- /.product-item -->
                        </div><!-- /.product-item-holder -->


                    </div><!-- /#recently-carousel -->

                </div><!-- /.carousel-holder -->
            </div><!-- /.container -->
        </section><!-- /#recently-reviewd -->
        <!-- ========================================= RECENTLY VIEWED : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->
        <script>

            function callProductCookie() {
                pCookie(
                        'cname',
        <?php echo '"', $value['title'], '"'; ?>,
        <?php echo '"', $value['price'], '"'; ?>,
        <?php
        echo '"', $rooturl . resize(
                'images/products/' . fileNameSecure($p) . '/' . $value['featuredImage'], 'images/products/' . fileNameSecure($p) . '/' . 'f-194-143.' . $featured[1], 194, 143), '"';
        ?>,
        <?php echo '"', $value['brand_name'], '"'; ?>,
        <?php echo '"?f=single-product&id=', $value['id'], '"'; ?>);
            }

            function pCookie(cookieName, productTitle, productPrice, productImg, productBrand, productLink) {
                //                alert(cookieName + productTitle + productPrice + productImg + productBrand + productLink);
            }

            callProductCookie();

        </script>

        <?php
    }
}
?>

<script>

</script>