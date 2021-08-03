<?php
$obj_adminBack = new adminBack();
$pdt_data = $obj_adminBack->displayProduct();

if (isset($_GET['status'])){
    $get_id = $_GET['id'];
    if ($_GET['status'] == 'publish'){
        $obj_adminBack->publishProduct($get_id);
    }elseif ($_GET['status'] == 'unpublish'){
        $obj_adminBack->unpublishProduct($get_id);
    }elseif ($_GET['status'] == 'delete'){
        $mesege = $obj_adminBack->deleteProduct($get_id);
    }
}

?>
<h2>manage Product</h2><hr>
<?php
if (isset($mesege)){
    echo $mesege."<br>";
}
?>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>image</th>
        <th>Catagory</th>
        <th>Status</th>
        <th>Update / delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($pdt_info= mysqli_fetch_assoc($pdt_data)){
        ?>
        <tr>
            <td><?php echo $pdt_info['pdt_id']; ?></td>
            <td><?php echo $pdt_info['pdt_name']; ?></td>
            <td><?php echo $pdt_info['pdt_price']; ?></td>
            <td><?php echo $pdt_info['pdt_des']; ?></td>
            <td><img style="height: 35px ; width: 35px;" src="uploads/<?php echo $pdt_info['pdt_file']; ?>"></td>
            <td><?php echo $pdt_info['ctg_name']; ?></td>
            <td>
                <?php
                if ($pdt_info['pdt_status'] == 0){
                    echo "Unpublished";
                    ?>
                    <a href="?status=publish&&id=<?php echo $pdt_info['pdt_id']; ?>" class="btn btn-sm btn-success">make Publish</a>
                    <?php
                }else{
                    echo "Published";
                    ?>
                    <a href="?status=unpublish&&id=<?php echo $pdt_info['pdt_id']; ?>" class="btn btn-sm btn-primary">make Unpublish</a>

                    <?php
                }
                ?>
            </td>
            <td>
                <a href="edit-product.php?status=edit&&id=<?php echo $pdt_info['pdt_id']; ?>" class="btn btn-sm btn-outline-success">update</a>
                <a href="?status=delete&&id=<?php echo $pdt_info['pdt_id']; ?>" class="btn btn-sm btn-danger">delete</a>
            </td>
        </tr>
    <?php } ?>

    </tbody>
</table>