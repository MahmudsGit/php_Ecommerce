<?php
    $obj_adminBack = new adminBack();
    $showCtg = $obj_adminBack->p_displayCatagory();

    if (isset($_POST['pdt_btn'])){
        $returnMsg = $obj_adminBack->add_product($_POST);
    }
?>


<h2>Add Product</h2><hr>
<?php
    if (isset($returnMsg)){
        echo $returnMsg;
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="pdt_name">Product Name</label>
        <input type="text" name="pdt_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_des">Product Description</label>
        <textarea name="pdt_des" rows="4" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="pdt_price">Product Price</label>
        <input type="number" name="pdt_price" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_catagory">Product Catagory</label>
        <select name="pdt_catagory" class="form-control">
            <option >Select Product Catagory</option>
            <?php
                while ($displayCtg = mysqli_fetch_assoc($showCtg)){
            ?>
            <option value="<?php echo $displayCtg['ctg_id']; ?>"><?php echo $displayCtg['ctg_name']; ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="pdt_file">Product Image</label>
        <input type="file" name="pdt_file" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_status">Product Status</label>
        <select name="pdt_status" class="form-control">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div>
    <input type="submit" name="pdt_btn" value="Add Product" class="btn btn-primary btn-block">
</form>
