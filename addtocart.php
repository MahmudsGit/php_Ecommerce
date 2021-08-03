<?php
session_start();
include_once ('admin/class/adminBack.php');
$obj_adminBack = new adminBack();
$viewCatagory = $obj_adminBack->p_displayCatagory();
$ctgDatas = array();
while ($data = mysqli_fetch_assoc($viewCatagory)){
    $ctgDatas[]=$data;
}

    if (isset($_POST['addtocart'])){
        if (isset($_SESSION['cart'])){
            $productsName = array_column($_SESSION['cart'],'pdt_name');
            if (in_array($_POST['pdt_name'],$productsName)){
                echo "
                    <script>
                        alert('This Product is allready Added!');
                    </script>
                ";
            }else{
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count]= array(
                    'pdt_name' => $_POST['pdt_name'],
                    'pdt_price' => $_POST['pdt_price'],
                    'pdt_file' => $_POST['pdt_file'],
                    'quantity' => 1
                );
            }
        }else{
            $_SESSION['cart'][0]= array(
                'pdt_name' => $_POST['pdt_name'],
                'pdt_price' => $_POST['pdt_price'],
                'pdt_file' => $_POST['pdt_file'],
                'quantity' => 1
            );
        }
    }

    if (isset($_POST['remove_pdt'])){
        foreach ($_SESSION['cart'] as $key => $value){
            if ($value['pdt_name'] == $_POST['remove_pdt_name']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
            }
        }
    }

    if (isset($_POST['destroy'])){
        session_unset();
        session_destroy();
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

<!--Cart Table-->
<div class="page-contain">
<div id="main-content" class="main content">
<div class="container">
    <br><br>
    <div class="shopping-cart-container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <h3 class="box-title">Your cart items</h3>
                <form class="shopping-cart-form" action="#" method="post">
                    <table class="shop_table cart-form">
                        <thead>
                        <tr>
                            <th class="product-name">Product Name</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Action</th>
                            <th class="product-subtotal">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($_SESSION['cart'])){
                                $subtotal = 0;
                                $totalItem = 0;
                                foreach ($_SESSION['cart'] as $key=>$value){
                                    $subtotal = $value['pdt_price'] + $subtotal;
                                    $totalItem++ ;
                            ?>
                            <tr class="cart_item">
                                <td class="product-thumbnail" data-title="Product Name">
                                    <a class="prd-thumb" href="#">
                                        <figure><img width="113" height="113" src="admin/uploads/<?php echo $value['pdt_file'] ; ?>" alt="shipping cart"></figure>
                                    </a>
                                    <a class="prd-name" href="#"><?php echo $value['pdt_name'] ; ?></a>
                                </td>
                                <td class="product-price" data-title="Price">
                                    <div class="price price-contain">
                                        <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $value['pdt_price'] ; ?></span></ins>
                                    </div>
                                </td>
                                <td class="product-quantity" data-title="Action">
                                    <form>
                                        <input type="hidden" name="remove_pdt_name" value="<?php echo $value['pdt_name']; ?>">
                                        <input type="submit" name="remove_pdt" value="Remove Item" class="btn btn-warning">
                                    </form>
                                </td>
                                <td class="product-subtotal" data-title="Total">
                                    <div class="price price-contain">
                                        <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $value['pdt_price'] ; ?></span></ins>
                                    </div>
                                </td>
                            </tr>
                            <?php }}else{
                                echo "<h2>Your Cart is Empty</h2>";
                            } ?>
                            <tr class="cart_item wrap-buttons">
                                <td class="wrap-btn-control" colspan="4">
                                    <a href="index.php" class="btn back-to-shop">Back to Shop</a>
                                    <input class="btn btn-clear" type="submit" name="destroy" value="clear all">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="shpcart-subtotal-block">
                    <div class="subtotal-line">
                        <b class="stt-name">Subtotal <span class="sub">(<?php if (isset($totalItem)){ echo $totalItem; }else{ echo '0'; }  ?> ittems)</span></b>
                        <span class="stt-price"><?php if (isset($totalItem)){ echo '£'.$subtotal; }else{ echo '£ 0.00'; } ?></span>
                    </div>
                    <div class="tax-fee">
                        <p class="title">Est. Taxes & Fees</p>
                        <p class="desc">Based on 56789</p>
                    </div>
                    <div class="btn-checkout">
                        <a href="checkOut.php" class="btn checkout">Check out</a>
                    </div>
                    <div class="biolife-progress-bar">
                        <table>
                            <tr>
                                <td class="first-position">
                                    <span class="index">$0</span>
                                </td>
                                <td class="mid-position">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class="last-position">
                                    <span class="index">$99</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <p class="pickup-info"><b>Free Pickup</b> is available as soon as today More about shipping and pickup</p>
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