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
        <div class="page-contain">
            <!-- Main content -->
            <div id="main-content" class="main-content">
                <!--Block 01: Main Slide-->
                <?php include_once ('includes/main_slide.php'); ?>
                <!--Block 02: Banners-->
                <?php include_once ('includes/banners.php'); ?>
                <!--Block 03: Related Product Tabs-->
                <?php include_once('includes/related_product.php'); ?>
                <!--Block 06: Products-Box-->
                <?php include_once ('includes/product_box.php'); ?>

                <!--Block 07: Brands-->
                <?php include_once ('includes/brands.php'); ?>
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