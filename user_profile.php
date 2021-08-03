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
$userEmail = $_SESSION['user_email'];
$userFirstName = $_SESSION['user_firstname'];
$userLastName = $_SESSION['user_lastname'];
$userMobile = $_SESSION['user_mobile'];
$userRole = $_SESSION['user_role'];

if ($userId == null){
    header('location: User_login.php');
}

if (isset($_GET['logutuser'])){
    if ($_GET['logutuser'] == 'logout'){
        $obj_adminBack->userLogout();
    }
}
if (isset($_POST['updateUserInfo'])){
    $updtMsg = $obj_adminBack->updateUserProfile($_POST);
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

<div class="container">
    <h2>User Profile</h2>
    <div class="user-info">
        <div class="user-details">
            <?php if (isset($updtMsg)){
                echo $updtMsg ;
            } ?>
            <h3>Hello, <?php if (isset($userName)){ echo $userName; } ?> </h3><a href="?editUser=edit" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i>Edit Profile</a>
            <p class="form-row">
                <label for="userName">Your Name: <b><?php if (isset($userFirstName) && isset($userLastName)){ echo strtoupper($userFirstName).' '.$userLastName; } ?></b><span class="requite"></span></label><br>
                <label for="userEmail">Email: <b><?php if (isset($userEmail)){ echo $userEmail; } ?></b><span class="requite"></span></label><br>
                <label for="userMobile">Mobile: <b><?php if (isset($userMobile)){ echo $userMobile; } ?></b><span class="requite"></span></label><br>
                <label for="userRole">User Role: <b><?php if (isset($userRole)){ echo $userRole; } ?></b><span class="requite"></span></label>
            </p>

            <?php if (isset($_GET['editUser'])){
                if ($_GET['editUser'] == 'edit'){ ?>
            <form action="#" name="frm-login" method="post">
                <p class="form-row">
                    <label for="updtuserFirstName">First Name:<span class="requite">*</span></label>
                    <input type="text" id="updtuserFirstName" name="updtuserFirstName" value="<?php if (isset($userFirstName) ){ echo $userFirstName ; } ?>" class="txt-input">
                </p>
                <p class="form-row">
                    <label for="updtuserLastName">Last Name:<span class="requite">*</span></label>
                    <input type="text" id="updtuserLastName" name="updtuserLastName" value="<?php if (isset($userLastName)){ echo $userLastName; } ?>" class="txt-input">
                </p>
                <p class="form-row">
                    <label for="updtuserEmail">Email:<span class="requite">*</span></label>
                    <input type="text" id="updtuserEmail" name="updtuserEmail" value="<?php if (isset($userEmail)){ echo $userEmail; } ?>" class="txt-input">
                </p>
                <p class="form-row">
                    <label for="updtuserMobile">Mobile:<span class="requite">*</span></label>
                    <input type="number" id="updtuserMobile" name="updtuserMobile" value="<?php if (isset($userMobile)){ echo $userMobile; } ?>" class="txt-input">
                </p>
                <input type="hidden" name="updtUserId" value="<?php if (isset($userId)){ echo $userId; } ?>">
                <input type="submit" name="updateUserInfo" value="Update" class="btn btn-success">
                <a href="user_profile.php" >Cancel</a>
            </form>
            <?php }} ?>
            <br>
            <a class="btn btn-block btn-warning" href="?logutuser=logout">Logout </a>
        </div>
        <div class="history">
            <!--Cart Table-->
            <div class="shopping-cart-container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="box-title">Order History</h3>
                        <form class="shopping-cart-form" action="#" method="post">
                            <table class="shop_table cart-form">
                                <thead>
                                <tr>
                                    <th class="product-name">Product Name</th>
                                    <th class="product-quantity">Total Paid</th>
                                    <th class="product-subtotal">Order Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if (isset($_SESSION['cart'])){
                                    foreach ($_SESSION['cart'] as $key=>$value){
                                ?>
                                <tr class="cart_item">
                                    <td class="product-thumbnail" data-title="Product Name">
                                        <a class="prd-thumb" href="#">
                                            <figure><img width="113" height="113" src="assets/images/shippingcart/pr-01.jpg" alt="shipping cart"></figure>
                                        </a>
                                        <a class="prd-name" href="#"><?php echo $value['pdt_name'] ; ?></a>
                                    </td>
                                    <td class="product-price" data-title="Price">
                                        <div class="price price-contain">
                                            <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $value['pdt_price'] ; ?></span></ins>
                                        </div>
                                    </td>
                                    <td class="product-subtotal" data-title="Total">
                                        Pending...
                                    </td>
                                </tr>
                                <?php }}else{
                                    echo "<h2>Your Cart is Empty</h2>";
                                } ?>
                                </tbody>
                            </table>
                        </form>
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