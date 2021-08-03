<?php
    $obj_adminBack = new adminBack();

    if (isset($_GET['status'])){
    $get_id = $_GET['id'];
        if ($_GET['status'] == 'edit'){
            $ctgDetail = $obj_adminBack->getInfotoEdit($get_id);
        }
    }
    if (isset($_POST['ctg_update'])){
        $UpdNote = $obj_adminBack->edit_catagory($_POST);
    }

?>

<h2>Edit Catagory</h2><hr>
<?php
    if (isset($UpdNote)){
        echo $UpdNote;
    }
?>
<form action="" method="post">
    <div class="form-group">
        <input hidden type="text" name="ctg_id_edit" class="form-control" value="<?php echo $ctgDetail['ctg_id']; ?> ">
    </div>
    <div class="form-group">
        <label for="ctg_name_edit">Catagory Name</label>
        <input type="text" name="ctg_name_edit" class="form-control" value="<?php echo $ctgDetail['ctg_name']; ?> ">
    </div>
    <div class="form-group">
        <label for="ctg_des_edit">Catagory Description</label>
        <input type="text" name="ctg_des_edit" class="form-control" value="<?php echo $ctgDetail['ctg_des']; ?>" >
    </div>
    <input type="submit" name="ctg_update" value="update" class="btn btn-secondary">
</form>