<!DOCTYPE html>
<html lang="tr">
<?php include 'header.php'; ?>
<body class="checkout_page">
<?php include 'menu.php'; ?>
<?php
include "functions/cart/cartprocess.php";
//SEPET İŞLEMLERİ
if(isset($_POST["cartUpdate"])){
    //SEPET SESSIONS İŞLEMLERİ
    _cartUpdate(1,$_POST["productID"],$_POST["cartQuantity"],rand(0,99999999999));
}
?>
<body>
<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Cart</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="ec-breadcrumb-item active">Cart</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- Ec cart page -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-cart-leftside col-lg-8 col-md-12 ">
                <!-- cart content Start -->
                <div class="ec-cart-content">
                    <div class="ec-cart-inner">
                        <div class="row">
                                <div class="table-content cart-table-content">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>Ürün</th>
                                            <th>Tutar</th>
                                            <th style="text-align: center;">Adet</th>
                                            <th>Toplam</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $productTotal= 0.0;
                                            $cartTotal= 0.0;
                                            if (count($_SESSION["cartSession"]) > 0){
                                            foreach ($_SESSION["cartSession"] as $cartListing){
                                                echo $cartListing["productID"];
                                                $cartProduct_ = db_connect()->prepare("SELECT * FROM products WHERE productsID = ?");
                                                $cartProduct_->execute(array($cartListing["productID"]));
                                                foreach ($cartProduct_ as $cartProduct);
                                                $productTotal += $cartProduct["productsNewPrice"]*$cartListing["cartQuantity"];
                                        ?>
                                            <tr>
                                            <td data-label="Ürün" class="ec-cart-pro-name">
                                                <?php
                                                $imageQuery_ = db_connect()->prepare("SELECT * FROM images WHERE imagePID = ? ORDER BY imageID ASC ");
                                                $imageQuery_->execute(array($cartListing["productID"]));
                                                foreach ($imageQuery_ as $imageQuery) {
                                                    ?>
                                                    <a href="">
                                                        <img style="width: 85px" class="ec-cart-pro-img mr-4" src="https://biofeline.com/<?php echo $imageQuery['imageUrl'];?>" alt="Product image"/>
                                                        <span style="font-size: 14px"><?php echo $cartProduct["productsName"]?></span>
                                                    </a>
                                                <?php } ?>
                                            </td>

                                            <td data-label="Fiyat" class="ec-cart-pro-price">
                                                <span class="amount"><?php echo number_format($cartProduct["productsNewPrice"],2)?>₺</span>
                                            </td>
                                            <td data-label="Miktar" class="ec-cart-pro-qty"
                                                style="text-align: center;">
                                                <div class="cart-qty-plus-minus">
                                                    <form action="" method="post">
                                                        <input type="text" class="cart-plus-minus" name="cartQuantity" value="<?php echo $cartListing["cartQuantity"]?>" >
                                                </div>
                                                <input type="hidden" class="cart-plus-minus" name="productID" value="<?php echo $cartListing["productID"]?>" >
                                                <input type="submit" class="btn-primary btn red" name="cartUpdate" value="Güncelle" style="margin: 10px; width: 125px">
                                                    </form>
                                            </td>
                                            <td data-label="Toplam" class="ec-cart-pro-subtotal"><?php echo number_format($cartProduct["productsNewPrice"]*$cartListing["cartQuantity"],2)?>₺</td>
                                            <td data-label="Kaldır" class="ec-cart-pro-remove">
                                                <a href="#"><i class="ecicon eci-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ec-cart-update-bottom">
                                            <a href="#">Alışverişe devam et</a>
                                            <button class="btn btn-primary">Ödemeye Geç</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!--cart content End -->
            </div>
            <!-- Sidebar Area Start -->
            <div class="ec-cart-rightside col-lg-4 col-md-12">
                <div class="ec-sidebar-wrap">
                    <!-- Sidebar Summary Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-sb-title">
                            <h3 class="ec-sidebar-title">Özet</h3>
                        </div>
                        <div class="ec-sb-block-content">
                            <h4 class="ec-ship-title">Sepet Tutarı</h4>
                        </div>

                        <div class="ec-sb-block-content">
                            <div class="ec-cart-summary-bottom">
                                <div class="ec-cart-summary">
                                    <div>
                                        <span class="text-left">Ürünler</span>
                                        <span class="text-right"><?php echo number_format($productTotal,2); ?>₺</span>
                                    </div>
                                    <div>
                                        <span class="text-left">Kargo Ücreti</span>
                                        <?php if($productTotal < 150){
                                            //150₺ ALTINDAYSA 15₺ KARGO ÜCRETİ
                                            $cartTotal = $productTotal+15;
                                        ?>
                                        <span class="text-right">15.00₺</span>
                                        <?php
                                        }else{
                                        ?>
                                        <span class="text-right">Kargo Bedava!</span>
                                        <?php
                                            //150₺ ÜSTÜNDEYSE KARGO BEDAVA
                                            $cartTotal = $productTotal;
                                        }
                                        ?>
                                    </div>
                                    <div>
                                        <span class="text-left">Kupon İndirimi</span>
                                        <span class="text-right"><a class="ec-cart-coupan">Kupon kullan</a></span>
                                    </div>
                                    <div class="ec-cart-coupan-content">
                                        <form class="ec-cart-coupan-form" name="ec-cart-coupan-form" method="post"
                                              action="#">
                                            <input class="ec-coupan" type="text" required=""
                                                   placeholder="Enter Your Coupan Code" name="ec-coupan" value="">
                                            <button class="ec-coupan-btn button btn-primary" type="submit"
                                                    name="subscribe" value="">Uygula</button>
                                        </form>
                                    </div>
                                    <div class="ec-cart-summary-total">
                                        <span class="text-left">Toplam Tutar</span>
                                        <span class="text-right"><?php echo number_format($cartTotal,2); ?>₺</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Summary Block -->
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'footer.php'; ?>
</body>
</html>