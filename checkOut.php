<?php
session_start();
include_once ('admin/class/adminBack.php');
$obj_adminBack = new adminBack();
$viewCatagory = $obj_adminBack->p_displayCatagory();
$ctgDatas = array();
while ($data = mysqli_fetch_assoc($viewCatagory)){
    $ctgDatas[]=$data;
}
$userId = $_SESSION['user_id'];
$userName = $_SESSION['user_name'];

if ($userId == null){
    header('location: User_login.php');
}
?>
<?php include_once ('includes/head.php'); ?>
<body class="biolife-body">
<!-- Preloader -->
<?php include_once ('includes/preloader.php'); ?>
<!-- HEADER -->
<header id="header" class="header-area style-01 layout-03">
    <!-- Header Top -->
    <?php include_once ('includes/header_top.php'); ?>
    <!-- Header Middle -->
    <?php include_once ('includes/header_middle.php'); ?>
    <!-- Header Bottom -->
    <?php include_once ('includes/header_bottom.php'); ?>
</header>

<div class="page-contain checkout">
    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container sm-margin-top-37px">
            <div class="row">
                <!--checkout progress box-->
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <div class="checkout-progress-wrap">
                        <ul class="steps">
                            <li class="step 1st">
                                <div class="checkout-act active">
                                    <h3 class="title-box"><span class="number">1</span>Customer</h3>
                                    <div class="box-content">
                                        <p class="txt-desc">Checking out as a <a class="pmlink" href="#">Guest?</a> You’ll be able to save your details to create an account with us later.</p>
                                        <div class="login-on-checkout">
                                            <form action="#" name="frm-login" method="post">
                                                <p class="form-row">
                                                    <label for="input_email">Email Address</label>
                                                    <input type="email" name="email" id="input_email" value="" placeholder="Your email">
                                                    <button type="submit" name="btn-sbmt" class="btn">Continue As Guest</button>
                                                </p>
                                                <p class="form-row">
                                                    <input type="checkbox" name="subcribe" id="input_subcribe" >
                                                    <label for="input_subcribe">Subscribe to our newsletter</label>
                                                </p><br>
                                                <p class="form-row">
                                                    <span for="username">You are Now Signed in as <b><?php if (isset($userName)){ echo $userName; } ?></b>   </span>
                                                    <button type="submit" name="btn-sbmt" class="btn">Continue As <?php if (isset($userName)){ echo $userName; } ?></button>
                                                </p>
                                                <p class="msg">go to Profile? <a href="user_profile.php" class="link-forward">Profile</a></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="step 2nd">
                                <div class="checkout-act"><h3 class="title-box"><span class="number">2</span>Shipping</h3></div>
                            </li>
                            <li class="step 3rd">
                                <div class="checkout-act"><h3 class="title-box"><span class="number">3</span>Billing</h3></div>
                            </li>
                            <li class="step 4th">
                                <div class="checkout-act"><h3 class="title-box"><span class="number">4</span>Payment</h3></div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!--Order Summary-->
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                    <div class="order-summary sm-margin-bottom-80px">
                        <div class="title-block">
                            <h3 class="title">Order Summary</h3>
                            <a href="addtocart.php" class="link-forward">Edit cart</a>
                        </div>
                        <div class="cart-list-box short-type">
                            <ul class="cart-list">
                                <?php if (isset($_SESSION['cart'])){
                                    $subtotal = 0;
                                    $totalItem = 0;
                                    foreach ($_SESSION['cart'] as $key=>$value){
                                    $subtotal = $value['pdt_price'] + $subtotal;
                                    $totalItem++ ;
                                ?>
                                <li class="cart-elem">
                                    <div class="cart-item">
                                        <div class="product-thumb">
                                            <a class="prd-thumb" href="#">
                                                <figure><img src="admin/uploads/<?php echo $value['pdt_file'] ; ?>" width="113" height="113" alt="shop-cart" ></figure>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <span class="txt-quantity">1X</span>
                                            <a href="#" class="pr-name"><?php echo $value['pdt_name']; ?></a>
                                        </div>
                                        <div class="price price-contain">
                                            <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $value['pdt_price']; ?></span></ins>
                                        </div>
                                    </div>
                                </li>
                                <?php }}else{
                                    echo "<h2>Your Cart is Empty</h2>";
                                } ?>
                            </ul>
                            <ul class="subtotal">
                                <span class="number">(
                                    <?php
                                    if (isset($totalItem)){
                                        echo $totalItem;
                                        $_SESSION['totalItem']= $totalItem ;
                                    }else{
                                        echo 0 ;
                                    }
                                    ?>
                                    items)</span>
                                <li>
                                    <div class="subtotal-line">

                                        <b class="stt-name">Subtotal</b>
                                        <span class="stt-price"><?php if (isset($subtotal)){ echo '£ '.$subtotal; }else{ echo '£'.'0'; } ?></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Shipping</b>
                                        <span class="stt-price"><?php
                                            $shipping = 0 ;
                                            if(isset($subtotal)){
												if ($subtotal == 0){
                                                echo '£'.'0';
												} else{
                                                $shipping = 20 ;
                                                echo '£ '.$shipping;
												}
											}
                                            ?>
											</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Tax (15%)</b>
                                        <span class="stt-price">
                                            <?php
                                            if(isset($subtotal)){
												$tax = ($subtotal * 15)/100 ;
                                                if (isset($tax)){
                                                    echo '£ '.$tax;
                                                } else{ echo '£'.'0';
                                                }
											}
                                            ?>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <a href="#" class="link-forward">Promo/Gift Certificate</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Grand Total:</b>
                                        <span class="stt-price"><?php
                                            if (isset($subtotal)){
                                                $subtotal = $subtotal + $tax + $shipping ;
                                                echo '£ '.$subtotal;
                                                $_SESSION['subtotal']= $subtotal ;
                                            }else{ echo '£'.'0';
                                            }
                                            ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- FOOTER -->
<?php include_once ('includes/footer.php'); ?>
<!--Footer For Mobile-->
<?php include_once ('includes/mobile_footer.php'); ?>
<!--Footer For Mobile_Global -->
<?php include_once ('includes/mobile_global.php'); ?>
<!-- Scroll Top Button -->
<a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>
<!--Footer For scripts -->
<?php include_once ('includes/scripts.php'); ?>
</body>
</html>