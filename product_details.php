<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="tr">
<?php include "header.php"; ?>
<body class="product_page">
<?php include "menu.php"; ?>
<?php
include "functions/products/products.php";
include "functions/cart/addtocart.php";
$productID = $_GET["productID"];
foreach (_productsDetails($productID) as $productsDetail);
if($productsDetail == null){
    header("location:index.php");
}
if(isset($_POST["quantity"])){
    _addtocart(
        $_POST["cartMemberID"],
        $_POST["cartProductID"],
        $_POST["cartQuantity"]
    );
    echo $_POST["cartMemberID"]." ".$_POST["cartProductID"]." ".$_POST["cartQuantity"];
}
?>
<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title"><?php echo $productsDetail["productsName"];?>></h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="index.html">Anasayfa</a></li>
                            <li class="ec-breadcrumb-item active"><?php echo $productsDetail["productsName"];?></li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- Sart Single product -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-pro-rightside ec-common-rightside col-lg-12 col-md-12">

                <!-- Single product content Start -->
                <div class="single-pro-block">
                    <div class="single-pro-inner">
                        <div class="row">
                            <div class="single-pro-img single-pro-img-no-sidebar">
                                <div class="single-product-scroll">
                                    <div class="single-product-cover">
                                        <?php
                                            $imageQuery_ = db_connect()->prepare("SELECT * FROM images WHERE imagePID = ? ORDER BY imageID ASC ");
                                            $imageQuery_->execute(array($productsDetail['productsID']));
                                            foreach ($imageQuery_ as $imageQuery) {
                                        ?>
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="https://biofeline.com/<?php echo $imageQuery['imageUrl'];?>" alt="Product image"/>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="single-nav-thumb">
                                        <?php
                                        $imageQuery_ = db_connect()->prepare("SELECT * FROM images WHERE imagePID = ? ORDER BY imageID ASC ");
                                        $imageQuery_->execute(array($productsDetail['productsID']));
                                        foreach ($imageQuery_ as $imageQuery) {
                                            ?>
                                            <div class="single-slide">
                                                <img class="img-responsive" src="https://biofeline.com/<?php echo $imageQuery['imageUrl'];?>" alt="Product image"/>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="single-pro-desc single-pro-desc-no-sidebar">
                                <div class="single-pro-content">
                                    <h5 class="ec-single-title"><?php echo $productsDetail["productsName"];?></h5>
                                    <div class="ec-single-rating-wrap">
                                        <div class="ec-single-rating">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star-o"></i>
                                        </div>
                                        <span class="ec-read-review"><a href="#ec-spt-nav-review">Be the first to
                                                    review this product</a></span>
                                    </div>
                                    <div class="ec-single-desc"><?php echo $productsDetail["productsShortDesc"];?></div>

                                    <div class="ec-single-sales">
                                        <div class="ec-single-sales-inner">
                                            <div class="ec-single-sales-title">sales accelerators</div>
                                            <div class="ec-single-sales-visitor">real time <span>24</span> visitor
                                                right now!</div>
                                            <div class="ec-single-sales-progress">
                                                    <span class="ec-single-progress-desc">Hurry up!left 29 in
                                                        stock</span>
                                                <span class="ec-single-progressbar"></span>
                                            </div>
                                            <div class="ec-single-sales-countdown">
                                                <div class="ec-single-countdown"><span
                                                            id="ec-single-countdown"></span></div>
                                                <div class="ec-single-count-desc">Time is Running Out!</div>
                                            </div>
                                        </div>
                                    </div>
<!--                                    <div class="ec-single-price-stoke">-->
<!--                                        <div class="ec-single-price">-->
<!--                                            <span class="ec-single-ps-title">As low as</span>-->
<!--                                            <span class="new-price">--><?php //echo number_format($productsDetail["productsNewPrice"],2);?><!--₺</span>-->
<!--                                        </div>-->
<!--                                        <div class="ec-single-stoke">-->
<!--                                            <span class="ec-single-ps-title">IN STOCK</span>-->
<!--                                            <span class="ec-single-sku">SKU: --><?php //echo $productsDetail["productsCode"];?><!--</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="ec-pro-variation">-->
<!--                                        <div class="ec-pro-variation-inner ec-pro-variation-size">-->
<!--                                            <span>SIZE</span>-->
<!--                                            <div class="ec-pro-variation-content">-->
<!--                                                <ul>-->
<!--                                                    <li class="active"><span>7</span></li>-->
<!--                                                    <li><span>8</span></li>-->
<!--                                                    <li><span>9</span></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="ec-pro-variation-inner ec-pro-variation-color">-->
<!--                                            <span>Color</span>-->
<!--                                            <div class="ec-pro-variation-content">-->
<!--                                                <ul>-->
<!--                                                    <li class="active"><span-->
<!--                                                                style="background-color:#23839c;"></span></li>-->
<!--                                                    <li><span style="background-color:#000;"></span></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="ec-single-qty">
                                        <form method="POST">
                                            <div class="qty-plus-minus" style="float: left">
                                                <input type="hidden" value="<?php echo 1; ?>" name="cartMemberID"/>
                                                <input type="hidden" value="<?php echo $productID; ?>" name="cartProductID"/>
                                                <input type="text" class="qty-input"  name="cartQuantity" value="1"/>
                                            </div>
                                            <div class="ec-single-cart " style="float: left">
                                                <input type="submit" class="btn btn-primary" name="quantity" style="width: 100%;" value="SEPETE EKLE">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="ec-single-social">
                                        <ul class="mb-0">
                                            <li class="list-inline-item facebook"><a href="#"><i
                                                            class="ecicon eci-facebook"></i></a></li>
                                            <li class="list-inline-item twitter"><a href="#"><i
                                                            class="ecicon eci-twitter"></i></a></li>
                                            <li class="list-inline-item instagram"><a href="#"><i
                                                            class="ecicon eci-instagram"></i></a></li>
                                            <li class="list-inline-item youtube-play"><a href="#"><i
                                                            class="ecicon eci-youtube-play"></i></a></li>
                                            <li class="list-inline-item behance"><a href="#"><i
                                                            class="ecicon eci-behance"></i></a></li>
                                            <li class="list-inline-item whatsapp"><a href="#"><i
                                                            class="ecicon eci-whatsapp"></i></a></li>
                                            <li class="list-inline-item plus"><a href="#"><i
                                                            class="ecicon eci-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Single product content End -->
                <!-- Single product tab start -->
                <div class="ec-single-pro-tab">
                    <div class="ec-single-pro-tab-wrapper">
                        <div class="ec-single-pro-tab-nav">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab"
                                       data-bs-target="#ec-spt-nav-details" role="tablist">Detail</a>
                                </li>
<!--                              -->
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review"
                                       role="tablist">Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content  ec-single-pro-tab-content">
                            <div id="ec-spt-nav-details" class="tab-pane fade show active">
                                <div class="ec-single-pro-tab-desc">
                                    <?php echo $productsDetail["productsDesc"];?>
                                </div>
                            </div>
                            <div id="ec-spt-nav-review" class="tab-pane fade">
                                <div class="row">
                                    <div class="ec-t-review-wrapper">
                                        <div class="ec-t-review-item">
                                            <div class="ec-t-review-avtar">
                                                <img src="assets/images/review-image/1.jpg" alt="" />
                                            </div>
                                            <div class="ec-t-review-content">
                                                <div class="ec-t-review-top">
                                                    <div class="ec-t-review-name">Jeny Doe</div>
                                                    <div class="ec-t-review-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="ec-t-review-bottom">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-t-review-item">
                                            <div class="ec-t-review-avtar">
                                                <img src="assets/images/review-image/2.jpg" alt="" />
                                            </div>
                                            <div class="ec-t-review-content">
                                                <div class="ec-t-review-top">
                                                    <div class="ec-t-review-name">Linda Morgus</div>
                                                    <div class="ec-t-review-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="ec-t-review-bottom">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="ec-ratting-content">
                                        <h3>Add a Review</h3>
                                        <div class="ec-ratting-form">
<!--                                            <form action="#">-->
<!--                                                <div class="ec-ratting-star">-->
<!--                                                    <span>Your rating:</span>-->
<!--                                                    <div class="ec-t-review-rating">-->
<!--                                                        <i class="ecicon eci-star fill"></i>-->
<!--                                                        <i class="ecicon eci-star fill"></i>-->
<!--                                                        <i class="ecicon eci-star-o"></i>-->
<!--                                                        <i class="ecicon eci-star-o"></i>-->
<!--                                                        <i class="ecicon eci-star-o"></i>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <div class="ec-ratting-input">-->
<!--                                                    <input name="your-name" placeholder="Name" type="text" />-->
<!--                                                </div>-->
<!--                                                <div class="ec-ratting-input">-->
<!--                                                    <input name="your-email" placeholder="Email*" type="email"-->
<!--                                                           required />-->
<!--                                                </div>-->
<!--                                                <div class="ec-ratting-input form-submit">-->
<!--                                                        <textarea name="your-commemt"-->
<!--                                                                  placeholder="Enter Your Comment"></textarea>-->
<!--                                                    <button class="btn btn-primary" type="submit"-->
<!--                                                            value="Submit">Submit</button>-->
<!--                                                </div>-->
<!--                                            </form>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product details description area end -->
            </div>

        </div>
    </div>
</section>
<!-- End Single product -->

<!-- Related Product Start -->
<section class="section ec-releted-product section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Related products</h2>
                    <h2 class="ec-title">Related products</h2>
                    <p class="sub-title">Browse The Collection of Top Products</p>
                </div>
            </div>
        </div>
        <div class="row margin-minus-b-30">
            <!-- Related Product Content -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                <div class="ec-product-inner">
                    <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                            <a href="product-left-sidebar.html" class="image">
                                <img class="main-image"
                                     src="assets/images/product-image/6_1.jpg" alt="Product" />
                                <img class="hover-image"
                                     src="assets/images/product-image/6_2.jpg" alt="Product" />
                            </a>
                            <span class="percentage">20%</span>
                            <a href="#" class="quickview" data-link-action="quickview"
                               title="Quick view" data-bs-toggle="modal"
                               data-bs-target="#ec_quickview_modal"><img
                                        src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                        alt="" /></a>
                            <div class="ec-pro-actions">
                                <a href="compare.html" class="ec-btn-group compare"
                                   title="Compare"><img src="assets/images/icons/compare.svg"
                                                        class="svg_img pro_svg" alt="" /></a>
                                <button title="Add To Cart" class=" add-to-cart"><img
                                            src="assets/images/icons/cart.svg" class="svg_img pro_svg"
                                            alt="" /> Add To Cart</button>
                                <a class="ec-btn-group wishlist" title="Wishlist"><img
                                            src="assets/images/icons/wishlist.svg"
                                            class="svg_img pro_svg" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="ec-pro-content">
                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Round Neck T-Shirt</a></h5>
                        <div class="ec-pro-rating">
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star"></i>
                        </div>
                        <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                        <span class="ec-price">
                                <span class="old-price">$27.00</span>
                                <span class="new-price">$22.00</span>
                            </span>
                        <div class="ec-pro-option">
                            <div class="ec-pro-color">
                                <span class="ec-pro-opt-label">Color</span>
                                <ul class="ec-opt-swatch ec-change-img">
                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                                          data-src="assets/images/product-image/6_1.jpg"
                                                          data-src-hover="assets/images/product-image/6_1.jpg"
                                                          data-tooltip="Gray"><span
                                                    style="background-color:#e8c2ff;"></span></a></li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                           data-src="assets/images/product-image/6_2.jpg"
                                           data-src-hover="assets/images/product-image/6_2.jpg"
                                           data-tooltip="Orange"><span
                                                    style="background-color:#9cfdd5;"></span></a></li>
                                </ul>
                            </div>
                            <div class="ec-pro-size">
                                <span class="ec-pro-opt-label">Size</span>
                                <ul class="ec-opt-size">
                                    <li class="active"><a href="#" class="ec-opt-sz"
                                                          data-old="$25.00" data-new="$20.00"
                                                          data-tooltip="Small">S</a></li>
                                    <li><a href="#" class="ec-opt-sz" data-old="$27.00"
                                           data-new="$22.00" data-tooltip="Medium">M</a></li>
                                    <li><a href="#" class="ec-opt-sz" data-old="$35.00"
                                           data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                <div class="ec-product-inner">
                    <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                            <a href="product-left-sidebar.html" class="image">
                                <img class="main-image"
                                     src="assets/images/product-image/7_1.jpg" alt="Product" />
                                <img class="hover-image"
                                     src="assets/images/product-image/7_2.jpg" alt="Product" />
                            </a>
                            <span class="percentage">20%</span>
                            <span class="flags">
                                    <span class="sale">Sale</span>
                                </span>
                            <a href="#" class="quickview" data-link-action="quickview"
                               title="Quick view" data-bs-toggle="modal"
                               data-bs-target="#ec_quickview_modal"><img
                                        src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                        alt="" /></a>
                            <div class="ec-pro-actions">
                                <a href="compare.html" class="ec-btn-group compare"
                                   title="Compare"><img src="assets/images/icons/compare.svg"
                                                        class="svg_img pro_svg" alt="" /></a>
                                <button title="Add To Cart" class=" add-to-cart"><img
                                            src="assets/images/icons/cart.svg" class="svg_img pro_svg"
                                            alt="" /> Add To Cart</button>
                                <a class="ec-btn-group wishlist" title="Wishlist"><img
                                            src="assets/images/icons/wishlist.svg"
                                            class="svg_img pro_svg" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="ec-pro-content">
                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Full Sleeve Shirt</a></h5>
                        <div class="ec-pro-rating">
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star"></i>
                        </div>
                        <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                        <span class="ec-price">
                                <span class="old-price">$12.00</span>
                                <span class="new-price">$10.00</span>
                            </span>
                        <div class="ec-pro-option">
                            <div class="ec-pro-color">
                                <span class="ec-pro-opt-label">Color</span>
                                <ul class="ec-opt-swatch ec-change-img">
                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                                          data-src="assets/images/product-image/7_1.jpg"
                                                          data-src-hover="assets/images/product-image/7_1.jpg"
                                                          data-tooltip="Gray"><span
                                                    style="background-color:#01f1f1;"></span></a></li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                           data-src="assets/images/product-image/7_2.jpg"
                                           data-src-hover="assets/images/product-image/7_2.jpg"
                                           data-tooltip="Orange"><span
                                                    style="background-color:#b89df8;"></span></a></li>
                                </ul>
                            </div>
                            <div class="ec-pro-size">
                                <span class="ec-pro-opt-label">Size</span>
                                <ul class="ec-opt-size">
                                    <li class="active"><a href="#" class="ec-opt-sz"
                                                          data-old="$12.00" data-new="$10.00"
                                                          data-tooltip="Small">S</a></li>
                                    <li><a href="#" class="ec-opt-sz" data-old="$15.00"
                                           data-new="$12.00" data-tooltip="Medium">M</a></li>
                                    <li><a href="#" class="ec-opt-sz" data-old="$20.00"
                                           data-new="$17.00" data-tooltip="Extra Large">XL</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                <div class="ec-product-inner">
                    <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                            <a href="product-left-sidebar.html" class="image">
                                <img class="main-image"
                                     src="assets/images/product-image/1_1.jpg" alt="Product" />
                                <img class="hover-image"
                                     src="assets/images/product-image/1_2.jpg" alt="Product" />
                            </a>
                            <span class="percentage">20%</span>
                            <span class="flags">
                                    <span class="sale">Sale</span>
                                </span>
                            <a href="#" class="quickview" data-link-action="quickview"
                               title="Quick view" data-bs-toggle="modal"
                               data-bs-target="#ec_quickview_modal"><img
                                        src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                        alt="" /></a>
                            <div class="ec-pro-actions">
                                <a href="compare.html" class="ec-btn-group compare"
                                   title="Compare"><img src="assets/images/icons/compare.svg"
                                                        class="svg_img pro_svg" alt="" /></a>
                                <button title="Add To Cart" class=" add-to-cart"><img
                                            src="assets/images/icons/cart.svg" class="svg_img pro_svg"
                                            alt="" /> Add To Cart</button>
                                <a class="ec-btn-group wishlist" title="Wishlist"><img
                                            src="assets/images/icons/wishlist.svg"
                                            class="svg_img pro_svg" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="ec-pro-content">
                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Cute Baby Toy's</a></h5>
                        <div class="ec-pro-rating">
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star"></i>
                        </div>
                        <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                        <span class="ec-price">
                                <span class="old-price">$40.00</span>
                                <span class="new-price">$30.00</span>
                            </span>
                        <div class="ec-pro-option">
                            <div class="ec-pro-color">
                                <span class="ec-pro-opt-label">Color</span>
                                <ul class="ec-opt-swatch ec-change-img">
                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                                          data-src="assets/images/product-image/1_1.jpg"
                                                          data-src-hover="assets/images/product-image/1_1.jpg"
                                                          data-tooltip="Gray"><span
                                                    style="background-color:#90cdf7;"></span></a></li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                           data-src="assets/images/product-image/1_2.jpg"
                                           data-src-hover="assets/images/product-image/1_2.jpg"
                                           data-tooltip="Orange"><span
                                                    style="background-color:#ff3b66;"></span></a></li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                           data-src="assets/images/product-image/1_3.jpg"
                                           data-src-hover="assets/images/product-image/1_3.jpg"
                                           data-tooltip="Green"><span
                                                    style="background-color:#ffc476;"></span></a></li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                           data-src="assets/images/product-image/1_4.jpg"
                                           data-src-hover="assets/images/product-image/1_4.jpg"
                                           data-tooltip="Sky Blue"><span
                                                    style="background-color:#1af0ba;"></span></a></li>
                                </ul>
                            </div>
                            <div class="ec-pro-size">
                                <span class="ec-pro-opt-label">Size</span>
                                <ul class="ec-opt-size">
                                    <li class="active"><a href="#" class="ec-opt-sz"
                                                          data-old="$40.00" data-new="$30.00"
                                                          data-tooltip="Small">S</a></li>
                                    <li><a href="#" class="ec-opt-sz" data-old="$50.00"
                                           data-new="$40.00" data-tooltip="Medium">M</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                <div class="ec-product-inner">
                    <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                            <a href="product-left-sidebar.html" class="image">
                                <img class="main-image"
                                     src="assets/images/product-image/2_1.jpg" alt="Product" />
                                <img class="hover-image"
                                     src="assets/images/product-image/2_2.jpg" alt="Product" />
                            </a>
                            <span class="percentage">20%</span>
                            <span class="flags">
                                    <span class="new">New</span>
                                </span>
                            <a href="#" class="quickview" data-link-action="quickview"
                               title="Quick view" data-bs-toggle="modal"
                               data-bs-target="#ec_quickview_modal"><img
                                        src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                        alt="" /></a>
                            <div class="ec-pro-actions">
                                <a href="compare.html" class="ec-btn-group compare"
                                   title="Compare"><img src="assets/images/icons/compare.svg"
                                                        class="svg_img pro_svg" alt="" /></a>
                                <button title="Add To Cart" class=" add-to-cart"><img
                                            src="assets/images/icons/cart.svg" class="svg_img pro_svg"
                                            alt="" /> Add To Cart</button>
                                <a class="ec-btn-group wishlist" title="Wishlist"><img
                                            src="assets/images/icons/wishlist.svg"
                                            class="svg_img pro_svg" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="ec-pro-content">
                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Jumbo Carry Bag</a></h5>
                        <div class="ec-pro-rating">
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star"></i>
                        </div>
                        <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                        <span class="ec-price">
                                <span class="old-price">$50.00</span>
                                <span class="new-price">$40.00</span>
                            </span>
                        <div class="ec-pro-option">
                            <div class="ec-pro-color">
                                <span class="ec-pro-opt-label">Color</span>
                                <ul class="ec-opt-swatch ec-change-img">
                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                                          data-src="assets/images/product-image/2_1.jpg"
                                                          data-src-hover="assets/images/product-image/2_2.jpg"
                                                          data-tooltip="Gray"><span
                                                    style="background-color:#fdbf04;"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Product end -->
<?php include 'footer.php'; ?>

</body>
</html>