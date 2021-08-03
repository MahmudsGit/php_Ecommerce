<?php
$obj_adminBack = new adminBack();
$showCtg = $obj_adminBack->displayCatagory();

if (isset($_GET['status'])){
    $get_id = $_GET['id'];
    if ($_GET['status'] == 'edit'){
        $pdtDetail = $obj_adminBack->getProduct_InfotoEdit($get_id);
    }
}
if (isset($_POST['u_pdt_btn'])){
    $UpdNote = $obj_adminBack->edit_product($_POST);
}

?>
<h2>Edit Product</h2><hr>
<?php
if (isset($UpdNote)){
    echo $UpdNote;
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input hidden type="text" name="u_pdt_id" class="form-control" value="<?php echo $pdtDetail['pdt_id']; ?>">
    </div>
    <div class="form-group">
        <label for="u_pdt_name">Product Name</label>
        <input type="text" name="u_pdt_name" class="form-control" value="<?php echo $pdtDetail['pdt_name']; ?>">
    </div>
    <div class="form-group">
        <label for="u_pdt_des">Product Description</label>
        <input name="u_pdt_des" class="form-control" value="<?php echo $pdtDetail['pdt_des']; ?>">
    </div>
    <div class="form-group">
        <label for="u_pdt_price">Product Price</label>
        <input type="number" name="u_pdt_price" class="form-control" value="<?php echo $pdtDetail['pdt_price']; ?>">
    </div>
    <div class="form-group">
        <label for="u_pdt_catagory">Product Catagory</label>
        <select name="u_pdt_catagory" class="form-control">
            <option >Select Product Catagory</option>
            <?php
            while ($displayCtg = mysqli_fetch_assoc($showCtg)){
                ?>
                <option value="<?php echo $displayCtg['ctg_id']; ?>"><?php echo $displayCtg['ctg_name']; ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="u_pdt_file">Product Image</label>
        <input type="file" name="u_pdt_file" class="form-control">
    </div>
    <div class="form-group">
        <label for="u_pdt_status">Product Status</label>
        <select name="u_pdt_status" class="form-control">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div>
    <input type="submit" name="u_pdt_btn" value="Update Product" class="btn btn-primary btn-block">
</form>
