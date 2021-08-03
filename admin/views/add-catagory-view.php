<?php
    $obj_adminBack = new adminBack();
    if (isset($_POST['ctg_btn'])){
        $result = $obj_adminBack->add_catagory($_POST);
    }
?>

<h2>Add Catagory</h2><hr>
<?php
    if (isset($result)){
    echo $result;
}?>
<form action="" method="post">
    <div class="form-group">
        <label for="ctg_name">Catagory Name</label>
        <input type="text" name="ctg_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="ctg_des">Catagory Description</label>
        <input type="text" name="ctg_des" class="form-control">
    </div>
    <div class="form-group">
        <label for="ctg_status">Catagory Status</label>
        <select name="ctg_status" class="form-control">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div>
    <input type="submit" name="ctg_btn" value="Add Catagory" class="btn btn-primary">
</form>