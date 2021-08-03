<?php
    class adminBack{
        public $conn;
        public function __construct(){
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "ecom";

            $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

            if (!$this->conn){
                die("Database connection error!");
            }
        }

        function adminLogin($data){
            $admin_email = $data['admin_email'];
            $admin_pass = md5($data['admin_pass']);

            $query = "SELECT * FROM adminlog WHERE admin_email = '$admin_email' AND admin_pass = '$admin_pass'";

            if (mysqli_query($this->conn,$query)){
                $result = mysqli_query($this->conn,$query);
                $adminInfo = mysqli_fetch_assoc($result);
                if ($adminInfo){
                    header("location: dashboard.php");
                    session_start();
                    $_SESSION['id'] = $adminInfo['id'];
                    $_SESSION['adminEmail'] = $adminInfo['admin_email'];
                    $_SESSION['adminPass'] = $adminInfo['admin_pass'];
                }else{
                    $errmsg = "Your Email or Password is Incerrect!";
                    return $errmsg;
                }
            }
        }

        function adminLogout(){
            unset($_SESSION['id']);
            unset($_SESSION['adminEmail']);
            unset($_SESSION['adminPass']);

        }

        function add_catagory($data){
            $ctg_name = $data['ctg_name'];
            $ctg_des = $data['ctg_des'];
            $ctg_status = $data['ctg_status'];

            $query = "INSERT INTO catagory (ctg_name,ctg_des,ctg_status) VALUES ('$ctg_name','$ctg_des',$ctg_status)";

            if (mysqli_query($this->conn,$query)){
                $msg = "Catagory Added Successfully";
                return $msg;
            }else{
                $msg = "Catagory Added Failed";
                return $msg;
            }

        }

        function displayCatagory(){
            $query = "SELECT * FROM catagory";
            if (mysqli_query($this->conn,$query)){
                $return_ctg = mysqli_query($this->conn,$query);
                return $return_ctg;
            }
        }
        function p_displayCatagory(){
            $query = "SELECT * FROM catagory WHERE ctg_status = 1";
            if (mysqli_query($this->conn,$query)){
                $return_ctg = mysqli_query($this->conn,$query);
                return $return_ctg;
            }
        }
        function publishCatagory($id){
            $query = "UPDATE catagory SET ctg_status=1 WHERE ctg_id=$id";
            mysqli_query($this->conn,$query);
        }
        function unpublishCatagory($id){
            $query = "UPDATE catagory SET ctg_status=0 WHERE ctg_id=$id";
            mysqli_query($this->conn,$query);
        }
        function deleteCatagory($id){
            $query = "DELETE FROM catagory WHERE ctg_id=$id";
            if (mysqli_query($this->conn,$query)){
                $msg = "Catagory Delete Successfully!";
                return $msg;
            }
        }

        function getInfotoEdit($id){
            $query = "SELECT * FROM catagory WHERE ctg_id = $id";
            $ctgInfo = mysqli_query($this->conn,$query);
            $catagoryInfo = mysqli_fetch_assoc($ctgInfo);
            return $catagoryInfo;
        }
        function edit_catagory($data){
            $ctg_name = $data['ctg_name_edit'];
            $ctg_des = $data['ctg_des_edit'];
            $ctg_id = $data['ctg_id_edit'];

            $query = "UPDATE catagory SET ctg_name='$ctg_name',ctg_des='$ctg_des' WHERE ctg_id=$ctg_id";
            if (mysqli_query($this->conn,$query)){
                $msg = "Catagory Updated Successfully";
                return $msg;
            }else{
                $msg = "Catagory Updated Failed";
                return $msg;
            }
        }

        function add_product($data){
            $pdt_name = $data['pdt_name'];
            $pdt_des = $data['pdt_des'];
            $pdt_price = $data['pdt_price'];
            $pdt_catagory = $data['pdt_catagory'];
            $pdt_file_name = $_FILES['pdt_file']['name'];
            $pdt_file_size = $_FILES['pdt_file']['size'];
            $pdt_file_tmp_name = $_FILES['pdt_file']['tmp_name'];
            $pdt_file_ext = pathinfo($pdt_file_name,PATHINFO_EXTENSION);
            $pdt_status = $data['pdt_status'];
            $mov_file = 'uploads/'.$pdt_file_name;

            if ($pdt_file_ext == "jpg" or $pdt_file_ext == "png" or $pdt_file_ext == "jpeg"){
                if ($pdt_file_size <= 2097152){
                    $query = "INSERT INTO product(pdt_name,pdt_des,pdt_price,pdt_catagory,pdt_file,pdt_status) VALUES ('$pdt_name','$pdt_des',$pdt_price,$pdt_catagory,'$pdt_file_name',$pdt_status)";
                    if (mysqli_query($this->conn,$query)){
                        move_uploaded_file($pdt_file_tmp_name, $mov_file);
                        $msg = "product Added Successfully";
                        return $msg;
                    }else{
                        $msg = "product Added Failed";
                        return $msg;
                    }
                }else{
                    $msg= "File should be equal or less than 2MB!";
                    return $msg;
                }
            }else{
                $msg= "please Select a image file!";
                return $msg;
            }

        }

        function displayProduct(){
            $query = "SELECT * FROM pdt_ctg_info";
            $product = mysqli_query($this->conn, $query);
            return $product;
        }


        function publishProduct($id){
            $query = "UPDATE pdt_ctg_info SET pdt_status=1 WHERE pdt_id=$id";
            mysqli_query($this->conn,$query);
        }
        function unpublishProduct($id){
            $query = "UPDATE pdt_ctg_info SET pdt_status=0 WHERE pdt_id=$id";
            mysqli_query($this->conn,$query);
        }
        function deleteProduct($id){
            $query = "DELETE FROM product WHERE pdt_id=$id";
            if (mysqli_query($this->conn,$query)){
                $msg = "Product Delete Successfully!";
                return $msg;
            }
        }
        function getProduct_InfotoEdit($id){
            $query = "SELECT * FROM product WHERE pdt_id = $id";
            $pdtInfo = mysqli_query($this->conn,$query);
            $productInfo = mysqli_fetch_assoc($pdtInfo);
            return $productInfo;
        }
        function edit_product($data){
            $pdt_id = $data['u_pdt_id'];
            $pdt_name = $data['u_pdt_name'];
            $pdt_des = $data['u_pdt_des'];
            $pdt_price = $data['u_pdt_price'];
            $pdt_catagory = $data['u_pdt_catagory'];
            $pdt_file_name = $_FILES['u_pdt_file']['name'];
            $pdt_file_size = $_FILES['u_pdt_file']['size'];
            $pdt_file_tmp_name = $_FILES['u_pdt_file']['tmp_name'];
            $pdt_file_ext = pathinfo($pdt_file_name,PATHINFO_EXTENSION);
            $pdt_status = $data['u_pdt_status'];
            $mov_file = 'uploads/'.$pdt_file_name;

            if ($pdt_file_ext == "jpg" or $pdt_file_ext == "png" or $pdt_file_ext == "jpeg"){
                if ($pdt_file_size <= 2097152){
                    $query = "UPDATE product SET pdt_name='$pdt_name',pdt_price=$pdt_price,pdt_catagory=$pdt_catagory,pdt_des='$pdt_des',pdt_file='$pdt_file_name',pdt_status=$pdt_status WHERE pdt_id = $pdt_id";
                    if (mysqli_query($this->conn,$query)){
                        move_uploaded_file($pdt_file_tmp_name, $mov_file);
                        $msg = "product Updated Successfully";
                        return $msg;
                    }else{
                        $msg = "product Updated Failed";
                        return $msg;
                    }
                }else{
                    $msg= "File should be equal or less than 2MB!";
                    return $msg;
                }
            }else{
                $msg= "please Select a image file!";
                return $msg;
            }
        }

        function viewPdtCatTable($id){
            $query = "SELECT * FROM pdt_ctg_info WHERE ctg_id = $id";
            if (mysqli_query($this->conn, $query)){
                $pdtCtgInf = mysqli_query($this->conn,$query);
                return $pdtCtgInf;
            }
        }

        function viewSnglPdt($pdtId){
            $query = "SELECT * FROM pdt_ctg_info WHERE pdt_id = $pdtId";
            if (mysqli_query($this->conn, $query)){
                $pdtCtgInf = mysqli_query($this->conn,$query);
                return $pdtCtgInf;
            }
        }
        function relatedProduct($ctgId){
            $query = "SELECT * FROM pdt_ctg_info WHERE ctg_id = $ctgId ORDER BY pdt_id DESC LIMIT 4";
            if (mysqli_query($this->conn, $query)){
                $pdtCtgInf = mysqli_query($this->conn,$query);
                return $pdtCtgInf;
            }
        }

        function userResistration($data){
            $userName = $data['userName'];
            $userFirstName = $data['userFirstName'];
            $userLastName = $data['userLastName'];
            $userEmail = $data['userEmail'];
            $userMobile = $data['userMobile'];
            $userPassword = md5($data['userPassword']);
            $userRole = $data['userRole'];

            $get_user_data = "SELECT * FROM users WHERE user_name = '$userName' or user_email = '$userEmail'";
            $get_data = mysqli_query($this->conn, $get_user_data);
            $row = mysqli_num_rows($get_data);

            if ($row == 1){
                $msg = "This username or email is already exist!";
                return $msg;
            }else{
                if (strlen($userMobile) < 11 or strlen($userMobile) > 11){
                    $msg = "Invalid Phone Number!";
                    return $msg;
                }else{
                    $query = "INSERT INTO users(user_name,user_firstname,user_lastname,user_email,user_mobile,user_password,user_role) VALUE('$userName','$userFirstName','$userLastName','$userEmail',$userMobile,'$userPassword',$userRole)";
                    if (mysqli_query($this->conn, $query)){
                        $msg = "User Registration Successful.";
                        return $msg;
                        }
                }
            }
        }

        function userLogin($data){
            $userEmail = $data['userEmail'];
            $userPassword = md5($data['userPassword']);

            $query = "SELECT * FROM users WHERE user_email = '$userEmail' AND user_password = '$userPassword'";

            if (mysqli_query($this->conn,$query)){
                $result = mysqli_query($this->conn,$query);
                $userInfo = mysqli_fetch_assoc($result);
                if ($userInfo){
                    header("location: user_profile.php");
                    session_start();
                    $_SESSION['user_id'] = $userInfo['user_id'];
                    $_SESSION['user_email'] = $userInfo['user_email'];
                    $_SESSION['user_password'] = $userInfo['user_password'];
                    $_SESSION['user_name'] = $userInfo['user_name'];
                    $_SESSION['user_firstname'] = $userInfo['user_firstname'];
                    $_SESSION['user_lastname'] = $userInfo['user_lastname'];
                    $_SESSION['user_mobile'] = $userInfo['user_mobile'];
                    $_SESSION['user_role'] = $userInfo['user_role'];
                }else{
                    $errmsg = "Your Email or Password is Incerrect!";
                    return $errmsg;
                }
            }
        }
        function userLogout(){
            unset($_SESSION['user_id']);
            unset($_SESSION[';user_email']);
            unset($_SESSION['user_password']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_firstname']);
            unset($_SESSION['user_lastname']);
            unset($_SESSION['user_mobile']);
            unset($_SESSION['user_role']);
            header('location: user_login.php');

        }
        function updateUserProfile($updtData){
            $updtuserFirstName = $updtData['updtuserFirstName'];
            $updtuserLastName = $updtData['updtuserLastName'];
            $updtuserEmail = $updtData['updtuserEmail'];
            $updtuserMobile = $updtData['updtuserMobile'];
            $updtuserId = $updtData['updtUserId'];

            if (strlen($updtuserMobile ) < 11 or strlen($updtuserMobile) > 11){
                $msg = "Mobile Number Invalid!";
                return $msg;
            }else{
                $query = "UPDATE users SET user_firstname='$updtuserFirstName',user_lastname='$updtuserLastName',user_email='$updtuserEmail',user_mobile=$updtuserMobile WHERE user_id = $updtuserId";
                if (mysqli_query($this->conn,$query)){
                    $msg = "Profile Updated Successfully";
                    return $msg;
                }else{
                    $msg = "Profile Update Failed";
                    return $msg;
                }
            }

        }





    }
?>