<?php
    $obj_adminBack = new adminBack();
    $ctg_data = $obj_adminBack->displayCatagory();

    if (isset($_GET['status'])){
        $get_id = $_GET['id'];
        if ($_GET['status'] == 'publish'){
            $obj_adminBack->publishCatagory($get_id);
        }elseif ($_GET['status'] == 'unpublish'){
            $obj_adminBack->unpublishCatagory($get_id);
        }elseif ($_GET['status'] == 'delete'){
            $mesege = $obj_adminBack->deleteCatagory($get_id);
        }

    }

?>
<h2>manage catagory</h2><hr>
<?php
    if (isset($mesege)){
        echo $mesege."<br>";
    }
?>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Catagory</th>
            <th>Description</th>
            <th>Status</th>
            <th>Update/delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($ctg= mysqli_fetch_assoc($ctg_data)){
        ?>
        <tr>
            <td><?php echo $ctg['ctg_id']; ?></td>
            <td><?php echo $ctg['ctg_name']; ?></td>
            <td><?php echo $ctg['ctg_des']; ?></td>
            <td><?php
                    if ($ctg['ctg_status'] == 0){
                        echo "Unpublished";
                ?>
                        <a href="?status=publish&&id=<?php echo $ctg['ctg_id']; ?>" class="btn btn-sm btn-success">make Publish</a>
                <?php
                    }else{
                        echo "Published";
                ?>
                        <a href="?status=unpublish&&id=<?php echo $ctg['ctg_id']; ?>" class="btn btn-sm btn-primary">make Unpublish</a>

                <?php
                    }
                ?></td>
            <td>
                <a href="edit-catagory.php?status=edit&&id=<?php echo $ctg['ctg_id']; ?>" class="btn btn-sm btn-outline-success">update</a>
                <a href="?status=delete&&id=<?php echo $ctg['ctg_id']; ?>" class="btn btn-sm btn-danger">delete</a>
            </td>
        </tr>
        <?php } ?>

    </tbody>
</table>