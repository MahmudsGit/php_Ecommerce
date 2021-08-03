<?php
session_start();
include_once ('admin/class/adminBack.php');
$obj_adminBack = new adminBack();
$viewCatagory = $obj_adminBack->p_displayCatagory();
$ctgDatas = array();
while ($data = mysqli_fetch_assoc($viewCatagory)){
    $ctgDatas[]=$data;
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
<!-- Page Contain -->
<?php
    if (isset($_GET['status'])){
        if ($_GET['status'] == 'ctgdata'){
            $id = $_GET['id'];
            $pdtCat= $obj_adminBack->viewPdtCatTable($id);
            $pdtCatDatas = array();
            while ($deta = mysqli_fetch_assoc($pdtCat)){
                $pdtCatDatas[]=$deta;
            }
        }
    }

?>
<!--Hero Section-->
<div class="hero-section hero-background">
    <?php
        foreach ($pdtCatDatas as $proCatView){
            $catName = $proCatView['ctg_name'];
    ?>
    <h1 class="page-title"><?php echo $catName; ?></h1>
    <?php } ?>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="index.php" class="permal-link">Home</a></li>
            <li class="nav-item"><a href="#" class="permal-link"><?php echo $catName; ?></a></li>
        </ul>
    </nav>
</div>

<div class="container">
    <div class="row">
        <!-- Main content -->
        <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-category grid-style">
                <div class="row">
                    <ul class="products-list">
                        <?php
                            foreach ($pdtCatDatas as $productCatView){
                        ?>
                        <form action="addtocart.php" method="post">
                        <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="singleproduct.php?status=spro&&id=<?php echo $productCatView['pdt_id']; ?>" class="link-to-product">
                                        <img src="admin/uploads/<?php echo $productCatView['pdt_file']; ?>" alt="dd" style="width: 270px; height: 320px" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <b class="categories"><?php echo $productCatView['ctg_name']; ?></b>
                                    <h4 class="product-title"><a href="singleproduct.php?status=spro&&id=<?php echo $productCatView['pdt_id']; ?>" class="pr-name"><?php echo $productCatView['pdt_name']; ?></a></h4>
                                    <div class="price">
                                        <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $productCatView['pdt_price']; ?></span></ins>
                                    </div>
                                    <div class="shipping-info">
                                        <p class="shipping-day">3-Day Shipping</p>
                                        <p class="for-today">Pree Pickup Today</p>
                                    </div>
                                    <div class="slide-down-box">
                                        <p class="message"><?php echo $productCatView['pdt_des']; ?></p>
                                        <div class="buttons">
                                            <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <input type="hidden" name="pdt_name" value="<?php echo $productCatView['pdt_name']; ?>">
                                            <input type="hidden" name="pdt_price" value="<?php echo $productCatView['pdt_price']; ?>">
                                            <input type="hidden" name="pdt_file" value="<?php echo $productCatView['pdt_file']; ?>">
                                            <input type="submit" name="addtocart" value="add to cart now !" class="btn add-to-cart-btn" >
                                            <a href="singleproduct.php?status=spro&&id=<?php echo $productCatView['pdt_id']; ?>" class="btn "><i class="fa fa-eye" aria-hidden="true"></i> Vew</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        </form>
                        <?php
                            }
                        ?>
                    </ul>
                </div>

                <div class="biolife-panigations-block">
                    <ul class="panigation-contain">
                        <li><span class="current-page">1</span></li>
                        <li><a href="#" class="link-page">2</a></li>
                        <li><a href="#" class="link-page">3</a></li>
                        <li><span class="sep">....</span></li>
                        <li><a href="#" class="link-page">20</a></li>
                        <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    </ul>
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