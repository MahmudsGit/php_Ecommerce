<?php
session_start();
include_once ('admin/class/adminBack.php');
$obj_adminBack = new adminBack();
$viewCatagory = $obj_adminBack->p_displayCatagory();
$ctgDatas = array();
while ($data = mysqli_fetch_assoc($viewCatagory)){
    $ctgDatas[]=$data;
}
if (isset($_POST['userRegistration'])){
    $messege = $obj_adminBack->userResistration($_POST);
}
if (isset($_SESSION['user_id'])){
    if ($_SESSION['user_id']){
        header('location: user_profile.php');
    }
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

<div class="page-contain login-page">
    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container">
            <?php if (isset($messege)){
                echo "<h3 class='text-success'>$messege</h3>";
            } ?>
            <div class="row">
                <!--Form Sign In-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="signin-container">
                        <h2 class="text-center">Register as User!</h2>
                        <form action="" name="frm-login" method="post">
                            <p class="form-row">
                                <label for="userName">User Name:<span class="requite">*</span></label>
                                <input type="text" id="userName" name="userName" value="" class="txt-input">
                            </p>
                            <p class="form-row">
                                <label for="userFirstName">First Name:<span class="requite">*</span></label>
                                <input type="text" id="userFirstName" name="userFirstName" value="" class="txt-input">
                            </p>
                            <p class="form-row">
                                <label for="userLastName">Last Name:<span class="requite">*</span></label>
                                <input type="text" id="userLastName" name="userLastName" value="" class="txt-input">
                            </p>
                            <p class="form-row">
                                <label for="userEmail">Email Address:<span class="requite">*</span></label>
                                <input type="email" id="userEmail" name="userEmail" value="" class="txt-input">
                            </p><p class="form-row">
                                <label for="userMobile">Mobile:<span class="requite">*</span></label>
                                <input type="number" id="userMobile" name="userMobile" value="" class="txt-input">
                            </p>
                            <p class="form-row">
                                <label for="userPassword">Password:<span class="requite">*</span></label>
                                <input type="password" id="userPassword" name="userPassword" value="" class="txt-input">
                            </p>
                            <input type="hidden" name="userRole" value="5">
                            <input name="userRegistration" value="Register" class="btn btn-submit btn-bold btn-block" type="submit">
                        </form>
                        <br>
                        <br>
                    </div>
                </div>
                <!--Go to Register form-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="register-in-container">
                        <div class="intro">
                            <h4 class="box-title">Already Have an Account?</h4>
                            <p class="sub-title">Log In to Access Our Service:</p>
                            <ul class="lis">
                                <li>Check out faster</li>
                                <li>Save multiple shipping anddesses</li>
                                <li>Access your order history</li>
                                <li>Track new orders</li>
                                <li>Save items to your Wishlist</li>
                            </ul>
                            <a href="user_login.php" class="btn btn-bold">Log In Now!</a>
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