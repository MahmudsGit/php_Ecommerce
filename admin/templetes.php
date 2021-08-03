<?php include ("class/adminBack.php");
session_start();
$adminId = $_SESSION['id'];
$adminEmail = $_SESSION['adminEmail'];
if ($adminId == null){
    header("location: index.php");
}
if (isset($_GET['adminLogout'])){
    $obj_adminBack = new adminBack();
    $obj_adminBack->adminLogout();
    header("location: index.php");
}

?>
<?php include ("includes/head.php"); ?>
<body>
<div class="fixed-button">
    <a href="https://codedthemes.com/item/gradient-able-admin-template" target="_blank" class="btn btn-md btn-primary">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
    </a>
</div>
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="loader-track">
        <div class="loader-bar"></div>
    </div>
</div>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <?php include ("includes/header-nav.php"); ?>
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
            <?php include ("includes/sidebar.php"); ?>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">

                                <div class="page-body">

                                    <?php
                                        if ($views){
                                            if ($views == "dashboard"){
                                                include ("views/dashboard-view.php");
                                            }elseif ($views == "add-catagory"){
                                                include ("views/add-catagory-view.php");
                                            }elseif ($views == "add-product"){
                                                include ("views/add-product-view.php");
                                            }elseif ($views == "manage-catagory"){
                                                include ("views/manage-catagory-view.php");
                                            }elseif ($views == "manage-product"){
                                                include ("views/manage-product-view.php");
                                            }elseif ($views == "manage-users"){
                                                include ("views/manage-users-view.php");
                                            }elseif ($views == "edit-catagory"){
                                                include ("views/edit-catagory-view.php");
                                            }elseif ($views == "edit-product"){
                                                include ("views/edit-product-view.php");
                                            }
                                        }
                                    ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php include ("includes/script.php"); ?>